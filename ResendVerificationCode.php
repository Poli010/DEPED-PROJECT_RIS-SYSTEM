<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\depedcsjdm_RIS\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\depedcsjdm_RIS\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\depedcsjdm_RIS\PHPMailer-master\src\SMTP.php';
include('login.php');
session_start(); 

if (empty($_SESSION['email_data'])){
   
   $status = "error email";
}else{
    $email = $_SESSION['email_data'];
    $code = rand(100000, 999999);
    $finalcode = $code;
    
    $sql = "DELETE FROM verificationcode WHERE email = '$email'";
    $conn->query($sql);

    $sendcode = "INSERT INTO verificationCode (`code`,`email`) VALUES ('$finalcode','$email')";
    $conn->query($sendcode);

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    //sender username
    $mail ->Username = 'schoolsdivisionoffice@gmail.com';
    //two way pass
    $mail ->Password = 'povxtuiujqpsjkpe';
    $mail ->SMTPSecure='ssl';
    $mail ->Port='465';
    //sender
    $mail ->setFrom('schoolsdivisionoffice@gmail.com','Division Office CSJDM');
    //receiver
    $mail -> addAddress($email);
    $mail->isHTML(true);
    $mail->Subject='Verification Code';
    $mail->Body="Your Verification code is: ".$finalcode;

    $mail->send();

   $status = "code resent";
}

echo  $status;



?>