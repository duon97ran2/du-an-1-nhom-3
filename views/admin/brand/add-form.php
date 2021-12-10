<section class="content-header">
    <div class="row mb-2">
        <div class="col-sm-6">
            <a href="<?= admin_url('thuong-hieu') ?>" class="btn btn-default ml-n2">Danh sách thương hiệu</a>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
                <li class="breadcrumb-item active">Thương hiệu</li>
            </ol>
        </div>
    </div>
</section>
<form action="<?= ADMIN_URL . 'thuong-hieu/luu-tao-moi' ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="card card-default">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Tên thương hiệu</label>
                        <input type="text" name="brand_name" id="" class="form-control" placeholder="">
                        <span class="error text-danger"><?= $_SESSION['errors']['brand_name'] ?? '' ?></span>

                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="brand_image">
                            <label class="custom-file-label" for="avatar">Chọn hình ảnh</label>
                        </div>
                        <span class="error text-danger"><?= $_SESSION['errors']['brand_image'] ?? '' ?></span>
                    </div>
                    <br>
                    <div class="d-flex justify-content-center">
                        <a href="<?= ADMIN_URL . 'thuong-hieu' ?>" class="btn btn-sm btn-danger">Hủy</a>
                        &nbsp;
                        <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
                    </div>
                    <?php unset($_SESSION['errors']) ?>
                </div>
            </div>
        </div>
    </div>
</form>