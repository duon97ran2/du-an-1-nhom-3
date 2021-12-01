<form action="<?= ADMIN_URL . 'thuong-hieu/luu-sua?brand_id=' . $brand['brand_id'] ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="form-group">
                <label for="">Tên thương hiệu</label>
                <input type="text" name="brand_name" id="" class="form-control" placeholder="" value="<?= $brand['brand_name'] ?>">
                <span class="error">*<?= $_SESSION['errors']['brand_name'] ?? '' ?></span>
            </div>
            <div class="form-group">
                <label for="">Slug</label>
                <input type="text" name="brand_slug" id="" class="form-control" placeholder="" value="<?= $brand['brand_slug'] ?>">
                <span class="error">*<?= $_SESSION['errors']['brand_slug'] ?? '' ?></span>
            </div>
            <div>
                <img src="<?= PUBLIC_ASSETS . $u['brand_image'] ?>" width="250">
            </div>
            <label for="">Logo thương hiệu</label>
            <input type="file" name="brand_image" id="" class="form-control" placeholder="">
            <span class="error">*<?= $_SESSION['errors']['brand_image'] ?? '' ?></span>
            <div class="form-group">
                <label for="">Ngày tạo mới</label>
                <input type="text" name="created_at" id="" class="form-control" placeholder="" value="<?= $brand['created_at'] ?>">
            </div>
            <div class="form-group">
                <label for="">Ngày cập nhật</label>
                <input type="text" name="updated_at" id="" class="form-control" placeholder="" value="<?= $brand['updated_at'] ?>">
            </div>
            <?php unset($_SESSION['errors']) ?>
        </div>
    </div>
    <br>
    <div class="d-flex justify-content-center">
        <a href="<?= ADMIN_URL . 'thuong-hieu' ?>" class="btn btn-sm btn-danger">Hủy</a>
        &nbsp;
        <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
    </div>
    </div>
    </div>
</form>