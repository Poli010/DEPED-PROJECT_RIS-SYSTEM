let form = document.querySelector("#formContainer");
let btn = document.querySelector("#submitButton");
        
        btn.addEventListener('click', () => {

            let clonedForm = $(form).clone();

            $(form).find('select').each(function(index, originalSelect) {
                let clonedSelect = $(clonedForm).find('select').eq(index);
                
                let selectedValue = $(originalSelect).val();
                
                $(clonedSelect).val(selectedValue);
            });

            let updateData = [];
            clonedForm.find('.item_description').each(function(index, selectElement) {
                let selectedItem = $(selectElement).val();
                let quantityInput = $(selectElement).closest('tr').find('.quantityInputUser').val();
        
                // Find the stock_number associated with the selected item_description
                let stockNumberInput = $(selectElement).closest('tr').find('.stock_number');
                let stockNumber = $(stockNumberInput).val(); // Assuming stock_number is in an input field
                
                updateData.push({ item_description: selectedItem, quantity: quantityInput, stock_number: stockNumber });
            });
        

            // Send AJAX request for each item to update the database
            updateData.forEach(function(data) {
                $.ajax({
                    url: "update_quantity.php",
                    type: "POST",
                    data: data, // Include the stock_number in the data object
                    success: function(response) {
                        console.log(response); // Log the response for debugging purposes
                    },
                    error: function() {
                        console.error("Error updating quantity");
                    },
                });
            });
        });