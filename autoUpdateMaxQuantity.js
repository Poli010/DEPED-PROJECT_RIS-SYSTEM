// Create an object to store the previous item quantities for selected items
var previousItemQuantities = {};

// Update the max attribute and placeholder of the input based on the fetched item quantity
function updateMaxQuantity(selectElement) {
    var selectedItemDescription = selectElement.value;
    var row = selectElement.closest('th').parentNode;
    var quantityInput = row.querySelector('.quantityInputUser');
    var quantityInputs = document.querySelectorAll('.quantityInputUser');

    quantityInputs.forEach(function (quantityInput) {
        quantityInput.addEventListener('keydown', function (e) {
            // Allow the backspace key (keyCode 8) and delete key (keyCode 46)
            if (e.key !== 'Backspace' && e.key !== 'Delete' && e.keyCode !== 8 && e.keyCode !== 46 && e.key !== 'ArrowDown' && e.key !== 'ArrowUp' && e.key !== 'Tab') {
                e.preventDefault();
            }
        });
    });

    // Create a new XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Define the request URL
    var url = "fetch_item_quantity.php"; // Create a separate PHP file to handle database queries

    // Create a query string to send to the server
    var params = "item_description=" + selectedItemDescription;

    // Configure the request
    xhr.open("GET", url + "?" + params, true);

    // Set up the callback function when the request is complete
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var itemQuantity = parseInt(xhr.responseText);

                // Check if the current item quantity differs from the previous value
                if (previousItemQuantities[selectedItemDescription] !== itemQuantity) {
                    // Clear the input field
                    quantityInput.value = '';
                }

                // Update the max attribute and placeholder of the input based on the fetched item quantity
                if (selectElement.value === 'noValue') {
                    quantityInput.max = "";
                    quantityInput.placeholder = ""; // Remove placeholder
                } else if (!isNaN(itemQuantity)) {
                    quantityInput.max = itemQuantity;
                    quantityInput.placeholder = "Stock: " + itemQuantity; // Set placeholder
                } else {
                    quantityInput.max = ""; // Set max to an empty string
                    quantityInput.placeholder = ""; // Remove placeholder
                }

                // Update the previous item quantity for the selected item
                previousItemQuantities[selectedItemDescription] = itemQuantity;
            } else {
                console.error("Error fetching item quantity");
            }
        }
    };

    // Send the request
    xhr.send();
}


// Add event listeners to all select elements
var selectElements = document.querySelectorAll('.item_description');
selectElements.forEach(function (selectElement) {
    selectElement.addEventListener('change', function () {
        updateMaxQuantity(this);
    });
});

// Remove the placeholder when no item is selected in a row
selectElements.forEach(function (selectElement) {
    var row = selectElement.closest('th').parentNode;
    var quantityInput = row.querySelector('.quantityInputUser');

    selectElement.addEventListener('change', function () {
        if (selectElement.value === '' || selectElement.value === 'noValue') {
            quantityInput.placeholder = ''; // Remove placeholder
        }
    });
});

function periodicallyUpdateItemQuantities() {
    var selectElements = document.querySelectorAll('.item_description');
    selectElements.forEach(function (selectElement) {
        updateMaxQuantity(selectElement);
    });

    // Set an interval to periodically update item quantities (e.g., every 5 seconds)
    setInterval(function () {
        selectElements.forEach(function (selectElement) {
            updateMaxQuantity(selectElement);
        });
    }, 2000); // Adjust the interval as needed (in milliseconds)
}

// Call the function to start periodic updates
periodicallyUpdateItemQuantities();