<?php
    session_start();
    require("databaseConnection.php");
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="queuing system.css">
    <link rel="icon" type="png" href="logos/depedcsjdmlogo.png">
    <title>DepEd CSJDM Electronic Requisition and Issue Slip (E-RIS) Form</title>
</head>
<body>
    <header>
        <img src="logo/depedlogo.png" alt="">
        <div class="headerTitles">
            <h3>Republic of the Philippines</h3>
            <br>
            <h2>Department of Education</h2>
            <br>
            <h3>Region III</h3>
            <br>
            <h1>SCHOOLS DIVISION OF CITY OF SAN JOSE DEL MONTE</h1>
        </div>
        <a href="usermanagement.php" class="backbtn">BACK</a>
    </header>
    <div class="title">
        <h2>QUEUE LOGS</h2>
    </div>
    <form action="" method="post">
        <div class="scroll">
            <table id="table" border="1">
                <tr>
                    <div class="headrow">
                        <th class="table-number">No.</th>
                        <th class="table-name">Name</th>
                        <th class="table-date">Date Requested</th>
                        <th class="table-button-release">Action</th>
                    </div>
                </tr>
                <div class="row2">
                    <?php
                        $sql = "SELECT accountName, referenceCode, dateRequested FROM queue_logs";
                        $result = mysqli_query($conn, $sql);
                        $rowNumber = 1;
                        $previousAccountName = null;
                        $previousreferenceCode = null;

                        while ($row = mysqli_fetch_assoc($result)) {
                            $currentAccountName = $row["accountName"];
                            $currentreferenceCode = $row["referenceCode"];
                            $dateRequested = $row['dateRequested'];

                            if ($currentAccountName !== $previousAccountName || $currentreferenceCode !== $previousreferenceCode) {
                    ?>
                    <tr>
                        <td class="rowNumber"><?php echo $rowNumber; ?></td>
                        <td class="accountName"><?php echo $currentAccountName; ?></td>
                        <td class="dateRequested"><?php echo $dateRequested; ?></td>
                        <td>
                            <a href="queuing_release.php?referenceCode=<?php echo $currentreferenceCode; ?>" class="openRelease">Click to Open</a>
                        </td>
                
                    </tr>
                    <?php
                                $previousAccountName = $currentAccountName;
                                $previousreferenceCode = $currentreferenceCode;
                                $rowNumber++;
                            }
                        }
                    ?>
                </div>
            </table>
    </div>
    </form>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="autoUpdateQueueingLogs.js"></script>
</body>
</html>
