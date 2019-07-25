require('./bootstrap');

function selectVariousAttribute() {
    $('.various-attributes').delegate('input', 'change', function() {

        let product_type = $("input[name='product_type']").val();
        let product_id = $(this).data('product');
        let attr_value_id = $(this).attr('value');

        $.ajax({
            url: document.location.origin + '/product-change',
            data: {
                'product_type': product_type,
                'product_id': product_id,
                'attr_value_id': attr_value_id
            },
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': window.token.content
            },
            dataType: 'json',
            async: true,
            error: function(jqXHR) {
                console.error($.parseJSON(jqXHR.responseText)['error']);
            },
            success: function(data) {
                $('#product-data').html(data.modification_view);
                selectVariousAttribute();
            }
        });
    });
}

selectVariousAttribute();