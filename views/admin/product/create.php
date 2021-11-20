<section class="content-header">
    <div class="row mb-2">
      <div class="col-sm-6">
        <a href="<?= admin_url('san-pham') ?>" class="btn btn-default ml-n2">Danh sách sản phẩm</a>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
          <li class="breadcrumb-item active">Sản phẩm</li>
        </ol>
      </div>
    </div>
</section>

<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Thêm sản phẩm mới</h3>
    </div>
    <form action="<?= admin_url('san-pham/luu-them-moi') ?>" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label>Ảnh bìa</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="product_image" id="customFileImage">
                    <label class="custom-file-label" for="customFileImage">Lựa chọn hình ảnh</label>
                </div>
            </div>
            <div class="form-group">
                <label>Ảnh bìa</label>
                <input type="text" name="product_name">
            </div>
            <div class="form-group">
                <label>Quà tặng</label>
                <div class="bootstrap-duallistbox-container row moveonselect moveondoubleclick">
                    <div class="box1 col-md-6">   
                    </div> 
                    <div class="box2 col-md-6">   
                    </div>
                </div>
                <select class="duallistbox" multiple="multiple" name="product_gifts[]">
                    <option>Quà số 1</option>
                    <option>Quà số 2</option>
                    <option>Quà số 3</option>
                    <option>Quà số 4</option>
                    <option>Quà số 5</option>
                </select>
            </div>
            <div class="row">
                <div class="col-6 mb-3">
                    <input type="hidden" name="is_variant" value="0">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" id="js-product-variant" name="is_variant" value="1">
                        <label for="js-product-variant">
                            Biến thể
                        </label>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <input type="hidden" name="product_status" value="0">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" id="product_status" name="product_status" value="1" checked>
                        <label for="product_status">
                            Hiển thị
                        </label>
                    </div>
                </div>
                <div class="col-12 d-none" id="js-product-variant-form">
                    <button type="button" id="js-new-attribute-product" class="btn btn-primary mb-3">Thêm thuộc tính</button>
                    <div id="js-print-product-attribute-form">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="<?= admin_url('san-pham') ?>" class="btn btn-secondary">
                Huỷ
            </a>
            <button type="submit" id="js-btn-product-submit" class="btn btn-primary">
                Lưu
            </button>
        </div>
    </form>
</div>