<?php
session_start();

require("databaseConnection.php");

$success = false;
$errors = array();

// Function to get the last series number from the database
function getLastSeriesNumber($conn) {
    $currentYear = date("Y");

    // Query to get the latest data in the seriesNumber and yearRequested columns
    $sql = "SELECT timeStamp, seriesNumber, yearRequested FROM request_logs ORDER BY timeStamp DESC LIMIT 1";
        
    $result = $conn->query($sql);
        
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lastTimeStamp = $row['timeStamp'];
        $lastSeriesNumber = $row["seriesNumber"];
        $lastYear = $row["yearRequested"];
        
        // Check if the last year in the database is the same as the current year
        if ($lastYear == $currentYear) {
            // If it's the same year, increment the seriesNumber
            $lastSeriesNumber++;
        } else {
            // If it's a different year, reset the seriesNumber to 1
            $lastSeriesNumber = 1;
        }
        return intval($lastSeriesNumber);
    } else {
        $lastSeriesNumber = 1;
        return intval($lastSeriesNumber);
    }
}

if (isset($_POST['btnRelease'])) {
    // Get the reference code and yearRequested from the form
    $referenceCode = $_POST['referenceCode'];
    $yearRequested = intval($_POST['yearRequested']); // Assuming yearRequested is in POST data

    // Increment the seriesNumber only once per request
    $lastSeriesNumber = getLastSeriesNumber($conn);
    $formattedSeriesNumber = str_pad($lastSeriesNumber, 6, '0', STR_PAD_LEFT);

    // Retrieve data from the queue_logs table for the specific reference code
    $selectSql = "SELECT * FROM queue_logs WHERE referenceCode = '$referenceCode'";
    $result = mysqli_query($conn, $selectSql);

    if ($result) {
        // Loop through the result set to fetch all rows
        while ($row = mysqli_fetch_assoc($result)) {
            $yearRequested = intval($_POST['yearRequested']); // Assuming yearRequested is in POST data
            $releaseDate = $_POST['releaseDate'];
            $risNoDate = $_POST['risNoDate'];
            $accountName = $row['accountName'];
            $centerCode = $row['centerCode'];
            $stock_number = $row['stock_number'];
            $item_description = $row['item_description'];
            $stock_unit = $row['stock_unit'];
            $quantityInput = $row['quantityInput'];
            $dateRequested = $row['dateRequested'];
            $userOffice = $row['userOffice'];

            // Construct the INSERT query for request_logs with interpolated values
            $insertSql = "INSERT INTO request_logs (releaseDate ,userOffice, risNoDate, seriesNumber, yearRequested, accountName, centerCode, stock_number, item_description, stock_unit, quantityInput, formDate) VALUES (
                '$releaseDate',
                '$userOffice',
                '$risNoDate',
                '$formattedSeriesNumber',
                '$yearRequested',
                '$accountName',
                '$centerCode',
                '$stock_number',
                '$item_description',
                '$stock_unit',
                '$quantityInput',
                '$dateRequested'
            )";

            // Execute the INSERT query
            $insertResult = mysqli_query($conn, $insertSql);

            if ($insertResult) {
                // Data inserted into request_logs successfully

                // Delete data from the queue_logs table
                $deleteSql = "DELETE FROM queue_logs WHERE referenceCode = '$referenceCode'";
                $deleteResult = mysqli_query($conn, $deleteSql);

                if ($deleteResult) {
                    // Data deleted from queue_logs successfully
                    $success = true;
                } else {
                    $errors[] = 'Error deleting data from the database for referenceCode: ' . $referenceCode;
                }
            } else {
                $errors[] = 'Error inserting data into request_logs for referenceCode: ' . $referenceCode;
            }
        }
    } else {
        $errors[] = 'Error executing SELECT statement for referenceCode: ' . $referenceCode;
    }
} else {
    $errors[] = 'The button was not clicked.';
}

// Close the database connection
mysqli_close($conn);

if ($success && empty($errors)) {
    // Redirect to queueing_system.php
    header("Location: queuing system.php");
    exit(); // Terminate the script
}
// Return the response with success and errors
$response = [
    'success' => $success,
    'errors' => $errors,
];
echo json_encode($response);
?>