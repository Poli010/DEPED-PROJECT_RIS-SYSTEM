<?php
session_start();
require("databaseConnection.php");

$sql = "SELECT accountName, referenceCode, dateRequested FROM queue_logs";
$result = mysqli_query($conn, $sql);
$rowNumber = 1;
$previousAccountName = null;
$previousreferenceCode = null;

$html = '<tr>
            <div class="headrow">
                <th class="table-number">No.</th>
                <th class="table-name">Name</th>
                <th class="table-date">Date Requested</th>
                <th class="table-button-release">Action</th>
            </div>
        </tr>';

while ($row = mysqli_fetch_assoc($result)) {
    $currentAccountName = $row["accountName"];
    $currentreferenceCode = $row["referenceCode"];
    $dateRequested = $row["dateRequested"];

    if ($currentAccountName !== $previousAccountName || $currentreferenceCode !== $previousreferenceCode) {
        $html .= '<tr>
                    <td>' . $rowNumber . '</td>
                    <td>' . $currentAccountName . '</td>
                    <td>' . $dateRequested . '</td>
                    <td>
                        <a href="queuing_release.php?referenceCode=' . $currentreferenceCode . '" class="openRelease">Click to Open</a>
                    </td>
                </tr>';
        $previousAccountName = $currentAccountName;
        $previousreferenceCode = $currentreferenceCode;
        $rowNumber++;
    }
}

echo $html;
?>
