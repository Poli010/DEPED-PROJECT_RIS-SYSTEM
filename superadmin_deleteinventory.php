<?php
// Connect to the database
require("databaseConnection.php");

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Check if the form has been deletion
if (isset($_POST["delete_item"])) {
    // Get the selected item from the dropdown
     $selectedItem = $_POST["item"];

    // Perform the deletion query
    $sql = "DELETE FROM inventory WHERE item_description = '$selectedItem'";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        header("Location: superadmin_inventory.php");   
    }                             
}
?>