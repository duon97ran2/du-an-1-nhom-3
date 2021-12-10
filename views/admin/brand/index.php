<section class="content-header">
    <div class="row mb-2">
        <div class="col-sm-6">
            <a href="<?= admin_url('thuong-hieu') ?>" class="btn btn-default ml-n2">Danh sách thương hiệu</a>
            <a href="<?= admin_url('thuong-hieu/tao-moi') ?>" class="btn btn-primary">Thêm thương hiệu mới</a>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
                <li class="breadcrumb-item active">Thương hiệu</li>
            </ol>
        </div>
    </div>
</section>
<div class="card card-default">
    <div class="card-header">
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped text-center">
            <thead>
                <th>ID</th>
                <th>Tên thương hiệu</th>
                <th>Ảnh đại diện</th>
                <th>Ngày tạo mới</th>
                <th>Ngày cập nhập</th>
                <th>Tác vụ</th>
            </thead>
            <tbody>
                <?php foreach ($dsThuongHieu as $u) : ?>
                    <tr>
                        <td><?= $u['brand_id'] ?></td>
                        <td><?= $u['brand_name'] ?></td>
                        <td>
                            <img src="<?= PUBLIC_ASSETS . $u['brand_image'] ?>" width="100">
                        </td>
                        <td><?= $u['created_at'] ?></td>
                        <td><?= $u['updated_at'] ?></td>
                        <td>
                            <a href="<?= ADMIN_URL . 'thuong-hieu/sua?brand_id=' . $u['brand_id'] ?>" class="btn btn-sm btn-info">Sửa</a>
                            <a href="javascript:;" onclick="confirm_before_remove('<?= ADMIN_URL . 'thuong-hieu/xoa?brand_id=' . $u['brand_id'] ?>', '<?= $u['brand_name'] ?>')" class="btn btn-sm btn-danger">Xóa</a>

                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>