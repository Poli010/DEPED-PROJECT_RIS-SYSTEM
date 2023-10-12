$(document).ready(function() {
    $.ajax({
        url: 'https://worldtimeapi.org/api/ip',
        dataType: 'json',
        success: function(data) {
            const onlineDate = new Date(data.utc_datetime);
            const localDate = new Date();

            if (areDatesDifferent(onlineDate, localDate)) {
                displayDateMismatchError();
            } else {
                document.querySelector('.releaseDate').value = getFormattedDate(onlineDate);
            }
        },
        error: function(error) {
            console.error('Error fetching online date:', error);
        }
    });

    function getFormattedDate(date) {
        const day = date.getDate() < 10 ? "0" + date.getDate() : date.getDate();
        const month = (date.getMonth() + 1) < 10 ? "0" + (date.getMonth() + 1) : (date.getMonth() + 1);
        const year = date.getFullYear();
        return `${month}/${day}/${year}`;
    }

    function areDatesDifferent(date1, date2) {
        // Check if the difference in milliseconds is greater than a tolerance (e.g., 1000 milliseconds)
        const tolerance = 1000; // Adjust as needed
        return Math.abs(date1.getTime() - date2.getTime()) > tolerance;
    }

    function displayDateMismatchError() {
        // Display an error message to the user
        alert("Your device's date is not the same as the World Time API. You will be logged out. Please sync your device's time.");
        // Redirect the user to logout.php
        window.location.href = 'logout.php';
    }
});