<?php

    require("databaseConnection.php");

    $itemDescription = $_POST['item_description'];

    // Fetch item_quantity based on the selected item_description
    $sql = "SELECT item_quantity FROM inventory WHERE item_description = '$itemDescription'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['item_quantity'];
    } else {
        // Handle the case when the item_description is not found
        echo "0";
    }

    $conn->close();
?>