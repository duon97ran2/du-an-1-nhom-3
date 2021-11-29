function confirm_before_remove(url, name){
    Swal.fire({
        title: `Bạn có chắc chắn muốn xóa tài khoản "${name}" hay không?`,
        showCancelButton: true,
        confirmButtonText: 'Có',
        cancelButtonText: `Hủy`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          window.location.href = url;
        }
      })
}