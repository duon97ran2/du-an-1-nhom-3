let cart_toal = $('#js-cart-total');

$('#js-add-to-cart').on('click', function() {
    let pid = $(this).data('id');
    let login = $(this).data('login');
    let color = $('.js-color-type:checked').val() || '';
    let quantity = $('.js-quantity-type').val();
    let price = $(this).data('price');
    let data_url = $(this).data('url');
    if (login == 0) {
        alert('Vui long dang nhap de mua hang');
    } else {
        $.ajax({
            type: "POST",
            url: data_url,
            data: {
                quantity: quantity,
                product_id: pid,
                color: color,
                price: price,
            },
            success: function(response) {
                console.log(response);
                response = JSON.parse(response);
                if (response.errors) {
                    alert(response.errors);
                } else {
                    cart_toal.html(response.cart_total);
                    alert(response.success);
                }
            }
        });
    }
});