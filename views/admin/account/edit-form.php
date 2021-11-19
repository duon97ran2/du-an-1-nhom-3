<form action="<?= ADMIN_URL . 'tai-khoan/luu-sua?id=' . $user['id'] ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="form-group">
                <label for="">Họ và tên</label>
                <input type="text" name="name" id="" class="form-control" placeholder="" value="<?= $user['name'] ?>">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" id="" class="form-control" placeholder="" value="<?= $user['email'] ?>">
            </div>
            <div>
                <img src="<?= PUBLIC_ASSETS . $user['avatar'] ?>" width="250">
            </div>
            <div class="form-group">
                <label for="">Ảnh đại diện</label>
                <input type="file" name="avatar" id="" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label for="status">Trạng thái</label>
                <select name="status" id="">
                    <option value="0" <?php echo ($user['status']==0)?'selected':''?>>Kích hoạt</option>
                    <option value="1" <?php echo ($user['status']==1)?'selected':''?>>Tạm khóa</option>
                </select>
            </div>
            <div class="form-group">
                <label for="role_id">Vai trò</label>
                <select name="role_id" id="">
                    <option value="0" <?php echo ($user['role_id']==0)?'selected':''?>>Quản trị viên</option>
                    <option value="1" <?php echo ($user['role_id']==1)?'selected':''?>>Nhân viên</option>
                    <option value="2" <?php echo ($user['role_id']==2)?'selected':''?>>Khách hàng</option>
                </select>
            </div>
            <div class="form-group">
                <label for="gender">Giới tính</label>
                <select name="gender" id="">
                    <option value="0" <?php echo ($user['gender']==0)?'selected':''?>>Nam</option>
                    <option value="1" <?php echo ($user['gender']==1)?'selected':''?>>Nữ</option>
                    <option <?php echo ($user['gender']==2)?'selected':''?>value="2">Khác</option>
                </select>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" name="phone" id="" class="form-control" placeholder="" value="<?=$user['phone']?>">
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input type="text" name="address" id="" class="form-control" placeholder="" value="<?=$user['address']?>">
            </div>
        </div>
    </div>
    <br>
    <div class="d-flex justify-content-center">
        <a href="<?= ADMIN_URL . 'tai-khoan' ?>" class="btn btn-sm btn-danger">Hủy</a>
        &nbsp;
        <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
    </div>
    </div>
    </div>
</form>