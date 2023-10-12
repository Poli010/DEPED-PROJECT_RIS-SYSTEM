<?php

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["item_description"])) {
        $selectedItemDescription = $_POST["item_description"];

        require("databaseConnection.php");
        
        $sql = "SELECT stock_number, stock_unit FROM inventory WHERE item_description = '$selectedItemDescription'";
        $result = $conn->query($sql);

        if ($row = $result->fetch_assoc()) {
            $stockNumber = $row["stock_number"];
            $stockUnit = $row["stock_unit"];
            echo json_encode(array("stockNumber" => $stockNumber, "stockUnit" => $stockUnit));
        } else {
            echo json_encode(array("stockNumber" => "", "stockUnit" => ""));
        }    

        $conn->close();
    }
?>