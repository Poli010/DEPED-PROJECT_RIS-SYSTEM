<?php
session_start();

// Assuming you have a database connection
require("databaseConnection.php");

// Get the current year
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
        $data = array("lastSeriesNumber" => $lastSeriesNumber, "currentYear" => $currentYear);
        echo $lastTimeStamp;
        echo $lastYear;
        echo json_encode($data);
    } else {
        echo json_encode(array("lastSeriesNumber" => 0, "lastYear" => 0));
    }

// Close the database connection
$conn->close();
?>
