<?php
session_start();

include('login.php');

if(!empty($_SESSION['email_data'])){
    $email = $_SESSION['email_data'];
       
    $deletecode = "DELETE FROM verificationcode WHERE email = '$email'";
    $conn->query($deletecode);
    $status = "success";

}else{
    $status =  "unsuccessful";
}

    echo $status;
?>