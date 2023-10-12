<?php
// Ensure proper error handling and database connection establishment here.

require("databaseConnection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item_description = $_POST['item_description'];
    $quantity = $_POST['quantity'];
    $stock_number = $_POST["stock_number"];

    // Ensure quantity doesn't go below 0
    $sql = "UPDATE inventory SET item_quantity = CASE
            WHEN item_quantity >= $quantity THEN item_quantity - $quantity
            ELSE 0
            END
            WHERE item_description = '$item_description'";

    if ($conn->query($sql) === TRUE) {
        echo "Quantity updated successfully.";
    } else {
        echo "Error updating quantity: " . $conn->error;
    }
}

$conn->close();
?>
