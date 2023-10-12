<?php
// Connect to the database (replace with your actual database connection code)
require("databaseConnection.php");

if (isset($_GET['referenceCode'])) {
    $referenceCode = $_GET['referenceCode'];

    // Query your database to fetch the data based on the referenceCode
    $sql = "SELECT * FROM queue_logs WHERE referenceCode = '$referenceCode'";
    $result = mysqli_query($conn, $sql);

    // Check if any rows are found
    if (mysqli_num_rows($result) > 0) {
        // Initialize an array to store the data
        $data = array();

        // Loop through the result set to fetch all rows
        while ($row = mysqli_fetch_assoc($result)) {
            // Store each row's data in the array
            $data[] = $row;
        }

        // Now, you can work with the $data array, which contains all matching rows
        foreach ($data as $row) {
            $yearRequested = $row['yearRequested'];
            $accountName = $row['accountName'];
            $stock_number = $row['stock_number'];
            $stock_unit = $row['stock_unit'];
            $item_description = $row['item_description'];
            $quantityInput = $row['quantityInput'];
            $centerCode = $row['centerCode'];
            $userOffice = $row['userOffice'];
            $userPosition = $row['userPosition'];
            $purpose = $row['purpose'];
            $dateRequested = $row['dateRequested'];
            // Populate other fields as needed
        }

        // Close the table or perform any other necessary actions
    } else {
        // Handle the case where no matching rows are found
    }
}


?>

