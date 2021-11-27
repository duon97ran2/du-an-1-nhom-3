<section class="content-header">
    <div class="row mb-2">
      <div class="col-sm-6">
        <a href="<?= admin_url('san-pham') ?>" class="btn btn-default ml-n2">Danh sách sản phẩm</a>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="<?= admin_url('san-pham') ?>">Sản phẩm</a></li>
          <li class="breadcrumb-item active">Thêm sản phẩm mới</li>
        </ol>
      </div>
    </div>
</section>

<?php if (!empty(get_session('message-errors'))) : ?>
<div class="alert alert-danger">
    <?= get_session('message-errors') ?>
</div>
<?php remove_session('message-errors') ?>
<?php endif; ?>

<form action="<?= admin_url('san-pham/luu-them-moi') ?>" id="quickForm" novalidate method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-7">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Thông tin cơ bản</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Ảnh bìa <span class="text-danger">*</span></label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="product_image" id="customFileImage">
                            <label class="custom-file-label" for="customFileImage">Lựa chọn hình ảnh</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product_name">Tên sản phẩm <span class="text-danger">*</span></label>
                        <input type="text" class="form-control data-slug product_check_slug" id="product_name" data-slug="#product_slug" name="product_name" placeholder="Nhập vào">
                    </div>
                    <div class="form-group">
                        <label for="product_slug">Tên sản phẩm không dấu <span class="text-danger">*</span></label>
                        <input type="text" class="form-control product_check_slug" data-action="add" data-url="<?= admin_url('san-pham/kiem-tra-slug') ?>" id="product_slug" name="product_slug" placeholder="Nhập vào">
                    </div>
                    <div class="form-group">
                        <label for="product_description">Mô tả ngắn <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="product_description" name="product_description" rows="5" style="resize:none" placeholder="Nhập vào"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="product_content">Thông tin chi tiết</label>
                        <textarea rows="10" placeholder="Nhập vào" name="product_content" id="product_content">Chưa có thông tin...</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Thông tin bán hàng</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="category_id">Danh mục <span class="text-danger">*</span></label>
                        <select class="custom-select" name="category_id" id="category_id">
                            <option selected disabled>Lựa chọn</option>
                            <?php foreach($categories as $item) : ?>
                            <option value="<?= $item['category_id'] ?>"><?= $item['category_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="brand_id">Thương hiệu <span class="text-danger">*</span></label>
                        <select class="custom-select" name="brand_id" id="brand_id">
                            <option selected disabled>Lựa chọn</option>
                            <?php foreach($brands as $item) : ?>
                            <option value="<?= $item['brand_id'] ?>"><?= $item['brand_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product_price">Giá tiền (VNĐ) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="product_price" name="product_price" placeholder="Nhập vào">
                    </div>
                    <div class="form-group">
                        <label for="product_quantity">Số lượng trong kho <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="product_quantity" name="product_quantity" placeholder="Nhập vào">
                    </div>
                    <div class="form-group">
                        <label for="product_discount">Giảm giá (%)</label>
                        <input type="number" class="form-control" id="product_discount" name="product_discount" placeholder="Nhập vào">
                    </div>
                </div>
            </div>
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Quà tặng</h3>
                </div>
                <div class="card-body">
                    <div class="form-group mb-0">
                        <div class="bootstrap-duallistbox-container row moveonselect moveondoubleclick">
                            <div class="box1 col-md-6">   
                            </div> 
                            <div class="box2 col-md-6">   
                            </div>
                        </div>
                        <select class="duallistbox" multiple="multiple" required name="product_gifts[]">
                            <?php foreach($gifts as $item) : ?>
                            <option value="<?= $item['gift_id'] ?>"><?= $item['gift_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-default">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 form-group mb-0">
                    <input type="hidden" name="product_status" value="0">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" id="product_status" name="product_status" value="1" checked>
                        <label for="product_status">
                            Hiển thị
                        </label>
                    </div>
                </div>
                <div class="col-md-3 form-group mb-0">
                    <input type="hidden" name="product_hot" value="0">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" id="product_hot" name="product_hot" value="1">
                        <label for="product_hot">
                            Sản phẩm Hot
                        </label>
                    </div>
                </div>
                <div class="col-md-3 form-group mb-0">
                    <input type="hidden" name="is_variant" value="0">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" id="js-product-variant" name="is_variant" value="1">
                        <label for="js-product-variant">
                            Biến thể
                        </label>
                    </div>
                </div>
                <div class="col-md-3 form-group mb-0">
                    <input type="hidden" name="is_config" value="0">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" id="js-product-config" name="is_config" value="1">
                        <label for="js-product-config">
                            Cấu hình sản phẩm
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-none" id="js-tab-variant">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Biến thể</h3>
                </div>
                <div class="card-body">
                    <button type="button" id="js-new-attribute-product" class="btn btn-primary ml-n2">Thêm thuộc tính</button>
                    <div id="js-print-product-attribute-form">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-none" id="js-tab-config">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Cấu hình</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label for="display">Màn hình</label>
                                <input type="text" class="form-control" id="display" name="display" placeholder="Nhập vào">
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label for="camera_front">Camera trước</label>
                                <input type="text" class="form-control" id="camera_front" name="camera_front" placeholder="Nhập vào">
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label for="camera_back">Camera sau</label>
                                <input type="text" class="form-control" id="camera_back" name="camera_back" placeholder="Nhập vào">
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label for="ram">Ram</label>
                                <input type="text" class="form-control" id="ram" name="ram" placeholder="Nhập vào">
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label for="storage">Bộ nhớ</label>
                                <input type="text" class="form-control" id="storage" name="storage" placeholder="Nhập vào">
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label for="cpu">CPU</label>
                                <input type="text" class="form-control" id="cpu" name="cpu" placeholder="Nhập vào">
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label for="gpu">GPU</label>
                                <input type="text" class="form-control" id="gpu" name="gpu" placeholder="Nhập vào">
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label for="battery">Dung lượng PIN</label>
                                <input type="text" class="form-control" id="battery" name="battery" placeholder="Nhập vào">
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label for="sim">SIM</label>
                                <input type="text" class="form-control" id="sim" name="sim" placeholder="Nhập vào">
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label for="system">Hệ điều hành</label>
                                <input type="text" class="form-control" id="system" name="system" placeholder="Nhập vào">
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label for="made_in">Xuất xứ</label>
                                <input type="text" class="form-control" id="made_in" name="made_in" placeholder="Nhập vào">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-default mb-5 mt-3">
        <div class="card-footer text-right">
            <a href="<?= admin_url('san-pham') ?>" class="btn btn-secondary btn-cannel">
                Huỷ
            </a>
            <button type="submit" id="js-btn-product-submit" class="btn btn-primary btn-save">
                Lưu
            </button>
        </div>
    </div>
</form>