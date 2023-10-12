<?php
    session_start();
    require("databaseConnection.php");
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
    <link rel="stylesheet" href="superadmin_inventory.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
        <img src="logo/depedlogo.png" alt="">
        <div class="searchbar">
            <input type="text" id="searchInput" placeholder="Search Item Description...." oninput="searchTable()">
        </div>
        <button type="button" class="convertbtn" name="convert_excel" id="convert_excel"  onclick="exportTableToExcel('table')">Convert To Excel</button>  
        <button type="button" class="deletebtn" name="delete_item1" onclick="openDelete()">DELETE</button>  
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
    
    <h2>ITEM INVENTORY</h2>
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
    <form action="" method="get">
        <div class="sorting">
            <label for="sort_option">Sort:</label>
            <select name="sort_option" id="sort_option" onchange="sortTable()">
                <option value="">Alphabetical</option>
                <option value="low-high">Ascending</option>
                <option value="high-low">Descending</option>
            </select>
        </div>
    </form>

  
    <div class="scroll">
        <table id="table" border="1">
            <tr>
                <div class="headrow">
                    <th class="table-number">No.</th>
                    <th class="table-stock">Stock No.</th>
                    <th class="table-unit">Unit</th>
                    <th class="table-item">Item Description</th>
                    <th class="table-quantity">Quantity</th>
                </div>
            </tr>
            <tr>
                <div class="row2">
                    <?php
                        $sql = "SELECT * FROM inventory ORDER BY item_description ASC";
                        $result = mysqli_query($conn, $sql);
                        $rowNumber = 1;
                        while($row = mysqli_fetch_assoc($result))
                        {
                    ?>
                        <td><?php echo $rowNumber;?></td>
                        <td><?php echo $row["stock_number"];?></td>
                        <td><?php echo $row["stock_unit"];?></td>
                        <td class="align-item-description"><?php echo $row["item_description"];?></td>
                        <td><?php echo $row["item_quantity"];?></td>
            </tr>
                    <?php
                        $rowNumber++;
                        }
                    ?>
                </div>
        </table>
    </div>
    <!-----Delete Prompt------->
    <div class="popup3" id="popup3">
        <form method="POST" action="superadmin_deleteinventory.php">
            <h2>DELETE INVENTORY</h2>
            <?php //To connect Dropdownlist to database, delete only items not on queue logs
                $sql = "SELECT i.item_description FROM inventory i LEFT JOIN queue_logs q ON i.item_description = q.item_description WHERE q.item_description IS NULL ORDER BY i.item_description ASC";

                $result = $conn->query($sql);
                ?>

                <select name="item" class="dropdowndelete"> 
                    <?php //Dropdownlist Delete
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()){
                            echo "<option value='" . $row['item_description'] . "'>" . $row['item_description'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No items available</option>";
                    }
                    ?>
                </select>
                <div class="buttons3">
                    <button type="submit" class="Delete" name="delete_item" id="delete_item">DELETE</button>
                    <button type="button" class="Close3" onclick="closeDelete()">Close</button>
                </div>
                
        </form>   
    </div>
    <!-----Delete Prompt------->
    <script src="table2excel.js"></script>
    <script src="autoLogoutFunction.js"></script>
    <script src="superadmin_inventory.js"></script>
</body>
</html>