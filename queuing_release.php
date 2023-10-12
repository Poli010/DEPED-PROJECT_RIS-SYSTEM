<?php
session_start();
require_once("queuing_release_autofillup.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="queuing_release.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="icon" type="png" href="logos/depedcsjdmlogo.png">
    
    <title>DepEd CSJDM Electronic Requisition and Issue Slip (E-RIS)Form</title>

</head>

<body>
    <header>
        <img src="logo/depedlogo.png" alt="">  
        <a href="queuing system.php" class="backbtn">BACK</a>
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
    
    <br>
    <br>
    <div id="formContainer">
        <form class="risFORM "action="insert_data.php" method="POST">
            <table id="forRIS1" border="1">
            <tr reference-data-code = "referenceCode">
                <input type="hidden" name="referenceCode" value="<?php echo isset($referenceCode) ? $referenceCode : ''; ?>">
                <input type="hidden" name="yearRequested" class="yearRequested" value="<?php echo isset($yearRequested) ? $yearRequested : ''; ?>">

                <tr>
                    <div class="formHeader">
                        <th colspan="8">
                            Division of City Schools
                            <br>
                            City of San Jose del Monte
                            <br>
                        <div class="entityDeped">
                            Entity Name: DepEd
                        </div>
                        <div class="fundCluster">
                            Fund Cluster: 01101101
                        </div>
                        </th>
                    </div>
                </tr>

                <tr>
                    <th colspan="8">
                        <div class="cityDivision">
                            Division:
                        </div>
                        <div class="locationDivision">
                            City of San Jose del Monte
                        </div>
                        <div class="centerCode">
                            Responsibility Code: 
                        </div>
                            <div class="centerCodePHP">
                                <?php echo isset($centerCode) ? $centerCode : ''; ?>
                            </div>
                        </div>
                        <div class="userOffice">
                            Office: 
                            <div class="userOfficePHP">
                            <?php echo isset($userOffice) ? $userOffice : ''; ?>
                            </div>
                        </div>
                        <div class="risNo">
                            RIS No.:
                            <input readonly type="text" name="risNoDate" class="risNoDate" readonly>
                            <script src="getrisNoDate.js"></script>
                        </div>
                    </th>
                </tr>

                <tr colspan="8">
                    <th colspan="4"><i>Requisition</i></th>
                    <th colspan="2"><i>Stock Available?<i></th>
                    <th colspan="2"><i>Issuance<i></th>
                </tr>

                <tr colspan="8">
                    <th class="stock_number">Stock No.</th>
                    <th class="stock_unit">Unit</th>
                    <th class="itemDescription_title">Item Description</th>
                    <th class="quantityInput">Quantity</th>
                    <th class="yesInputCheck">Yes</th>
                    <th class="noInputCheck">No</th>
                    <th class="quantityInput">Quantity</th>
                    <th class="issuedRemarks">Remarks</th>
                </tr>
                

                <!---------FOR EACH --------->
            
                <?php
                    $rowCount = isset($data) ? count($data) : 0;
                    $maxRows = 10; // Define the maximum number of rows you want to display
                    

                    // Loop to create 10 rows and display data independently
                    for ($i = 0; $i < $maxRows; $i++) {
                        echo "<tr colspan='8'>";
                        if ($i < $rowCount) {
                            // If there is data available, populate the cells
                            echo "<tr data-reference-code='$referenceCode'>";
                            $stock_number = $data[$i]['stock_number'];
                            $stock_unit = $data[$i]['stock_unit'];
                            $item_description = $data[$i]['item_description'];
                            $quantityInput = $data[$i]['quantityInput'];
                            echo "<th colspan='1' height='18px' class='stock-number'>$stock_number</th>";
                            echo "<th colspan='1' class='stock-unit'>$stock_unit</th>";
                            echo "<th colspan='1' class='item-description'>$item_description</th>";
                            echo "<th colspan='1' class='quantity-Input'>$quantityInput</th>";
                            
                        } else {
                            // If there is no data, create empty cells
                            echo "<th colspan='1' height='18px' class='stock_number'></th>";
                            echo "<th colspan='1' class='stock_unit'></th>";
                            echo "<th></th>";
                            echo "<th class='quantityInput'></th>";
                        }
                            echo "<th class='yesInputCheck'></th>";
                            echo "<th class='noInputCheck'></th>";
                            echo "<th class='quantityInput'></th>";
                            echo "<th class='issuedRemarks'></th>";
                            echo "</tr>";
                    }
                ?>

                <!---------FOR EACH END--------->
                 
            
                    
                    
                    
                

                <tr>
                    <th class="purposeSection" colspan="8">
                        <div class="purposeTitle">
                            Purpose:
                        </div>
                        <div>
                            <input readonly class="purposeInput" type="text" name="purpose" id="" readonly value="<?php echo isset($purpose) ? $purpose : ''; ?>">
                        </div>
                    </th>
                </tr>

                <tr>
                    <th colspan="1">
                        <div id="signature">
                            Signature
                        </div>
                    </th>
                    <th class="requestedBy" colspan="2">
                        <div class="requestedBy">
                            Requested by:
                        </div?>
                    </th>

                    <th colspan="2">
                        <div class="approvalDiv">
                            Approved by:
                        </div>
                    </th>
                    <th colspan="2">
                        <div class="approvalDiv">
                            Issued by:</th>
                        </div>
                    </th>
                    <th colspan="1">
                        <div class="approvalDiv">
                            Received by: 
                        </div>
                    </th>
                </tr>

                <tr>
                    <th colspan="1" class="firstcolumn_Approval">
                        <div class="firstcolumn_Approval">
                            Printed Name
                        </div>
                    </th>
                    <th class="accountName" colspan="2">
                        <div class="accountName">
                            <?php echo isset($accountName) ? $accountName : ''; ?>
                        </div>
                    </th>
                    <th class="approvedByName" colspan="2">
                        <div class="approvedByName">
                            Ma. Theresa M. Roxas
                        </div>
                    </th>
                    <th class="issuedByName" colspan="2">
                        <div class="issuedByName">
                            Mary Lalaine <br> Rachel T. Manguisi
                        </div>
                    </th>
                    <th class="accountName"colspan="1">
                      <div class="accountName">
                        <?php echo isset($accountName) ? $accountName : ''; ?>
                      </div>
                    </th>
                </tr>

                <tr>
                    <th colspan="1">
                        <div id="designationID">
                            Designation
                        </div>
                    </th>
                    <th colspan="2">
                        <div class="userPosition">
                            <?php echo isset($userPosition) ? $userPosition : ''; ?>
                        </div>
                    </th>
                    <th colspan="2">
                        <div id="approverPosition">
                            AO IV (Supply)
                        </div>
                    </th>
                    <th colspan="2">
                        <div id="issuerPosition">
                            AA I
                        </div>
                    </th>
                    <th colspan="1">
                        <div class="userPosition">
                            <?php echo isset($userPosition) ? $userPosition : ''; ?>
                        </div>
                    </th>
                </tr>

                <tr>
                    <th colspan="1">
                        <div id="dateToday">
                            Date
                        </div>    
                    </th>
                    <th colspan="2">
                        <div class="dateRequested">
                            <?php echo isset($dateRequested) ? $dateRequested : ''; ?>
                        </div>
                    </th>
                    <th colspan="2"></th>
                    <th colspan="2"></th>
                    <th colspan="1">
                        <input readonly type="text" class="releaseDate" name="releaseDate">
                    </th>
                </tr>
            </tr>
            </table>
            <button type="submit" class="btnRelease" name="btnRelease" id="btnRelease">RELEASE</button>
        </form>
       <br>
       <br>
       <br>
    </div>
    
    <div class="buttonContainer">
        <span class="forRelease">
            <button type="submit" class="generatePDF" name="generatePDF" id="generatePDF" onclick="enableReleaseButton()">RELEASE</button>
        </span>
        
        <span class="forCancel">
            <button type="submit" class="btnCancel" name="btnCancel" id="btnCancel">CANCEL</button>
        </span>
    </div>
    
    
    <!-- GENERATE PDF FUNCTION -->
    <script src="generatePdf.js"></script>

    <!-- SEND DATA TO DATABASE -->
    <script type="text/javascript" src="sendDataToDatabase.js"></script>
    <script src="queuing_release.js"></script>

    <!-- GET RELEASE DATE -->
    <script src="getCurrentDateForRelease.js"></script>

    <script src="autoLogoutFunction.js"></script>
</body>
</html>