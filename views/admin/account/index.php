<?php
$is_active = [
    0 => 'Tạm khóa',
    1 => 'Hoạt động',
];
$is_verify = [
    0 => 'Chưa kích hoạt',
    1 => 'Đã kích hoạt',
];
$gender = [
    0 => 'Nam',
    1 => 'Nữ',
    2 => 'Khác',
];
?>
<section class="content-header">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h2>Danh sách tài khoản</h2>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
                <li class="breadcrumb-item active">Tài khoản</li>
            </ol>
        </div>
    </div>
</section>
<?php if (!empty(print_errors('message'))) : ?>
    <div class="alert alert-success mb-3"><?= print_errors('message') ?></div>
<?php endif; ?>
<div class="card card-default">
    <div class="card-header">
        <a href="<?= ADMIN_URL ?>tai-khoan/tao-moi" class="btn mb-3 btn-success btn-sm">Thêm mới</a>
        <form method="get" class="form-inline ml-n2">
            <div class="form-group ml-1">
                <input class="form-control form-control-sm" type="text" name="email" placeholder="Nhập mã email" value="<?= (!empty(input_get('email'))) ? input_get('email') : '' ?>">
            </div>
            <button type="submit" class="btn btn-primary btn-sm ml-1">Lọc</button>
            <a href="<?= admin_url('tai-khoan') ?>" class="btn btn-primary btn-sm ml-1">Bỏ lọc</a>
        </form>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped text-center">
            <thead>
                <th>ID</th>
                <th>Họ và tên</th>
                <th>Email</th>
                <th>Giới tính</th>
                <th>Trạng thái</th>
                <th>Kích hoạt</th>
                <th>Vai trò</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Ảnh đại diện</th>
                <th>
                    Chức năng
                </th>
            </thead>
            <tbody>
                <?php foreach ($dsTaiKhoan as $u) : ?>
                    <tr>
                        <td><?= $u['user_id'] ?></td>
                        <td><?= $u['name'] ?></td>
                        <td><?= $u['email'] ?></td>
                        <td><?= $gender[$u['gender']] ?></td>
                        <td><?= $is_active[$u['is_active']] ?></td>
                        <td><?= $is_verify[$u['is_verify']] ?></td>
                        <td><?= $u['role'] ?></td>
                        <td><?= $u['address'] ?></td>
                        <td><?= $u['phone'] ?></td>
                        <td>
                            <img src="<?= PUBLIC_ASSETS . $u['avatar'] ?>" width="100">
                        </td>
                        <td class='d-flex'>
                            <a href="<?= ADMIN_URL . 'tai-khoan/sua?id=' . $u['user_id'] ?>" class="btn btn-sm btn-info">Sửa</a>
                            &nbsp;
                            <?php if (auth_info()['user_id'] != $u['user_id']) : ?>
                                <a href="javascript:;" data-url="<?= ADMIN_URL . 'tai-khoan/xoa?id=' . $u['user_id'] ?>" data-name="<?= $u['name'] ?>" class="btn btn-sm btn-danger btn_remove_account">Xóa</a>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>