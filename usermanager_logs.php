<?php
    session_start();
    require("databaseConnection.php");
    $query = "select * from usermanager_logs";
    $result = mysqli_query($conn,$query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="usermanager_logs.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="png" href="logos/depedcsjdmlogo.png">
    <title>DepEd CSJDM Electronic Requisition and Issue Slip (E-RIS) Form</title>
</head>
<body>
    <header>
        <img src="logo/depedlogo.png" alt="">
        <input class ="menu_checkbox" type="checkbox" name="" id="check">
        <div class="container">
            <label for="check">
                <span> <i class='bx bxs-x-circle' id="times"></i> </span>
                <span><i class='bx bx-menu' id="bars"></i></span>
            </label>
            <div class="head">Menu</div>
            <ol>
                <li><a href="Accounts_inventory.php"><i class='bx bxs-user-account'></i>Accounts</a></li>
                <li><a href="superadmin_inventory.php"><i class='bx bx-table'></i>Item Inventory</a></li>
                <li><a href="request_logs.php"><i class='bx bx-git-pull-request' ></i>Request Logs</a></li>
                <li><a href="usermanager_logs.php"><i class='bx bxs-user-detail' ></i>User Manager</a></li>
                <li><a href="admin_risform.php"><i class='bx bx-file-blank' ></i>RIS Form</a></li>
                <li><a href="changePasswordForm.php"><i class='bx bxs-lock'></i>Change Password</a></li>
                <li><a href="logout.php"><i class='bx bx-exit'></i>Logout</a></li>
            </ol>
        </div>         
    </header>
    
    <div class="headerTitles">
        <h3>Republic of the Philippines</h3>
        <br>
        <h2>Department of Education</h2>
        <br>
        <h3>Region III</h3>
        <br>
        <h1>SCHOOLS DIVISION OF CITY OF SAN JOSE DEL MONTE</h1>
    </div>

    <h2>USER MANAGER LOGS</h2>
    <div class="scroll">
        <table id="table">
            <tr>
                <div class="headrow">
                    <th class="account-name">Account Name</th>
                    <th class="stock-number">Stock no.</th>
                    <th class="item-description">Item Description</th>
                    <th class="added-quantity">Added Quantity</th>
                    <th class="date-added">Date Added</th>
                </div>
            </tr>
            <tr>
                <div class="row2">
                    <?php
                        $selectQuery = "SELECT * FROM usermanager_logs ORDER BY formDate DESC";
                        $result = mysqli_query($conn, $selectQuery);
                        $rowNumber = 1;
                        while($row = mysqli_fetch_assoc($result))
                        {
                    ?>
                        
                        <td class ="align-account-name"><?php echo $row["accountName"];?></td>
                        <td class ="align-stock-number"><?php echo $row["stock_number"];?></td>
                        <td class ="align-item-description"><?php echo $row["item_description"];?></td>
                        <td class="align-add-quantity"><?php echo $row["add_quantity"];?></td>
                        <td class="align-form-date"><?php echo $row["formDate"];?></td>
            </tr>
                    <?php
                       
                        }
                    ?>
                </div>
        </table>
        <script src="autoLogoutFunction.js"></script>
</body>
</html>