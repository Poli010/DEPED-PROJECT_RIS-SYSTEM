<?php
    include('login.php');
    session_start();

    $email_data = $_SESSION['email_data'];

    $verifycode = $_POST['code'];
    $getcode = "SELECT * FROM verificationcode WHERE email ='$email_data'";
    $result = $conn->query($getcode);
    
    if(mysqli_num_rows($result) > 0) {
        $status = "code not match"; // Default status assuming code doesn't match

        while ($row = $result->fetch_assoc()) {
            $vcode = $row['code'];

            if (empty($verifycode)) {
                $status = "code field is empty";
                break; // Exit the loop early if the code is empty
            } else if ($verifycode == $vcode) {
                $sql = "DELETE FROM verificationcode WHERE email = '$email_data'";
                $conn->query($sql);
                $status = "code match";
                break; // Exit the loop early if the code matches
            }
        }
    } else {
        $status = "error fetching code";
    }

    echo $status;
?>
