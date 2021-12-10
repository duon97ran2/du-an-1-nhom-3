
// xoas banner
$('.btn_remove_banner').on('click', function () {
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

// xoas cmt
$('.btn_remove_item').on('click', function () {
    let comment_content = $(this).data('name'); 
    let redirectUrl = $(this).data('url');


    Swal.fire({
        title: `Bạn có chắc chắn muốn xóa comment "${comment_content}" hay không?`,
        showCancelButton: true,
        confirmButtonText: 'Có',
        cancelButtonText: `Hủy`,
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = redirectUrl;
        }
    })
})

//admin_rep
// $(document).ready(function(){
//     $('.btn_admin_rep_cmt').on('click', function () {
//         let btn_rep = $(this).parent().parent().find('.form_rep');
//         let result = $(this).parent().parent().find('.result');
//         btn_rep.toggle();
//         result.toggle();
//     })

//     $('.form_rep .cannel').on('click', function () {
//         $(this).parent().parent().parent().find('.btn_admin_rep_cmt').click();
//     })


//     $('.submit').on('click', function () {
//         $('#form_rep').css('display', 'none');
//         $('#result').css('display', 'block');
//     })
// })
// xoa blog

// $('.btn_remove_blog').on('click', function () {
//     let blog_title = $(this).data('name');
//     let redirectUrl = $(this).data('url');

//     Swal.fire({
//         title: `Bạn có chắc chắn muốn xóa bài viết "${blog_title}" hay không?`,
//         showCancelButton: true,
//         confirmButtonText: 'Có',
//         cancelButtonText: `Hủy`,
//     }).then((result) => {
//         if (result.isConfirmed) {
//             window.location.href = redirectUrl;
//         }
//     })
// })