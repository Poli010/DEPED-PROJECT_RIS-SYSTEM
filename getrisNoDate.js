//code still for testing

/*$(document).ready(function() {
    // Fetch the last series number and year from cookies
    let lastSeriesNumber = parseInt(getCookie("lastSeriesNumber"));
    let lastYear = getCookie("lastYear");

    // Get the current year and month from World Time API
    $.ajax({
        url: 'https://worldtimeapi.org/api/ip',
        dataType: 'json',
        success: function(data) {
            const onlineDate = new Date(data.utc_datetime);
            const year = onlineDate.getUTCFullYear();
            const month = (onlineDate.getUTCMonth() + 1).toString().padStart(2, '0');

            // Check if the year has changed
            if (lastYear !== year) {
                lastSeriesNumber = 1; // Reset the series number to 1
                lastYear = year; // Update the last year
            } else {
                lastSeriesNumber++; // Increment the series number
            }

            // Store the updated series number and year in cookies
            setCookie("lastSeriesNumber", lastSeriesNumber, 365); // You can adjust the cookie expiration as needed
            setCookie("lastYear", lastYear, 365);

            // Format the series number
            const formattedSeriesNumber = String(lastSeriesNumber).padStart(6, '0');

            // Combine the year, month, and series number
            const risNoDate = year + '-' + month + '-' + formattedSeriesNumber;

            // Set the formatted date as the value of the input element
            $(".risNoDate").val(risNoDate);
        },
        error: function(error) {
            console.error('Error fetching online date:', error);
        }
    });
});

// Helper functions for working with cookies
function setCookie(name, value, days) {
    const date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    const expires = "expires=" + date.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

function getCookie(name) {
    const cookieName = name + "=";
    const cookies = document.cookie.split(';');
    for (let i = 0; i < cookies.length; i++) {
        let cookie = cookies[i].trim();
        if (cookie.indexOf(cookieName) === 0) {
            return cookie.substring(cookieName.length, cookie.length);
        }
    }
    return "";
}*/

/* FOR TESTING 

$(document).ready(function() {
    // Fetch the last series number from the server
    $.ajax({
        url: 'get_last_series_number.php', // Create this PHP file to fetch the last series number
        method: 'GET',
        success: function(response) {
            let lastSeriesNumber = parseInt(response);
            if (isNaN(lastSeriesNumber)) {
                lastSeriesNumber = 0; // If no data is available, start from 0
            }
            
            // Get the year and month from worldtimeapi
            $.ajax({
                url: 'https://worldtimeapi.org/api/ip',
                dataType: 'json',
                success: function(data) {
                    const onlineDate = new Date(data.utc_datetime);
                    const year = onlineDate.getUTCFullYear();
                    const month = (onlineDate.getUTCMonth() + 1).toString().padStart(2, '0');
                    
                    // Check if the year has changed
                    if (year !== parseInt($(".lastYear").val())) {
                        lastSeriesNumber = 0; // Reset the series number to 0
                    }
                    
                    lastSeriesNumber++;
                   
                    // Format the series number
                    const formattedSeriesNumber = String(lastSeriesNumber).padStart(6, '0');
                    
                    // Combine the year, month, and series number
                    const risNoDate = year + '-' + month + '-' + formattedSeriesNumber;
                    
                    // Set the formatted date as the value of the input element
                    $(".lastYear").val(year); // Store the current year
                    $(".risNoDate").val(risNoDate);
                },
                error: function(error) {
                    console.error('Error fetching online date:', error);
                }
            });
        },
        error: function() {
            console.error("Error fetching last series number.");
        }
    });
});
*/


/* ORIGINAL CODE*/

/*$(document).ready(function() {
    // Fetch the last series number from the server
    $.ajax({
        url: 'get_last_series_number.php', // Create this PHP file to fetch the last series number
        method: 'GET',
        success: function(response) {
            let lastSeriesNumber = parseInt(response);
            if (isNaN(lastSeriesNumber)) {
                lastSeriesNumber = 0; // If no data is available, start from 0
            }
            
            // Get the year and month from worldtimeapi
            $.ajax({
                url: 'https://worldtimeapi.org/api/ip',
                dataType: 'json',
                success: function(data) {
                    const onlineDate = new Date(data.utc_datetime);
                    const year = onlineDate.getUTCFullYear();
                    const month = (onlineDate.getUTCMonth() + 1).toString().padStart(2, '0');
                    
                    lastSeriesNumber++;
                   
                    // Format the series number
                    const formattedSeriesNumber = String(lastSeriesNumber).padStart(6, '0');
                    
                    // Combine the year, month, and series number
                    const risNoDate = year + '-' + month + '-' + formattedSeriesNumber;
                    
                    // Set the formatted date as the value of the input element
                    $(".risNoDate").val(risNoDate);
                },
                error: function(error) {
                    console.error('Error fetching online date:', error);
                }
            });
        },
        error: function() {
            console.error("Error fetching last series number.");
        }
    });
});*/

$(document).ready(function() {
    // Fetch the last series number and year from the server
    $.ajax({
        url: 'get_last_series_year.php',
        method: 'GET',
        success: function(response) {
            const data = JSON.parse(response);
            let lastSeriesNumber = parseInt(data.lastSeriesNumber);
            let lastYear = parseInt(data.lastYear);

            if (isNaN(lastSeriesNumber)) {
                lastSeriesNumber = 0;
            }
            if (isNaN(lastYear)) {
                lastYear = 0;
            }

            // Get the year and month from worldtimeapi
            $.ajax({
                url: 'https://worldtimeapi.org/api/ip',
                dataType: 'json',
                success: function(data) {
                    const onlineDate = new Date(data.utc_datetime);
                    const currentYear = onlineDate.getUTCFullYear();
                    const month = (onlineDate.getUTCMonth() + 1).toString().padStart(2, '0');

                    if (lastYear !== currentYear) {
                        lastSeriesNumber = 1; // Reset the series number to 1 for a new year
                        lastYear = currentYear; // Update the last year
                    } else {
                        lastSeriesNumber++; // Increment the series number within the same year
                    }

                    // Format the series number
                    const formattedSeriesNumber = String(lastSeriesNumber).padStart(6, '0');

                    // Combine the year, month, and series number
                    const risNoDate = currentYear + '-' + month + '-' + formattedSeriesNumber;

                    // Set the formatted date as the value of the input element
                    $(".risNoDate").val(risNoDate);
                },
                error: function(error) {
                    console.error('Error fetching online date:', error);
                }
            });
        },
        error: function() {
            console.error("Error fetching last series number and year.");
        }
    });
});

