<?php
  include("login.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DepEd CSJDM Electronic Requisition and Issue Slip (E-RIS) Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="icon" type="image/x-icon" href="logos/depedcsjdmlogo.png">
    <link rel="stylesheet" href="homepage_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  </head>
  
  <body>
    <div class="login-container">
      <div class="login_form">
        <div class="wrapper">
          <div class="title"><span>E-Requisition and Issue Slip <br> <div class="title_two">Login</div></span></div>
          <form name="form" action="login.php" method="POST">
            <div class="row">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="abc@deped.gov.ph" name="loginEmail" autocomplete="off" required>
            </div>
            <div class="row">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="loginPass" autocomplete="off" required>
            </div>
            <div class="row">
              <a class="forgot-password" href="ForgotPassword.php">Forgot Password?</a>
            </div>
            <div class="row button">
              <input type="submit" value="Login" name="login">
            </div>
          </form>
        </div>
        <h3>Developer: <a href="https://www.facebook.com/ivan.policarpio.01"> Ivan Policarpio</a> and <a href="https://www.facebook.com/oerchaos">Austin Condalor</a></h3>
      </div>
    </div>

    <footer>
      <!--DISABLED BACK BUTTON-->
      <script src="disableBackButton.js"></script>
    </footer>
    
  </body>
</html>