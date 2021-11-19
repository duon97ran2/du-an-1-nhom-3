<?php $status = [
    0 => 'Kích hoạt',
    1 => 'Tạm khóa',
];
$gender = [
    0 => 'Nam',
    1 => 'Nữ',
    2 => 'Khác',
];
$role = [
    0 => 'Quản trị viên',
    1 => 'Nhân viên',
    2 => 'Khách hàng',
];
?>
<h2>Danh sách tài khoản</h2>
<table class="table table-stripped table-responsive text-center">
    <thead>
        <th>ID</th>
        <th>Họ và tên</th>
        <th>Email</th>
        <th>Giới tính</th>
        <th>Trạng thái</th>
        <th>Vai trò</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th>Ảnh đại diện</th>
        <th>
            <a href="<?= ADMIN_URL ?>tai-khoan/tao-moi" class="btn btn-success btn-sm">Thêm tài khoản</a>
        </th>
    </thead>
    <tbody>
        <?php foreach ($dsTaiKhoan as $u) : ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= $u['name'] ?></td>
                <td><?= $u['email'] ?></td>
                <td><?= $gender[$u['gender']] ?></td>
                <td><?= $status[$u['status']] ?></td>
                <td><?= $role[$u['role_id']] ?></td>
                <td><?= $u['address'] ?></td>
                <td><?= $u['phone'] ?></td>
                <td>
                    <img src="<?= PUBLIC_ASSETS . $u['avatar'] ?>" width="100">
                </td>
                <td>
                    <a href="<?= ADMIN_URL . 'tai-khoan/sua?id=' . $u['id'] ?>" class="btn btn-sm btn-info">Sửa</a>
                    <a href="<?= ADMIN_URL . 'tai-khoan/xoa?id=' . $u['id'] ?>" class="btn btn-sm btn-danger">Xóa</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>