function validateForm(form) {
    const itemDescriptions = form.querySelectorAll('.item_description');
    const quantityInputs = form.querySelectorAll('.quantityInputUser');
    let isValidItemSelected = false; // Assume no selected item description initially
    let isValidQuantity = true; // Assume all quantities are valid initially

    for (let i = 0; i < itemDescriptions.length; i++) {
        const itemDescription = itemDescriptions[i];
        const quantityInput = quantityInputs[i];

        // Check if an item_description is selected
        if (itemDescription.value !== 'noValue') {
            isValidItemSelected = true; // At least one selected item description found

            // Check if the quantityInput is empty
            if (quantityInput.value === '') {
                isValidQuantity = false; // Invalid quantity found
                // Display a SweetAlert for quantity validation error
                Swal.fire({
                    icon: 'warning',
                    title: 'NO QUANTITY FOUND!',
                    text: 'Please enter a quantity for the selected item.',
                });
                break; // Stop checking further items
            }
        }
    }

    if (!isValidItemSelected) {
        // No selected item descriptions, prevent form submission
        Swal.fire({
            icon: 'warning',
            title: 'NO ITEM SELECTED!',
            text: 'Please select at least one item description.',
        });
        event.preventDefault();
    } else if (isValidQuantity) {
        // If at least one item description is selected and all quantities are valid, submit the form
        form.submit();
    } else {
        // If there's at least one item description but with an invalid quantity, prevent form submission
        event.preventDefault();
    }
}