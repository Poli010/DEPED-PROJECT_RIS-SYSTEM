<?php
    session_start();
    require("databaseConnection.php");
    $query = "select * from request_logs";
    $result = mysqli_query($conn,$query);


?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="png" href="logos/depedcsjdmlogo.png"> 
    <link rel="stylesheet" href="request_logs.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>DepEd CSJDM Electronic Requisition and Issue Slip (E-RIS) Form</title>
</head>
<body>
    <header>
        <img src="logo/depedlogo.png" alt="">
        <div class="searchbar">
            <input type="text" id="searchInput" placeholder="Search....." oninput="searchTable()">
        </div>
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
        <button type="button" class="convertbtn" name="convert_excel" id="convert_excel"  onclick="exportTableToExcel('table')">Convert To Excel</button>
    
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
    
    <h2>REQUEST LOGS</h2>

    
    <div class="select">
        <h4>Filter:</h4>
        <label for="filterFrom">Date Release From:</label>
        <select id="filterFrom" onchange="filterTable()">
            <option value="">All</option>
            <?php
            // Query distinct date values from your database
            $dateQuery = "SELECT DISTINCT releaseDate FROM request_logs";
            $dateResult = mysqli_query($conn, $dateQuery);

            while ($dateRow = mysqli_fetch_assoc($dateResult)) {
                echo '<option value="' . $dateRow["releaseDate"] . '">' . $dateRow["releaseDate"] . '</option>';
            }
            ?>
        </select>

        <label for="filterTo">To:</label>
        <select id="filterTo" onchange="filterTable()">
            <option value="">All</option>
            <?php
            // Query distinct date values from your database
            $dateQuery = "SELECT DISTINCT releaseDate FROM request_logs";
            $dateResult = mysqli_query($conn, $dateQuery);

            while ($dateRow = mysqli_fetch_assoc($dateResult)) {
                echo '<option value="' . $dateRow["releaseDate"] . '">' . $dateRow["releaseDate"] . '</option>';
            }
            ?>
        </select>
        <div class="select_item">
            <label for="filterBy">Item Description:</label>
            <select id="filterBy" onchange="filterTable2()">
                <option value="">All</option>
                <?php
                // Query the unique item descriptions from your database
                $itemQuery = "SELECT DISTINCT item_description FROM request_logs ORDER BY item_description ASC";
                $itemResult = mysqli_query($conn, $itemQuery);

                while ($itemRow = mysqli_fetch_assoc($itemResult)) {
                    echo '<option value="' . $itemRow["item_description"] . '">' . $itemRow["item_description"] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="select_name">
            <label for="filterName">Name:</label>
            <select id="filterName" onchange="filterTable2()">
                <option value="">All</option>
                <?php
                // Query the unique item descriptions from your database
                $itemQuery = "SELECT DISTINCT accountName FROM ris_accounts ORDER BY accountName ASC";
                $itemResult = mysqli_query($conn, $itemQuery);

                while ($itemRow = mysqli_fetch_assoc($itemResult)) {
                    echo '<option value="' . $itemRow["accountName"] . '">' . $itemRow["accountName"] . '</option>';
                }
                ?>
            </select>
        </div>
        <form action="" method="get">
            <div class="sorting">
                <label for="sort_option">Sort:</label>
                <select name="sort_option" id="sort_option" onchange="sortTable()">
                    <option value="">By RIS No.</option>
                    <option value="low-high">Ascending</option>
                    <option value="high-low">Descending</option>
                </select>
            </div>
        </form>
        <div class="total-quantity">
            <label for="totalQuantity">Total Quantity Requested:</label>
            <input type="text" id="totalQuantity" readonly>
        </div>

    </div>



    <div class="scroll">
        <table id="table" border="1">
            <tr>
                <div class="headrow">
                    <th class="RIS-number">RIS No.</th>
                    <th class="account-name">Name</th>
                    <th class="center-code">Center Code</th>
                    <th class="user-office">Office</th>
                    <th class="stock-no">Stock No.</th>
                    <th class="item-description">Item Description</th>
                    <th class="stock-unit">Stock Unit</th>
                    <th class="quantity-input">Quantity Requested</th>
                    <th class="form-date">Date Requested</th>
                    <th class="form-date">Date Released</th>
                </div>
            </tr>
            <tr>
                <div class="row2">
                    <?php
                        
                        $selectQuery = "SELECT * FROM request_logs ORDER BY risNoDate DESC";
                        $result = mysqli_query($conn, $selectQuery);
                        $rowNumber = 1;
                        while($row = mysqli_fetch_assoc($result))
                        {
                    ?>
                        
                        <td class ="RISno"><?php echo $row["risNoDate"];?></td>
                        <td class ="align-account-name"><?php echo $row["accountName"];?></td>
                        <td class ="align-center-code"><?php echo $row["centerCode"];?></td>
                        <td class ="align-user-office"><?php echo $row["userOffice"];?></td>
                        <td class="align-stock-no"><?php echo $row["stock_number"];?></td>
                        <td class="align-item-description"><?php echo $row["item_description"];?></td>
                        <td class ="align-stock-unit"><?php echo $row["stock_unit"];?></td>
                        <td class="align-quantity-input"><?php echo $row["quantityInput"];?></td>
                        <td class="align-form-date"><?php echo $row["formDate"];?></td>
                        <td class="align-release-date"><?php echo $row["releaseDate"];?></td>
            </tr>
                    <?php
                       
                        }
                    ?>
                </div>
        </table>
    </div>
   



  
<script src="autoLogoutFunction.js"></script>
<script src="request_logs.js"></script>
<script src="table2excel.js"></script>
</body>
</html>