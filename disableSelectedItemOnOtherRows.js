// Function to handle item selection
function toggleItemAvailability(select) {
    var itemDescriptionDropdowns = document.querySelectorAll('.item-description-select');
    
    // Create an object to keep track of selected items in each dropdown
    var selectedItems = {};

    select.addEventListener('change', function () {
        var selectedItem = this.value;

        // Disable the previously selected item in all dropdowns
        itemDescriptionDropdowns.forEach(function (dropdown) {
            var options = dropdown.getElementsByTagName('option');
            for (var i = 0; i < options.length; i++) {
                var option = options[i];
                if (option.value !== 'noValue') {
                    if (selectedItems[dropdown.id] === option.value) {
                        option.disabled = false;
                    }
                }
            }
        });

        // Update the selected item for the current dropdown
        selectedItems[this.id] = selectedItem;

        // Disable the selected item in other dropdowns
        itemDescriptionDropdowns.forEach(function (dropdown) {
            if (dropdown !== select) {
                var otherOptions = dropdown.getElementsByTagName('option');
                for (var j = 0; j < otherOptions.length; j++) {
                    var otherOption = otherOptions[j];
                    if (otherOption.value !== 'noValue' && otherOption.value === selectedItem) {
                        otherOption.disabled = true;
                    }
                }
            }
        });
    });
}

// Attach the toggleItemAvailability function to all item_description dropdowns
var itemDescriptionDropdowns = document.querySelectorAll('.item-description-select');
itemDescriptionDropdowns.forEach(function (select) {
    toggleItemAvailability(select); // Initial setup
});