<?php
    require("databaseConnection.php");

    $sql = "SELECT item_description FROM inventory ORDER BY item_description ASC";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['item_description'] . '">' . $row['item_description'] . '</option>';
    }

    $conn->close();
?>