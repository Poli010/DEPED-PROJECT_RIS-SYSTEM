<?php
session_start();
require("databaseConnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $accountName = $_SESSION['accountName'];
    $formDate = $_POST['formDate'];
    $stock_number = $_POST["selected_item"];
    $addQuantity = $_POST["add_quantity"];
    

    // Retrieve the current quantity for the selected item
    

    $insert_sql = "SELECT item_description FROM inventory WHERE stock_number = '$stock_number'";
    $insert_result = mysqli_query($conn, $insert_sql);

    if ($insert_result) {
        $insert_row = mysqli_fetch_assoc($insert_result);
        $item_description = $insert_row["item_description"];

            $insertSql = "INSERT INTO usermanager_logs VALUES ('$accountName', '$stock_number','$item_description', '$addQuantity', '$formDate')";
            if (mysqli_query($conn, $insertSql)) {
            }    
        } 
    } 

    $sql = "SELECT item_quantity FROM inventory WHERE stock_number = '$stock_number'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $currentQuantity = $row["item_quantity"];

        // Calculate the new quantity
        $newQuantity = $currentQuantity + $addQuantity;

        // Update the quantity in the database
        $updateSql = "UPDATE inventory SET item_quantity = $newQuantity WHERE stock_number = '$stock_number'";
        if (mysqli_query($conn, $updateSql)) {    
            mysqli_close($conn);
            header("Location: usermanagement.php");
        } 
        
    } 
    
?>