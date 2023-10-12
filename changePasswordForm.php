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
    <div class="login_form">
      <div class="wrapper">
        <div class="title"><span>CHANGE YOUR PASSWORD <br> <div class="title_two">HERE</div></span></div>
        <form name="form" action="update_password.php" method="POST">
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="text" placeholder="Current Password" name="accountPass" required>
          </div>
          <div class="row">
              <i class="fas fa-lock"></i>
              <input type="password" id="newAccountPass" placeholder="New Password" name="newAccountPass" required>
          </div>
          <div class="row">
              <i class="fas fa-lock"></i>
              <input type="password" id="confirmNewAccountPass" placeholder="Confirm New Password" name="confirmNewAccountPass" required>
          </div>
          <div class="row button">
            <input type="submit" class="change-password-button" value="Change Password" name="submit">
          </div>
          <div class="row button">
            <input type="button" class="cancel-button" value="Cancel" href="javascript:void(0);" onclick="window.history.back();">
          </div>
        </form>
      </div>
    </div>
    <script src="autoLogoutFunction.js"></script>
  </body>
</html>