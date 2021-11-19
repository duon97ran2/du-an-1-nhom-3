<form action="<?= ADMIN_URL . 'tai-khoan/luu-tao-moi' ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="form-group">
                <label for="">Họ và tên</label>
                <input type="text" name="name" id="" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" id="" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Ảnh đại diện</label>
                <input type="file" name="avatar" id="" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Mật khẩu</label>
                <input type="password" name="password" id="" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label for="status">Trạng thái</label>
                <select name="status" id="">
                    <option disabled selected>Chọn trạng thái</option>
                    <option value="0">Kích hoạt</option>
                    <option value="1">Tạm khóa</option>
                </select>
            </div>
            <div class="form-group">
                <label for="role_id">Vai trò</label>
                <select name="role_id" id="">
                    <option disabled selected>Chọn vai trò</option>
                    <option value="0">Quản trị viên</option>
                    <option value="1">Nhân viên</option>
                    <option value="2">Khách hàng</option>
                </select>
            </div>
            <div class="form-group">
                <label for="gender">Giới tính</label>
                <select name="gender" id="">
                    <option disabled selected>Chọn giới tính</option>
                    <option value="0">Nam</option>
                    <option value="1">Nữ</option>
                    <option value="2">Khác</option>
                </select>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" name="phone" id="" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input type="text" name="address" id="" class="form-control" placeholder="">
            </div>
            <br>
            <div class="d-flex justify-content-center">
                <a href="<?= ADMIN_URL . 'tai-khoan'?>" class="btn btn-sm btn-danger">Hủy</a>
                &nbsp;  
                <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
            </div>
        </div>
    </div>
</form>