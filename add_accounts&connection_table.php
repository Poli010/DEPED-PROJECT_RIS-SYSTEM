<?php
//connect to table
require("databaseConnection.php");

if (isset($_POST['register'])) {
    $accountType = $_POST['account_Type'];
    $accountName = $_POST['account_Name'];
    $userPosition = $_POST['user_Position'];
    $userOffice = $_POST['user_Office'];
    $centerCode = $_POST['center_Code'];
    $depedEmail = $_POST['deped_Email'];
    $accountPass = $_POST['account_Pass'];

    foreach ($depedEmail as $key => $value) {
        $existingdepedEmailNumQuery = "SELECT COUNT(*) FROM ris_accounts WHERE depedEmail = '" . mysqli_real_escape_string($conn, $value) . "'";
        $existingdepedEmailResult = mysqli_query($conn, $existingdepedEmailNumQuery);
        $depedEmailCount = mysqli_fetch_array($existingdepedEmailResult)[0];

        if ($depedEmailCount == 0) { // Fix the variable name here
            $insertQuery = "INSERT INTO ris_accounts (accountType, accountName, userPosition, userOffice, centerCode, depedEmail, accountPass) VALUES (
                '" . mysqli_real_escape_string($conn, $accountType[$key]) . "','" . mysqli_real_escape_string($conn, $accountName[$key]) . "','" . mysqli_real_escape_string($conn, $userPosition[$key]) . "','" . mysqli_real_escape_string($conn, $userOffice[$key]) . "','" . mysqli_real_escape_string($conn, $centerCode[$key]) . "','" . mysqli_real_escape_string($conn, $depedEmail[$key]) . "','" . mysqli_real_escape_string($conn, $accountPass[$key]) . "')";
            $query = mysqli_query($conn, $insertQuery);
                
        }
    }
       
    mysqli_close($conn);
    header("Location: Accounts_inventory.php");
}


?>
