<section class="content-header">
    <div class="row mb-2">
      <div class="col-sm-6">
        <a href="<?= admin_url('san-pham') ?>" class="btn btn-default ml-n2">Danh sách sản phẩm</a>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="<?= admin_url('san-pham') ?>">Sản phẩm</a></li>
          <li class="breadcrumb-item active">Sửa sản phẩm <?= $product['product_name'] ?></li>
        </ol>
      </div>
    </div>
</section>

<form action="<?= admin_url('san-pham/luu-cap-nhat?product_id='.$product['product_id']) ?>" id="quickForm" novalidate method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-7">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Thông tin cơ bản</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Ảnh bìa</label>
                        <?php if (!empty($product['product_image'])) : ?>
                        <div class="text-center">
                          <img class="profile-user-img img-fluid mb-3" style="height:100px" src="<?= asset('uploads/'.$product['product_image']) ?>">
                        </div>
                        <?php endif; ?>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="product_image_update" id="customFileImage">
                            <label class="custom-file-label" for="customFileImage">Lựa chọn hình ảnh</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product_name">Tên sản phẩm <span class="text-danger">*</span></label>
                        <input type="text" class="form-control data-slug product_check_slug" id="product_name" data-slug="#product_slug" name="product_name" value="<?= $product['product_name'] ?>" placeholder="Nhập vào">
                    </div>
                    <div class="form-group">
                        <label for="product_slug">Tên sản phẩm không dấu <span class="text-danger">*</span></label>
                        <input type="text" class="form-control product_check_slug" data-action="edit" id="product_slug" data-url="<?= admin_url('san-pham/kiem-tra-slug') ?>" name="product_slug" data-old="<?= $product['product_slug'] ?>" value="<?= $product['product_slug'] ?>" placeholder="Nhập vào">
                    </div>
                    <div class="form-group">
                        <label for="product_description">Mô tả ngắn <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="product_description" name="product_description" rows="5" style="resize:none" placeholder="Nhập vào"><?= $product['product_description'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="product_content">Thông tin chi tiết</label>
                        <textarea rows="10" placeholder="Nhập vào" name="product_content" id="product_content"><?= $product['product_content'] ?></textarea>
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
                            <option value="<?= $item['category_id'] ?>" <?= $item['category_id'] == $product['category_id'] ? 'selected' : '' ?>><?= $item['category_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="brand_id">Thương hiệu <span class="text-danger">*</span></label>
                        <select class="custom-select" name="brand_id" id="brand_id">
                            <option selected disabled>Lựa chọn</option>
                            <?php foreach($brands as $item) : ?>
                            <option value="<?= $item['brand_id'] ?>" <?= $item['brand_id'] == $product['brand_id'] ? 'selected' : '' ?>><?= $item['brand_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product_price">Giá tiền (VNĐ) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="product_price" name="product_price" placeholder="Nhập vào" value="<?= $product['product_price'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="product_quantity">Số lượng trong kho <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="product_quantity" name="product_quantity" placeholder="Nhập vào" value="<?= $product['product_quantity'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="product_discount">Giảm giá (%)</label>
                        <input type="number" class="form-control" id="product_discount" name="product_discount" placeholder="Nhập vào" value="<?= $product['product_discount'] ?>">
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
                                <option value="<?= $item['gift_id'] ?>"  <?php foreach(explode(',', $product['product_gifts']) as $gitem) { if($item['gift_id'] == $gitem) { echo 'selected'; } } ?>><?= $item['gift_name'] ?></option>
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
                        <input type="checkbox" id="product_status" name="product_status" value="1" <?= $product['product_status'] == 1 ? 'checked' : '' ?>>
                        <label for="product_status">
                            Hiển thị
                        </label>
                    </div>
                </div>
                <div class="col-md-3 form-group mb-0">
                    <input type="hidden" name="product_hot" value="0">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" id="product_hot" name="product_hot" value="1" <?= $product['product_hot'] == 1 ? 'checked' : '' ?>>
                        <label for="product_hot">
                            Sản phẩm Hot
                        </label>
                    </div>
                </div>
                <div class="col-md-3 form-group mb-0">
                    <input type="hidden" name="is_variant" value="0">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" id="js-product-variant" name="is_variant" value="1" <?= $product['is_variant'] == 1 ? 'checked' : '' ?>>
                        <label for="js-product-variant">
                            Biến thể
                        </label>
                    </div>
                </div>
                <div class="col-md-3 form-group mb-0">
                    <input type="hidden" name="is_config" value="0">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" id="js-product-config" name="is_config" value="1" <?= !empty($config) ? 'checked' : '' ?>>
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
                    <div class="attribute-update">
                        <?php foreach($variant as $key => $item) : ?>
                            <div class="row attribute-form border-bottom mb-3">
                                <input type="hidden" name="product_variant_id_update[<?= $key ?>]" value="<?= $item['product_variant_id'] ?>">
                                <div class="col-xl-1 col-lg-12">
                                    <?php if (!empty($item['product_variant_image'])) : ?>
                                        <div class="text-center">
                                        <img class="profile-user-img img-fluid mb-3" style="height:auto" src="<?= asset('uploads/'.$item['product_variant_image']) ?>">
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-xl-2 col-lg-12">
                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input variant-valid-update-image" name="product_variant_image_update[<?= $key ?>]" id="inputFileUpdate0<?= $key ?>">
                                            <label class="custom-file-label" for="inputFileUpdate0<?= $key ?>">Lựa chọn hình ảnh</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-12">
                                    <div class="form-group">
                                        <label>Tên <span class="text-danger">*</span></label>
                                        <input type="text" name="product_variant_name_update[<?= $key ?>]" value="<?= $item['product_variant_name'] ?>" data-slug="#product_variant_slug_update<?= $key ?>" placeholder="Nhập vào (VD: Xanh)" class="form-control data-slug variant-valid-update">
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-12">
                                    <div class="form-group">
                                        <label>Tên không dấu <span class="text-danger">*</span></label>
                                        <input type="text" name="product_variant_slug_update[<?= $key ?>]" value="<?= $item['product_variant_slug'] ?>" id="product_variant_slug_update<?= $key ?>" placeholder="Nhập vào" class="form-control variant-valid-update">
                                    </div>
                                </div>
                                <div class="col-xl-1 col-lg-12">
                                    <div class="form-group">
                                        <label>Số lượng<span class="text-danger">*</span></label>
                                        <input type="number" name="product_variant_quantity_update[<?= $key ?>]" value="<?= $item['product_variant_quantity'] ?>" placeholder="Nhập vào" class="form-control variant-valid-update">
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-12">
                                    <div class="form-group">
                                        <label>Giá tiền (VND)<span class="text-danger">*</span></label>
                                        <input type="number" name="product_variant_price_update[<?= $key ?>]" value="<?= $item['product_variant_price'] ?>" placeholder="Nhập vào" class="form-control variant-valid-update">
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-12">
                                    <div class="form-group">
                                        <label>Giảm giá (%)</label>
                                        <div class="input-group mb-3">
                                            <input type="number" name="product_variant_discount_update[<?= $key ?>]" placeholder="Nhập vào" value="<?= $item['product_variant_discount'] ?>" class="form-control rounded">
                                            <div class="input-group-prepend">
                                                <button type="button" data-url="<?= admin_url('san-pham/cap-nhat/xoa-bien-the?variant_id='.$item['product_variant_id'].'&product_id='.$product['product_id']) ?>" class="btn ml-3 rounded btn-primary btn-remove-variant btn_remove_variant">Xoá</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
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
                                <input type="text" class="form-control" id="display" name="display" placeholder="Nhập vào" value="<?= $config['display'] ?? '' ?>">
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label for="camera_front">Camera trước</label>
                                <input type="text" class="form-control" id="camera_front" name="camera_front" placeholder="Nhập vào" value="<?= $config['camera_front'] ?? '' ?>">
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label for="camera_back">Camera sau</label>
                                <input type="text" class="form-control" id="camera_back" name="camera_back" placeholder="Nhập vào" value="<?= $config['camera_back'] ?? '' ?>">
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label for="ram">Ram</label>
                                <input type="text" class="form-control" id="ram" name="ram" placeholder="Nhập vào" value="<?= $config['ram'] ?? '' ?>">
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label for="storage">Bộ nhớ</label>
                                <input type="text" class="form-control" id="storage" name="storage" placeholder="Nhập vào" value="<?= $config['storage'] ?? '' ?>">
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label for="cpu">CPU</label>
                                <input type="text" class="form-control" id="cpu" name="cpu" placeholder="Nhập vào" value="<?= $config['cpu'] ?? '' ?>">
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label for="gpu">GPU</label>
                                <input type="text" class="form-control" id="gpu" name="gpu" placeholder="Nhập vào" value="<?= $config['gpu'] ?? '' ?>">
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label for="battery">Dung lượng PIN</label>
                                <input type="text" class="form-control" id="battery" name="battery" placeholder="Nhập vào" value="<?= $config['battery'] ?? '' ?>">
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label for="sim">SIM</label>
                                <input type="text" class="form-control" id="sim" name="sim" placeholder="Nhập vào" value="<?= $config['sim'] ?? '' ?>">
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label for="system">Hệ điều hành</label>
                                <input type="text" class="form-control" id="system" name="system" placeholder="Nhập vào" value="<?= $config['system'] ?? '' ?>">
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                            <div class="form-group">
                                <label for="made_in">Xuất xứ</label>
                                <input type="text" class="form-control" id="made_in" name="made_in" placeholder="Nhập vào" value="<?= $config['made_in'] ?? '' ?>">
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