<?php
session_start();
require("databaseConnection.php");

// Initialize variables
$success = false;
$errors = array();

// Delete data and update item_quantity for multiple items
if (isset($_POST['referenceCode'])) {
    $referenceCode = $_POST['referenceCode'];

    // Retrieve all rows with the same referenceCode
    $select_sql = "SELECT item_description, quantityInput FROM queue_logs WHERE referenceCode = ?";
    $stmt_select = mysqli_prepare($conn, $select_sql);

    if ($stmt_select) {
        mysqli_stmt_bind_param($stmt_select, "s", $referenceCode);
        if (mysqli_stmt_execute($stmt_select)) {
            $result = mysqli_stmt_get_result($stmt_select);

            // Process each row
            while ($row = mysqli_fetch_assoc($result)) {
                $item_description = $row['item_description'];
                $quantityInput = $row['quantityInput'];

                // Delete data from the queue_logs table
                $delete_sql = "DELETE FROM queue_logs WHERE referenceCode = ?";
                $stmt_delete = mysqli_prepare($conn, $delete_sql);

                if ($stmt_delete) {
                    mysqli_stmt_bind_param($stmt_delete, "s", $referenceCode);
                    if (mysqli_stmt_execute($stmt_delete)) {
                        // Data deleted successfully

                        // Update item_quantity in the inventory table
                        $update_sql = "UPDATE inventory SET item_quantity = item_quantity + ? WHERE item_description = ?";
                        $stmt_update = mysqli_prepare($conn, $update_sql);

                        if ($stmt_update) {
                            mysqli_stmt_bind_param($stmt_update, "ss", $quantityInput, $item_description);
                            if (mysqli_stmt_execute($stmt_update)) {
                                // Quantity input added to item_quantity successfully
                                $success = true;
                            } else {
                                $errors[] = 'Error updating item_quantity for item_description: ' . $item_description;
                            }
                            mysqli_stmt_close($stmt_update);
                        } else {
                            $errors[] = 'Error preparing SQL statement for updating item_quantity for item_description: ' . $item_description;
                        }
                    } else {
                        $errors[] = 'Error deleting data from the database for item_description: ' . $item_description;
                    }
                    mysqli_stmt_close($stmt_delete);
                } else {
                    $errors[] = 'Error preparing SQL statement for deleting data for item_description: ' . $item_description;
                }
            }
        } else {
            $errors[] = 'Error executing SELECT statement.';
        }
        mysqli_stmt_close($stmt_select);
    } else {
        $errors[] = 'Error preparing SQL statement for SELECT.';
    }
} else {
    $errors[] = 'Reference code not provided.';
}

// Close the database connection
mysqli_close($conn);

// Return the response
$response = [
    'success' => $success,
    'errors' => $errors,
];
echo json_encode($response);
?>
