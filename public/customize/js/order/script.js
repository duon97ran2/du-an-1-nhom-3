$('.btn_cancel_order').on('click', function(){
  let order_code = $(this).data('name');
  let redirectUrl = $(this).data('url');
  Swal.fire({
      title: `Bạn có chắc chắn muốn huỷ đơn hàng "${order_code}" hay không?`,
      showCancelButton: true,
      confirmButtonText: 'Có',
      cancelButtonText: `Hủy`,
  }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        window.location.href = redirectUrl;
      }
  })
})

$('.btn_confirm_order').on('click', function(){
  let order_code = $(this).data('name');
  let redirectUrl = $(this).data('url');
  Swal.fire({
      title: `Bạn có chắc chắn muốn xác nhận đơn hàng "${order_code}" hay không?`,
      showCancelButton: true,
      confirmButtonText: 'Có',
      cancelButtonText: `Hủy`,
  }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        window.location.href = redirectUrl;
      }
  })
})
$('.btn_delete').on('click', function(){
  let order_code = $(this).data('name');
  let redirectUrl = $(this).data('url');
  Swal.fire({
      title: `Bạn có chắc chắn muốn xóa đơn hàng "${order_code}" hay không?`,
      showCancelButton: true,
      confirmButtonText: 'Có',
      cancelButtonText: `Hủy`,
  }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        window.location.href = redirectUrl;
      }
  })
})

$('.btn_complete_order').on('click', function(){
  let order_code = $(this).data('name');
  let redirectUrl = $(this).data('url');
  Swal.fire({
      title: `Bạn có chắc chắn muốn hoàn thành đơn hàng "${order_code}" hay không?`,
      showCancelButton: true,
      confirmButtonText: 'Có',
      cancelButtonText: `Hủy`,
  }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        window.location.href = redirectUrl;
      }
  })
})

$('.quantity').on('change',function(){
  let total = $(this).val()*$(this).prev('.price').val();
  console.log($(this).closest('input'));
});