$(document).ready(function() {
    $(".item_description").change(function() {
        var selectedRow = $(this).closest("tr");
        var stockNumberInput = selectedRow.find(".stock_number");
        var stockUnitInput = selectedRow.find(".stock_unit");
        var selectedItem = $(this).val();

        $.ajax({
            url: "itemInventory.php",
            type: "POST",
            data: { item_description: selectedItem },
            dataType: "json",
            success: function(data) {
                stockNumberInput.val(data.stockNumber);
                stockUnitInput.val(data.stockUnit);
            }
        });
    });
});