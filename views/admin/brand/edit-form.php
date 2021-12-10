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
<form action="<?= ADMIN_URL . 'thuong-hieu/luu-sua?brand_id=' . $brand['brand_id'] ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="card card-default">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Tên thương hiệu</label>
                        <input type="text" name="brand_name" id="" class="form-control" placeholder="" value="<?= $brand['brand_name'] ?>">
                        <span class="error"><?= $_SESSION['errors']['brand_name'] ?? '' ?></span>
                    </div>
                    <div>
                        <img src="<?= PUBLIC_ASSETS . $brand['brand_image'] ?>" width="250">
                    </div>
                    <label for="">Logo thương hiệu</label>
                    <input type="file" name="brand_image" id="" class="form-control" placeholder="">
                    <span class="error"><?= $_SESSION['errors']['brand_image'] ?? '' ?></span>
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