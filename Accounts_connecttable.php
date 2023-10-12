<?php
//connect to table
require("databaseConnection.php");

if (isset($_POST['save'])) {
    $accountType = $_POST['accountType'];
    $accountName = $_POST['accountName'];
    $userPosition = $_POST['userPosition'];
    $userOffice = $_POST['userOffice'];
    $centerCode = $_POST['centerCode'];
    $depedEmail = $_POST['depedEmail'];
    $accountPass = $_POST['accountPass'];

    foreach ($accountType as $key => $value) {
        $existingaccountNumQuery = "SELECT COUNT(*) FROM ris_accounts WHERE accountType = '" . mysqli_real_escape_string($conn, $value) . "'";
        $existingaccountkNumResult = mysqli_query($conn, $existingaccountNumQuery);
        $accountNumCount = mysqli_fetch_array($existingaccountNumResult)[0];

        if ($accountNumCount == 0) {
            $insertQuery = "INSERT INTO ris_accounts (accountType, accountName, userPosition, userOffice, centerCode, depedEmail, accountPass) VALUES (
                '" . mysqli_real_escape_string($conn, $accountType[$key]) . "','" . mysqli_real_escape_string($conn, $accountName[$key]) . "','" . mysqli_real_escape_string($conn, $userPosition[$key]) . "','" . mysqli_real_escape_string($conn, $userOffice[$key]) . "','" . mysqli_real_escape_string($conn, $centerCode[$key]) . "','" . mysqli_real_escape_string($conn, $depedEmail[$key]) . "','" . mysqli_real_escape_string($conn, $accountPass[$key]) . "')";
            $query = mysqli_query($conn, $insertQuery);
                
        }
    }
       
    

    mysqli_close($conn);
    header("Location: superadmin_inventory.php");
}
?>
