// Function to update the table with new data
function updateTable() {
    // Send an AJAX request to fetch updated data
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetch_updated_queue.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Replace the table content with the updated data
            document.getElementById('table').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

// Poll for updates every 5 seconds (you can adjust the interval)
setInterval(updateTable, 5000);