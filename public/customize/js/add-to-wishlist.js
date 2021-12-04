$('#js-add-to-wishlists').on('click', function() {
    
    let pid = $(this).data('id');
    let login = $(this).data('login');
    let data_url = $(this).data('url');
    if (login == 0) {
        toastr.error('Vui lòng đăng nhập để thêm sản phẩm yêu thích');
    } else {
        $.ajax({
            type: "POST",
            url: data_url,
            data: {
                product_id: pid,
            },
            success: function(response) {
                response = JSON.parse(response);
                if (response.errors) {
                    toastr.error(response.errors);
                } 
                else {
                    toastr.success(response.success);
                }
            }
        });
    }
});

