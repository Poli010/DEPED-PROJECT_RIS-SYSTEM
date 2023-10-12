$(document).ready(function () {
    // Store interval IDs in an object for each row
    var intervalIds = {};

    function updateCheckSymbols(selectedRow, itemQuantity) {
        var yesInputCheck = selectedRow.find(".yesInputCheck");
        var noInputCheck = selectedRow.find(".noInputCheck");

        if (itemQuantity > 0) {
            yesInputCheck.text("✓");
            noInputCheck.text("");
        } else if (itemQuantity === 0) {
            yesInputCheck.text("");
            noInputCheck.text("✓");
        } else if (itemQuantity === -1) {
            yesInputCheck.text("");
            noInputCheck.text("");
        }
    }

    function periodicallyUpdateStockAvailability(selectedRow, itemDescription) {
        $.ajax({
            type: "POST",
            url: "fetch_item_quantity_2.php",
            data: { item_description: itemDescription },
            success: function (response) {
                var itemQuantity = parseInt(response);
                updateCheckSymbols(selectedRow, itemQuantity);
            },
            error: function () {
                console.error("Failed to fetch item_quantity");
            },
        });
    }

    $(".item_description").change(function () {
        var selectedRow = $(this).closest("tr");
        var selectedItemOption = $(this).find("option:selected");
        var itemDescription = selectedItemOption.val();
        var intervalId = intervalIds[selectedRow.index()];

        if (itemDescription === "noValue") {
            // Clear the interval for this row
            clearInterval(intervalId);
            selectedRow.find(".yesInputCheck").text("");
            selectedRow.find(".noInputCheck").text("");
        } else {
            // Clear the previous interval, if it exists
            if (intervalId) {
                clearInterval(intervalId);
            }

            // Set a new interval to periodically update the elements
            intervalId = setInterval(function () {
                periodicallyUpdateStockAvailability(selectedRow, itemDescription);
            }, 3000);

            // Store the new interval ID for this row
            intervalIds[selectedRow.index()] = intervalId;

            // Trigger an immediate update
            periodicallyUpdateStockAvailability(selectedRow, itemDescription);
        }
    });

    // Call the initial update for stock availability
    $(".item_description").each(function () {
        var selectedRow = $(this).closest("tr");
        var selectedItemOption = $(this).find("option:selected");
        var itemDescription = selectedItemOption.val();

        if (itemDescription !== "noValue") {
            var intervalId = setInterval(function () {
                periodicallyUpdateStockAvailability(selectedRow, itemDescription);
            }, 3000);

            intervalIds[selectedRow.index()] = intervalId;
        }
    });
});
