<?php
include('login.php');
session_start();
$userpassword = $_POST['password'];
if (!empty($userpassword)) {
    $email_data = $_SESSION['email_data'];
     
    $updatepass = "UPDATE `ris_accounts` SET `accountPass`='$userpassword' WHERE depedEmail = '$email_data'";
    $stmt = mysqli_prepare($conn, $updatepass);
    mysqli_stmt_execute($stmt);
    header("Location: homepage.php");
    $status = "password updated";
    
    exit(); // Ensure that the script terminates after the redirect
} else {
    header("Location: ForgotPassword.php");
    $status = "error updating password";
}

echo $status;
?>