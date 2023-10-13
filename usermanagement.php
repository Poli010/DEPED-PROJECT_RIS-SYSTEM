<?php
    session_start();

    require_once("add_inventory.php");
    $query = "select * from inventory";
    $result = mysqli_query($conn,$query);

?>



<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DepEd CSJDM Electronic Requisition and Issue Slip (E-RIS) Form</title>
    <link rel="icon" type="image/x-icon" href="logos/depedcsjdmlogo.png">
    <link rel="stylesheet" href="usermanagementstyle.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@0;1&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>

    <header>
        <img src="logo/depedlogo.png" alt="">
        <div class="searchbar">
            <input type="text" id="searchInput" placeholder="Search Item Description...." oninput="searchTable()">
             
        </div>
        
        <nav>
            <ul>
                <li>
                    <div class="update">
                        <a href="#">UPDATE</a>
                        <ul class="dropdown">
                            <li><a href="#" onclick="openAdd()">INVENTORY</a></li>
                            <li><a href="#" onclick="openEdit()">QUANTITY</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="settings1">
                        <a href="#">SETTINGS</a>
                        <ul class="settings">
                            <li><a href="queuing system.php">QUEUING</a></li>
                            <li><a href="usermanager_ris.php">RIS FORM</a></li>
                            <li><a href="changePasswordForm.php">CHANGE PASSWORD</a></li>
                            <li><a href="logout.php">LOGOUT</a></li>
                        </ul>
                    </div>
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
    <div class="title">
        <h2>ITEM INVENTORY UNIT</h2>
    </div>
    <form action="" method="get">
        <div class="sorting">
            <label for="sort_option">Sort:</label>
            <select name="sort_option" id="sort_option" onchange="sortTable()">
                <option value="">Alphabetical</option>
                <option value="low-high">Ascending</option>
                <option value="high-low"> Descending</option>
            </select>
        </div>
    </form>

    <div class="scroll">
    <table id="table">
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
                    <td class = "align-stock-number"><?php echo $row["stock_number"];?></td>
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

    <input type="hidden" name="accountName" class="accountName" value="<?php if (isset($_SESSION['accountName'])) {echo $_SESSION['accountName'];}?>">
    
    <!-----Add Propmpt------->
    <div class="popup" id="popup">
        <form class="insert_form" id="insert_form" method="post" action="" onsubmit="return validateForm();">
            <h2>UPDATE INVENTORY</h2> 
            <div class="Item">
                <label for="item_description">Item Description:</label>
                <input type="text" name="item_description[]" required><br>
            </div>
            <div class="Stock">
                <label>Stock No.:</label>
                <input type="text" name="stock_number[]" required><br>
            </div>
            <div class="Unit">
                <label>Unit:</label>
                <select name="stock_unit[]" class="dropdownunit"> 
                    <option value="Book">Book</option>
                    <option value="Bottle">Bottle</option>
                    <option value="Box">Box</option>
                    <option value="Bundle">Bundle</option>
                    <option value="Can">Can</option>
                    <option value="Cart">Cart</option>
                    <option value="Gallon">Gallon</option>
                    <option value="Jar">Jar</option>
                    <option value="Pack">Pack</option>
                    <option value="Pair">Pair</option>
                    <option value="Piece">Piece</option>
                    <option value="Reams">Reams</option>
                    <option value="Roll">Roll</option>
                    <option value="Set">Set</option>
                    <option value="Unit">Unit</option>
                </select>
            </div>
            <div class="Quantity">
                <label>Quantity:</label>
                <input type="text" name="item_quantity[]" required>
            </div>
            <div class="buttons">
                <input class="Save" type="submit" name="save" id="save" value="Save">
                <button type="button" class="Close" onclick="closeAdd()">Close</button>    
            </div>
        
        </form> 
    </div>
    <!-----Add Propmpt------->


 

    <!-----Edit Prompt------->
    <div class="popup2" id="popup2">
        <form method="POST" action="edit_inventory.php">
            <h2>UPDATE QUANTITY</h2>
            <?php //To connect Dropdown to database
                $sql = "SELECT stock_number, item_description FROM inventory ORDER BY item_description ASC";
                $result = $conn->query($sql);
            ?>
            <select name="selected_item" class="dropdownedit"> 
                <?php //Dropdownlist
             
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()){
                            echo "<option value='" . $row['stock_number'] . "'>" . $row['item_description'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No items available</option>";
                    }
            
                ?>
            </select>

            <div class="Quantity2">
                <label for="addQuantity">Quantity:</label>
                <input type="text" name="add_quantity" id="addQuantity" required>
            </div>

            <div class="buttons2">
                <button type="submit" class="Save2">Add</button>
                <button type="button" class="Close2" onclick="closeEdit()">Close</button>
            </div>

            <input type="hidden" class="formDate" name="formDate" readonly>
            <script type="text/javascript" src="getCurrentDate.js"></script>
        </form>
    </div>

    <!-----Edit Prompt------->

    <!---FOR ALERT!!---->
    <?php //To connect Dropdownlist to database
                $sql = "SELECT stock_number, item_description FROM inventory ORDER BY item_description ASC";
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
    <!---FOR ALERT!!---->
    <script src="usermanagementscript.js"></script>
    
    <!-- DISABLED BACK BUTTON -->
    <script>
          history.pushState(null, null, location.href);
          window.onpopstate = function () {
              history.go(1);
          };
    </script>

    <!-- AUTO-LOGOUT FUNCTION -->
   <!--- <script>
        let inactivityTimeout;

        function resetInactivityTimer() {
            clearTimeout(inactivityTimeout);
            inactivityTimeout = setTimeout(logout, 60000);
        }

        document.addEventListener('mousemove', resetInactivityTimer);
        document.addEventListener('keydown', resetInactivityTimer);

        function logout() {
            window.location.href = 'logout.php';
        }

        resetInactivityTimer();
    </script>--->


</body>
</html>