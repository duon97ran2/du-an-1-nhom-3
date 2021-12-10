$('.blog_check_slug').on('change keyup',function () {
    $.ajax({
        type: "POST",
        url: $('#blog_slug').data('url'),
        data: {
            slug: $('#blog_slug').val(),
            old_slug: $('#blog_slug').data('old'),
            action: $('#blog_slug').data('action')
        },
        success: function (data) {
            $.validator.addMethod('slugcheck', function (value, element, param) {
                if (data == value) {
                    return false;
                }
                return true;
            });
        }
    });
});

$(function () {
    $('.btn_remove_blog').on('click', function () {
        let blog_title = $(this).data('name');
        let redirectUrl = $(this).data('url');
    
        Swal.fire({
            title: `Bạn có chắc chắn muốn xóa bài viết "${blog_title}" hay không?`,
            showCancelButton: true,
            confirmButtonText: 'Có',
            cancelButtonText: `Hủy`,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = redirectUrl;
            }
        })
    })
});