// function selectAll() {
//     let listCheckBox = $(".checkboxItem");
//     listCheckBox.prop('checked', true);

// }

// function deselectAll() {
//     let listCheckBox = $(".checkboxItem");
//     listCheckBox.prop('checked', false);
// }

// function deleteSelectedItems(url) {
//     let listCheckBox = $(".checkboxItem");
//     let deleteItems = [];
//     for (checkbox of listCheckBox) {
//         if ($(checkbox).prop('checked')) {
//             let maloai = ($(checkbox).attr('data-id'));
//             $(checkbox).parent().parent().remove();
//             deleteItems.push(maloai);
//         }
//     }
//     let listDelete = deleteItems.join(",");

//     $.post(`/du-an-1-nhom-3/ajax/deleteListComment`, {
//         list: listDelete
//     }, function(data) {
//         console.log(data);
//     });
// }


// function deleteCustomer(id, value) {
//     let element = value.parentElement.parentElement;
//     $.post("/du-an-1-nhom-3/cp-admin/AjaxDeleteCustomer/" + id, {}, (data) => {
//         if (data) {
//             element.remove();
//         }
//     });
// }

// function deleteProduct(id, value) {
//     let element = value.parentElement.parentElement;
//     $.post("/du-an-1-nhom-3/cp-admin/AjaxDeleteProduct/" + id, {}, (data) => {
//         if (data) {
//             element.remove();
//         }
//     });
// }

// function deleteLoai(id, value) {
//     let element = value.parentElement.parentElement;
//     $.post("/du-an-1-nhom-3/cp-admin/AjaxDeleteLoai/" + id, {}, (data) => {
//         if (data) {
//             element.remove();
//         }
//     });
// }

// function deleteComment(id, value) {
//     let element = value.parentElement.parentElement;
//     $.post("/du-an-1-nhom-3/cp-admin/AjaxDeleteComment/" + id, {}, (data) => {
//         if (data) {
//             element.remove();
//         }
//     });
// }

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
$('#btn_remove_item').on('click', function () {
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
$('.btn_admin_rep_cmt').on('click', function () {
    let btn_rep = $(this).parent().parent().find('.form_rep');
    let result = $(this).parent().parent().find('.result');
    btn_rep.toggle();
    result.toggle();
})

$('.form_rep .cannel').on('click', function () {
    $(this).parent().parent().parent().find('.btn_admin_rep_cmt').click();
})


$('.submit').on('click', function () {
    $('#form_rep').css('display', 'none');
    $('#result').css('display', 'block');
})