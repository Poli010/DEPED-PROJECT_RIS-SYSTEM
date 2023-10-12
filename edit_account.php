<?php
require("databaseConnection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userOffice = $_POST["useroffice"];
    $userPosition = $_POST["userposition"];
    $centerCode = $_POST["centercode"];
    $depedEmail = $_POST["selected_email"];

    // Update the database using the selectedId and other form data
    // You can use a prepared statement for better security
    $sql = "UPDATE ris_accounts SET userOffice = ?, userPosition = ?, centerCode = ? WHERE depedEmail = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $userOffice, $userPosition, $centerCode, $depedEmail);
    
    if ($stmt->execute()) {
        echo "Data updated successfully.";
    } else {
        echo "Error updating data: " . $stmt->error;
    }
    
    mysqli_close($conn);
    header("Location: Accounts_inventory.php");
}
?>