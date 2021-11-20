<?php $is_active = [
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
                <td><?= $u['user_id'] ?></td>
                <td><?= $u['name'] ?></td>
                <td><?= $u['email'] ?></td>
                <td><?= $gender[$u['gender']] ?></td>
                <td><?= $is_active[$u['is_active']] ?></td>
                <td><?= $role[$u['role']] ?></td>
                <td><?= $u['address'] ?></td>
                <td><?= $u['phone'] ?></td>
                <td>
                    <img src="<?= PUBLIC_ASSETS . $u['avatar'] ?>" width="100">
                </td>
                <td>
                    <a href="<?= ADMIN_URL . 'tai-khoan/sua?id=' . $u['user_id'] ?>" class="btn btn-sm btn-info">Sửa</a>
                    <a href="<?= ADMIN_URL . 'tai-khoan/xoa?id=' . $u['user_id'] ?>" class="btn btn-sm btn-danger">Xóa</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>