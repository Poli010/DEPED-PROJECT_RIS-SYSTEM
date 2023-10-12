$(document).ready(function() {
    // Add an event listener to all item_description dropdowns
    $('.item_description').change(function() {
        // Find the closest row (parent <tr>) of the select element
        const row = $(this).closest('tr');
        // Find the quantity input element within the row
        const quantityInput = row.find('.quantityInputUser');

        // Check if the selected value is not "noValue"
        if ($(this).val() !== 'noValue') {
            // If an item is selected, enable the quantity input
            quantityInput.prop('disabled', false);
        } else {
            // If "noValue" is selected, disable the quantity input and clear its value
            quantityInput.prop('disabled', true);
            quantityInput.val('');
        }
    });

    // Initialize the disabled state for quantity inputs on page load
    $('.item_description').each(function() {
        const row = $(this).closest('tr');
        const quantityInput = row.find('.quantityInputUser');
        
        if ($(this).val() === 'noValue') {
            quantityInput.prop('disabled', true);
            quantityInput.val('');
        } else {
            quantityInput.prop('disabled', false);
        }
    });
});