<h2>Danh sách thương hiệu</h2>

<table class="table table-stripped">
    <thead>
        <th>ID</th>
        <th>Tên thương hiệu</th>
        <th>Slug</th>
        <th>Logo thương hiệu</th>
        <th>Ngày tạo mới</th>
        <th>Ngày cập nhập</th>
        <th>
        <a href="<?= ADMIN_URL ?>thuong-hieu/tao-moi">Tạo mới</a>
        </th>
    </thead>
    <tbody>
        <?php foreach ($dsThuongHieu as $u) : ?>
            <tr>
                <td><?= $u['brand_id'] ?></td>
                <td><?= $u['brand_name'] ?></td>
                <td><?= $u['brand_slug'] ?></td>
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

