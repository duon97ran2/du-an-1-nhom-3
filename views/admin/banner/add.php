<section class="content-header">
    <div class="row mb-2">
        <div class="col-sm-6">
            <a href="<?= admin_url('banner') ?>" class="btn btn-default ml-n2">Danh sách banner</a>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="<?= admin_url('banner') ?>">Sản phẩm</a></li>
                <li class="breadcrumb-item active">Thêm banner mới</li>
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

<form action="<?= admin_url('banner/luu-them-moi') ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col col-md-7">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Thông tin</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Ảnh banner <span class="text-danger">*</span></label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="banner_image" id="customFileImage">
                            <label class="custom-file-label" for="customFileImage">Lựa chọn hình ảnh</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tên banner <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="banner_name" placeholder="Nhập vào">
                    </div>
                    <div class="form-group">
                        <label>URL <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="banner_url" placeholder="Nhập vào">
                    </div>

                </div>
            </div>
        </div>
        <div class="col col-md-5">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Thông tin</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="product_description">Index <span class="text-danger">*</span></label>
                        <input type="number" name="banner_index" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Position</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="banner_position" id="banner_position" value="1" checked>
                            <label class="form-check-label" for="inlineRadio1">banner</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="banner_position" id="banner_position" value="2">
                            <label class="form-check-label" for="inlineRadio2">sub_banner</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Target</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="banner_target" id="banner_target" value="1" checked>
                            <label class="form-check-label" for="inlineRadio1">_blank</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="banner_target" id="banner_target" value="2">
                            <label class="form-check-label" for="inlineRadio2">_self</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Status</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="is_active" id="is_active" value="1" checked>
                            <label class="form-check-label" for="inlineRadio1">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="is_active" id="is_active" value="2">
                            <label class="form-check-label" for="inlineRadio2">Hidden</label>
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