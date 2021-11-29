// chuong create
$('.duallistbox').bootstrapDualListbox();
$('#product_content').summernote({
    height: 195,
    placeholder: 'Nhập vào',
})

let indexVariant = -1;
const productVariantCheck = $('#js-product-variant');
const productConfigCheck = $('#js-product-config');
productVariantCheck.on("click", function() {
    $("#js-tab-variant").toggleClass('d-none');
});
productConfigCheck.on("click", function() {
    $("#js-tab-config").toggleClass('d-none');
});

if ($('#js-product-variant').is(':checked')) {
    $("#js-tab-variant").removeClass('d-none');
}
if ($('#js-product-config').is(':checked')) {
    $("#js-tab-config").removeClass('d-none');
}

const productNewAttribute = $('#js-new-attribute-product');
productNewAttribute.on('click', function() {
    indexVariant++;
    const html = `<div class="row attribute-form mt-3">
        <div class="col-xl-2 col-lg-12">
            <div class="form-group">
                <label>Hình ảnh <span class="text-danger">*</span></label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input variant-valid-image" name="product_variant_image[${indexVariant}]" id="inputFile0${indexVariant}">
                    <label class="custom-file-label" for="inputFile0${indexVariant}">Lựa chọn hình ảnh</label>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-12">
            <div class="form-group">
                <label>Tên <span class="text-danger">*</span></label>
                <input type="text" name="product_variant_name[${indexVariant}]" data-slug="#product_variant_slug_${indexVariant}" placeholder="Nhập vào (VD: Xanh)" class="form-control data-slug variant-valid">
            </div>
        </div>
        <div class="col-xl-2 col-lg-12">
            <div class="form-group">
                <label>Tên không dấu <span class="text-danger">*</span></label>
                <input type="text" name="product_variant_slug[${indexVariant}]" id="product_variant_slug_${indexVariant}" placeholder="Nhập vào" class="form-control variant-valid">
            </div>
        </div>
        <div class="col-xl-2 col-lg-12">
            <div class="form-group">
                <label>Giá tiền (VND)<span class="text-danger">*</span></label>
                <input type="number" name="product_variant_price[${indexVariant}]" placeholder="Nhập vào" class="form-control variant-valid">
            </div>
        </div>
        <div class="col-xl-3 col-lg-12">
            <div class="form-group">
                <label>Giảm giá (%)</label>
                <div class="input-group mb-3">
                    <input type="number" name="product_variant_discount[${indexVariant}]" placeholder="Nhập vào" class="form-control rounded">
                    <div class="input-group-prepend">
                        <button type="button" class="btn ml-3 rounded btn-primary btn-remove-variant">Xoá thuộc tính</button>
                    </div>
                </div>
            </div>
        </div>
    </div>`;
    $('#js-print-product-attribute-form').append(html);
    $('input.variant-valid').each(function () {
        $(this).rules('add', {
            required: true,
            messages: {
                required: "Vui lòng điền thông tin"
            }
        });
    });
    $('input.variant-valid-image').each(function () {
        $(this).rules('add', {
            required: true,
            extension: "png,jpg,jpeg",
            filesize: 5,
            messages: {
                required: "Vui lòng chọn hình ảnh",
                extension: "Vui lòng chọn ảnh có định dang png,jpg,jpeg",
            }
        });
    });
    bsCustomFileInput.init();
    $('.btn-remove-variant').on('click', function() {
        $(this).parent().parent().parent().parent().parent().remove();
    });
    $('.data-slug').each(function() {
        let slugID = $(this).data('slug');
        $(`[data-slug='${slugID}']`).on('change keyup', function() {
            let slug_value = $(this).val();
            $(slugID).val(changeToSlug(slug_value));
        });
    });
});

$('.attribute-update input').on('change', function() {
    $('input.variant-valid-update').each(function () {
        $(this).rules('add', {
            required: true,
            messages: {
                required: "Vui lòng điền thông tin"
            }
        });
    });
})

$(function () {
    $.validator.addMethod('filesize', function (value, element, param) {
        return this.optional(element) || (((element.files[0].size / (1024*1024)).toFixed(2)) <= param)
    }, 'Kích thước tệp phải nhỏ hơn {0} MB');

    $('#quickForm').validate({
        submitHandler: function (form) {
            form.submit();
        },
        rules: {
            product_image: {
                required: true,
                extension: "png,jpg,jpeg",
                filesize: 5,
            },
            product_name: {
                required: true,
            },
            product_slug: {
                required: true,
            },
            product_description: {
                required: true,
            },
            category_id: {
                required: true,
            },
            brand_id: {
                required: true,
            },
            product_price: {
                required: true,
                number: true
            },
            product_quantity: {
                required: true,
                number: true
            },
            product_discount: {
                number: true
            },
        },
        messages: {
            product_image: {
                required: "Vui lòng chọn hình ảnh",
                extension: "Vui lòng chọn ảnh có định dang png,jpg,jpeg",
            },
            product_name: {
                required: "Vui lòng điền thông tin",
            },
            product_slug: {
                required: "Vui lòng điền thông tin",
            },
            product_description: {
                required: "Vui lòng điền thông tin",
            },
            category_id: {
                required: "Vui lòng chọn thông tin",
            },
            brand_id: {
                required: "Vui lòng chọn thông tin",
            },
            product_price: {
                required: "Vui lòng điền thông tin",
                number: "Vui lòng điền số",
            },
            product_quantity: {
                required: "Vui lòng điền thông tin",
                number: "Vui lòng điền số",
            },
            product_discount: {
                number: "Vui lòng điền số",
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

    $("#example1").DataTable({
        "responsive": true, 
        "lengthChange": false, 
        "autoWidth": false,
        "buttons": ["csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});