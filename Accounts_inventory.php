<?php
    session_start();

    require_once("add_accounts&connection_table.php");
    $query = "select * from inventory";
    $result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DepEd CSJDM Electronic Requisition and Issue Slip (E-RIS) Form</title>
    <link rel="icon" type="png" href="logos/depedcsjdmlogo.png">
    <link rel="stylesheet" href="Accounts_inventory.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <header>
        <img src="logo/depedlogo.png" alt="">
        <div class="searchbar">
            <input type="text" id="searchInput" placeholder="Search Account Name...." oninput="searchTable()">
        </div>
        
        <nav>
            <ul>
                <li>
                    <a href="#" class ="account">Account</a>
                    <ul class="dropdown">
                        <li><a href="#" onclick="openAdd()">Add</a></li>
                        <li><a href="#" onclick="openEdit()">Edit</a></li>
                        <li><a href="#" onclick="openDelete()">Delete</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
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

    <h2>USER ACCOUNTS</h2>
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
    
  
    <div class="scroll">
        <table>
            <tr>
                <div class="headrow">
                    <th class="table-number">No.</th>
                    <th class="account-type">Account Type</th>
                    <th class="account-name">Name</th>
                    <th class="user-position">Position</th>
                    <th class="user-office">Office</th>
                    <th class="center-code">Code</th>
                    <th class="deped-email">DepEd Email</th>
                    <th class="account-pass">Password</th>
                </div>
            </tr>
            <tr>
                <div class="row2">
                    <?php
                        $selectQuery = "SELECT * FROM ris_accounts ORDER BY accountName ASC";
                        $result = mysqli_query($conn, $selectQuery);
                        $rowNumber = 1;
                        while($row = mysqli_fetch_assoc($result))
                        {          
                    ?>  
                        <td class="tableNo"><?php echo $rowNumber;?></td>
                        <td class ="align-account-type"><?php echo $row["accountType"];?></td>
                        <td class="align-account-name"><?php echo $row["accountName"];?></td>
                        <td class="align-userposition"><?php echo $row["userPosition"];?></td>
                        <td class ="align-useroffice"><?php echo $row["userOffice"];?></td>
                        <td class="centerCode"><?php echo $row["centerCode"];?></td>
                        <td class="align-depedemail"><?php echo $row["depedEmail"];?></td>
                        <td class="accountPass">*******</td>

            </tr>
                    <?php
                        $rowNumber++;

                        }
                    ?>
                </div>
                
        </table>
    </div>
    <!-----Add Propmpt------->
    <div class="popup" id="popup">
        <form class="insert_form" id="insert_form" method="post" action="" onsubmit="return validateForm();">

            <h2>ADD ACCOUNTS</h2> 
            <div class="accounttype">
                <label>Account Type:</label>
                <select name="account_Type[]" class="dropdownaccountType" id="accountTypeSelect"> 
                    <option value="">Select Account Type</option>
                    <option value="End User">End User</option>
                    <option value="Super Admin">Super Admin</option>
                    <option value="User Manager">User Manager</option>
                </select>
            </div>
            <div class="accountname">
                <label>Name:</label>
                <input type="text" name="account_Name[]" placeholder="Full Name" required><br>
            </div>
            <div class="userposition">
                <label>Position:</label>
                <input type="text" name="user_Position[]" required><br>
            </div>
            <div class="useroffice">
                <label>Office:</label>
                <select name="user_Office[]" class="dropdownuserOffice" id="userOfficeSelect"> 
                    <option value="">Select Office</option>
                    <option value="Accounting">Accounting</option>
                    <option value="Assistant Schools Division Superintendent">Assistant Schools Division Superintendent</option>
                    <option value="BAC">BAC</option>
                    <option value="Budget">Budget</option>
                    <option value="Cashier">Cashier</option>
                    <option value="Commission on Audit">Commission on Audit</option>
                    <option value="Curriculum Implementation Division">Curriculum Implementation Division</option>
                    <option value="General Services">General Services</option>
                    <option value="Information Communications Technology">Information Communications Technology</option>
                    <option value="Legal">Legal</option>
                    <option value="Payroll">Payroll</option>
                    <option value="Personnel">Personnel</option>
                    <option value="Property and Supply">Property and Supply</option>
                    <option value="Records">Records</option>
                    <option value="Schools Division Superintendent">Schools Division Superintendent</option>
                    <option value="School Governance Operations Division">School Governance Operations Division</option>
                </select>
            </div>
            <div class="centercode">
                <label>Center Code:</label>
                <input type="text" name="center_Code[]" required>
            </div>
            <div class="depedemail">
                <label>Deped Email:</label>
                <input type="email" placeholder="example@deped.gov.ph" name="deped_Email[]" id="depedEmailInput" required pattern=".+@deped\.gov\.ph$">
            </div>
            <script>
    
            </script>
            <div class="accountpass">
                <label>Password:</label>
                <input type="text" name="account_Pass[]" required>
            </div>

            <div class="buttons">
                <input class="Register" type="submit" name="register" id="register" value="Register">
                <button type="button" class="Close" onclick="closeAdd()">Close</button>    
            </div>
        
        </form> 
    </div>
    <!-----Add Propmpt END------->



    <!-----Edit Prompt------->              
    <div class="popup2" id="popup2">
        <form method="POST" action="edit_account.php">
            <h2>EDIT ACCOUNT</h2>
            <?php //To connect Dropdown to database
                $sql = "SELECT depedEmail FROM ris_accounts ORDER BY depedEmail ASC";
                $result = $conn->query($sql);
            ?>
            <select name="selected_email" id="selectedEmail" class="dropdownedit"> 
                <?php //Dropdownlist
             
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()){
                            echo "<option value='" . $row['depedEmail'] . "'>" . $row['depedEmail'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No items available</option>";
                    }
            
                ?>
            </select>

            <div class="User_Office">
                <label for="useroffice">Office:</label>
                <input type="text" name="useroffice" id="userOffice" required>
            </div>
            <div class="User_Position">
                <label>Position:</label>
                <input type="text" name="userposition" id="userPosition" required>
            </div>
            <div class="Center_Code">
                <label>Center Code:</label>
                <input type="text" name="centercode" id="centerCode" required>
            </div>
            <div class="buttons2">
                <button type="submit" class="Save2">Save</button>
                <button type="button" class="Close2" onclick="closeEdit()">Close</button>
            </div>
        </form>
    </div>

    <!-----Edit Prompt------->



    <!-----Delete Prompt------->
    <div class="popup3" id="popup3">
        <form method="POST" action="delete_account.php">
            <h2>DELETE INVENTORY</h2>
            <?php //To connect Dropdownlist to database
                $sql = "SELECT depedEmail FROM ris_accounts ORDER BY depedEmail ASC";
                $result = $conn->query($sql);
                ?>

                <select name="selected_item_delete" class="dropdowndelete"> 
                    <?php //Dropdownlist Delete
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()){
                            echo "<option value='" . $row['depedEmail'] . "'>" . $row['depedEmail'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No items available</option>";
                    }
                    ?>
                </select>
                <div class="buttons3">
                    <button type="submit" class="Delete" name="delete_account">DELETE</button>
                    <button type="button" class="Close3" onclick="closeDelete()">Close</button>
                </div>
        </form>   
    </div>
    <!-----Delete Prompt------->

    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="Accounts_inventory.js"></script>
    <script src="disableBackButton.js"></script>
    <!--<script src="autoLogoutFunction.js"></script>-->
   
</body>
</html>