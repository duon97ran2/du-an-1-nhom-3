$('.btn_remove_banner').on('click', function() {
    let banner_name = $(this).data('name');
    let redirectUrl = $(this).data('url');
    Swal.fire({
        title: `Bạn có chắc chắn muốn xóa banner "${banner_name}" hay không?`,
        showCancelButton: true,
        confirmButtonText: 'Có',
        cancelButtonText: `Hủy`,
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = redirectUrl;
        }
    })
})