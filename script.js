$( ".item_description" ).autocomplete({
    source: function(request, response){
        $.ajax({
            url: 'http://localhost:8012/depedcsjdm_RIS/connect.php',
            type: 'GET',
            dataType: 'json',
            success: function(data){
                //console.log(data)
                aData = $.map(data, function(value, key) {
                    return {
                        stockNo:value.stockNo,
                        description: value.itemDescription,
                        stockUnit: value.itemUnit
                    };
                });

                var results = $.ui.autocomplete.filter(aData, request.term);
                response(results);
            },

            select:function(event, ui){
                console.log(ui.item.stockUnit);
                $('.stock_unit').text(ui.item.stockUnit);
            }
        });
    }
});