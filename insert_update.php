<?php
include("login.php");
require("databaseConnection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accountName = $_SESSION['accountName'];
    $userOffice = $_SESSION['userOffice'];
    $centerCode = $_SESSION['centerCode'];
    $userPosition = $_SESSION['userPosition'];
    $item_descriptions = $_POST['item_description'];
    $stockNumbers = $_POST['stock_number'];
    $stockUnits = $_POST['stock_unit'];
    $quantities = $_POST['quantity'];
    $formDate = $_POST['formDate'];
    $risNoDate = $_POST['risNoDate'];
    $purpose = $_POST['purpose'];
    $referenceCode = rand(100000, 999999);
    $finalReferenceCode = $referenceCode;
    $yearRequested = intval(date("Y"));

    $success = true;
    $errorMessage = "";

    // Start a transaction
    $conn->begin_transaction();

    $quantityIndex = 0; // Index for tracking the quantities

    for ($i = 0; $i < count($item_descriptions); $i++) {
        $item_description = isset($item_descriptions[$i]) ? $item_descriptions[$i] : '';
        $stockNumber = isset($stockNumbers[$i]) ? $stockNumbers[$i] : '';
        $stockUnit = isset($stockUnits[$i]) ? $stockUnits[$i] : '';

        if (!empty($item_description) && $item_description !== 'noValue') {
            // Quantity to be used
            $quantity = isset($quantities[$quantityIndex]) ? $quantities[$quantityIndex] : 0;

            // Increase the quantity index only when an item is processed
            $quantityIndex++;

            // Insert data into the queue logs
            $insert_sql = "INSERT INTO queue_logs (referenceCode, yearRequested, accountName, userPosition, centerCode, userOffice, stock_number, item_description, stock_unit, quantityInput, purpose, dateRequested) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insert_sql);
            $stmt->bind_param('sisssssssiss', $finalReferenceCode, $yearRequested, $accountName, $userPosition, $centerCode, $userOffice, $stockNumber, $item_description, $stockUnit, $quantity, $purpose, $formDate);

            if (!$stmt->execute()) {
                $success = false;
                $errorMessage = "Error inserting data into queue logs: " . $stmt->error;
                break; // Exit the loop on error
            }

            // Update item_quantity in the inventory table
            $update_sql = "UPDATE inventory SET item_quantity = item_quantity - ? WHERE item_description = ?";
            $stmt = $conn->prepare($update_sql);
            $stmt->bind_param('is', $quantity, $item_description);

            if (!$stmt->execute()) {
                $success = false;
                $errorMessage = "Error updating item_quantity in inventory: " . $stmt->error;
                break; // Exit the loop on error
            }
        }
    }

    // Commit or rollback the transaction
    if ($success) {
        $conn->commit();
        // Redirect back to the referring page
        $_SESSION['displaySuccessPopup'] = true;
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    } else {
        $conn->rollback();
        // Redirect back to the referring page with an error message
        header("Location: " . $_SERVER["HTTP_REFERER"] . "?error=" . urlencode($errorMessage));
    }
    
    exit();

    $conn->close();
}
?>