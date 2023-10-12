<?php
    session_start();

    require("databaseConnection.php");
    
    if(isset($_POST['login'])){
        $loginEmail = $_POST['loginEmail'];
        $loginPass = $_POST['loginPass'];

        $sql = "SELECT * FROM ris_accounts WHERE depedEmail = '$loginEmail' AND accountPass = '$loginPass'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count==1 ){
            $_SESSION['accountName'] = $row['accountName'];
            $_SESSION['userPosition'] = $row['userPosition'];
            $_SESSION['centerCode'] = $row['centerCode'];
            $_SESSION['userOffice'] = $row['userOffice'];
            $_SESSION['depedEmail'] = $row['depedEmail'];
            
            // check account type so user will access webpage based on their account type
            $accountType = $row['accountType'];
            if ($accountType == 'End User') {
                header("Location: endUser_webpage.php"); //page for enduser
            } elseif ($accountType == 'User Manager') {
                header("Location: usermanagement.php"); //change location page, sample.php only for testing
            } elseif ($accountType == 'Super Admin') {
                header("Location: Accounts_inventory.php");// Handle superAdmin redirection here, change location page
            } else {
                echo '<script>
                alert("Login failed. Invalid DepEd E-mail or password.")
                window.location.href = "homepage.php";
                </script>';
            }
        } else {
            echo '<script>
                alert("Login failed. Invalid DepEd E-mail or password.")
                window.location.href = "homepage.php";
                </script>';
        }
    }
?>
