// chuong create
$('.duallistbox').bootstrapDualListbox();

const productVariantCheck = document.querySelector('#js-product-variant');
const productVariantCheckForm = document.querySelector('#js-product-variant-form');
if (productVariantCheck) {
    productVariantCheck.addEventListener('click', fnProductVariantCheck);
    if (productVariantCheck.checked) {
        productVariantCheckForm.classList.remove('d-none');
    } else {
        productVariantCheckForm.classList.add('d-none');
    }
}

function fnProductVariantCheck() {
    if (this.checked) {
        productVariantCheckForm.classList.remove('d-none');
    } else {
        productVariantCheckForm.classList.add('d-none');
    }
}

const productNewAttribute = document.querySelector('#js-new-attribute-product');
if (productNewAttribute) {
    productNewAttribute.addEventListener('click', fnProductNewAttribute);
}

function fnProductNewAttribute() {
    const html = `<div class="row attribute-form">
        <div class="col-md-2">
            <div class="form-group">
                <input type="file" name="product_variant_image[]" oninvalid="this.setCustomValidity('Vui lòng điền thông tin')" oninput="this.setCustomValidity('')" style="width:100%">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" name="product_variant_name[]" oninvalid="this.setCustomValidity('Vui lòng điền thông tin')" oninput="this.setCustomValidity('')" class="form-control">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" name="product_variant_slug[]" oninvalid="this.setCustomValidity('Vui lòng điền thông tin')" oninput="this.setCustomValidity('')" class="form-control">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" name="product_variant_price[]" oninvalid="this.setCustomValidity('Vui lòng điền thông tin')" oninput="this.setCustomValidity('')" class="form-control">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" name="product_variant_discount[]" class="form-control">
            </div>
        </div>
        <div class="col-md-2">
            <button type="button" onclick="removeAttributeProduct(this)" class="btn btn-primary mb-3">Xoá thuộc tính</button>
        </div>
    </div>`;
    $('#js-print-product-attribute-form').append(html);
}

function removeAttributeProduct(el) {
    const parentEl = el.parentElement.parentElement;
    parentEl.remove();
}