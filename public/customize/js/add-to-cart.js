let cart_toal = $('#js-cart-total');
$('#js-add-to-cart').on('click', function() {
    let pid = $(this).data('id');
    let login = $(this).data('login');
    let color = $('.js-color-type:checked').val() || '';
    let quantity = $('.js-quantity-type').val();
    let price = $(this).data('price');
    let data_url = $(this).data('url');
    if (login == 0) {
        toastr.error('Vui lòng đăng nhập để mua hàng');
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
                response = JSON.parse(response);
                if (response.errors) {
                    toastr.error(response.errors);
                } 
                if (response.quantity > 0) {
                    cart_toal.html(response.cart_total);
                    cart_toal.show();
                    toastr.success("Them thanh cong " + response.quantity + " san pham")
                } else {
                    if (quantity > 0) {
                        toastr.error("Chi duoc them toi da " + response.product_quantity + " san pham");
                    }
                } 
                $('.js-quantity-type').val(1);
            }
        });
    }
});


$(function() {
    $('#js-voucher-input').on('keyup change',function (e) {
        let $this = $(this);
        let price = $('#js-price').val();
        let voucher = $(this).val();
        let data_url = $(this).data('url');
        if (voucher) {
            $.ajax({
                type: "POST",
                url: data_url,
                data: {
                    price: price,
                    voucher: voucher,
                },
                success: function (data) {
                    data = JSON.parse(data);
                    let total_price = price - data.price;
                    let total_price_currency = total_price.toLocaleString('vi', {style : 'currency', currency : 'VND'});
                    let voucher_price =  price - total_price;
                    let voucher_price_currency = voucher_price.toLocaleString('vi', {style : 'currency', currency : 'VND'});

                    $.validator.addMethod('voucher', function (value, element, param) {
                        if (data.errors != '' && param) {
                            return false;
                        }
                    }, data.errors);
    
                    if (data.errors) {
                        $this.rules('add', {
                            voucher: true,
                        });
                        $('#js-total-price').val(total_price);
                        $('#js-show-total-price').html(total_price_currency);
                    } else {
                        $this.rules('add', {
                            voucher: false,
                        });
                        $('#js-total-price').val(total_price);
                        $('#js-show-voucher-discount').html( voucher_price_currency );
                        $('#js-show-total-price').html(total_price_currency);
                    }
                }
            });
        } else {
            $this.rules('add', {
                voucher: false,
            });
        }
    });

    if ($('#formCheckout').length) {
        $('#formCheckout').validate({
            submitHandler: function (form) {
                form.submit();
            },
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true
                },
                phone: {
                    required: true
                },
                address: {
                    required: true
                },
            },
            messages: {
                name: {
                    required: "Vui lòng điền thông tin",
                },
                email: {
                    required: "Vui lòng điền thông tin",
                },
                phone: {
                    required: "Vui lòng điền thông tin",
                },
                address: {
                    required: "Vui lòng điền thông tin",
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    }
});