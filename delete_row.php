<?php
require("databaseConnection.php");
if (isset($_POST['referenceCode'])) {
        $referenceCode = $_POST['referenceCode'];

        // Prepare and execute the DELETE query
        $sql = "DELETE FROM queue_logs WHERE referenceCode = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $referenceCode);

        if (mysqli_stmt_execute($stmt)) {
            echo "Row with referenceCode '$referenceCode' deleted successfully.";
        } else {
            echo "Error deleting row: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Invalid request.";
    }

    mysqli_close($conn);
    ?>