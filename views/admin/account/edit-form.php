<section class="content-header">
    <div class="row mb-2">
        <div class="col-sm-6">
            <a href="<?= admin_url('tai-khoan') ?>" class="btn btn-default ml-n2">Danh sách tài khoản</a>
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
            <div class="alert alert-danger mb-3"><?= print_errors('message') ?></div>
        <?php endif; ?>
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Sửa tài khoản</h3>
    </div>
    <form action="<?= ADMIN_URL . 'tai-khoan/luu-sua?id=' . $user['user_id'] ?>" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Họ và tên</label>
                <input type="text" name="name" id="" class="form-control" placeholder="" value="<?= $user['name'] ?>">
                <span class='text-danger'><?= print_errors('name')?></span>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" disabled name="email" id="" class="form-control" placeholder="" value="<?= $user['email'] ?>">
            </div>
            <div class="form-group">
                <label class='required' for="avatar">Ảnh đại diện</label>
                <div class='mb-3'>
                    <img src="<?= PUBLIC_ASSETS . $user['avatar'] ?>" width="250">
                </div>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="avatar">
                        <label class="custom-file-label" for="avatar"><?= $user['avatar'] ?></label>
                    </div>
                </div>
                <span class='text-danger'><?= print_errors('avatar')?></span>
            </div>
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="gender">Giới tính</label>
                    <div class="radio icheck-primary d-inline mx-3">
                        <input type="radio" id="male" name="gender" <?php echo ($user['gender']==0)?'checked':''?> value="0" />
                        <label for="male">Nam</label>
                    </div>
                    <div class="radio icheck-primary d-inline mx-3">
                        <input type="radio" id="female" name="gender" <?php echo ($user['gender']==1)?'checked':''?> value="1" />
                        <label for="female">Nữ</label>
                    </div>
                    <div class="radio icheck-primary d-inline mx-3">
                        <input type="radio"  id="other" name="gender" <?php echo ($user['gender']==2)?'checked':''?> value="2" />
                        <label for="other">Giới tính khác</label>
                    </div>
                </div>
                <?php if (auth_info()['user_id'] != $user['user_id']) : ?>
                <div class=" col-6 mb-3">
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="role">Vai trò</label>
                        </div>
                        <select name="role" id="role" class="custom-select">
                            <option <?php echo ($user['role']=='admin')?'selected':''?> value="admin" >Quản trị viên</option>
                            <option value="customer" <?php echo ($user['role']=="customer")?'selected':''?>>Khách hàng</option>
                        </select>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="row">
                <?php if (auth_info()['user_id'] != $user['user_id']) : ?>
                <div class="col-6 mb-3">
                    <input type="hidden" name="is_active" value="1">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" id="is_active" name="is_active" value="0" <?php echo ($user['is_active']==0)?'checked':''?> >
                        <label for="is_active">
                            Khóa tài khoản
                        </label>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" name="phone" id="" class="form-control" placeholder="" value="<?= $user['phone']?>">
                <span class='text-danger'><?= print_errors('phone')?></span>
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input type="text" name="address" id="" class="form-control" placeholder="" value="<?= $user['address']?>">
                <span class='text-danger'><?= print_errors('address')?></span>
            </div>
            <br>
            <div class="d-flex justify-content-center">
                <a href="<?= ADMIN_URL . 'tai-khoan' ?>" class="btn btn-sm btn-danger">Hủy</a>
                &nbsp;
                <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
            </div>
        </div>
    </form>
    <?php unset($_SESSION['errors'])?>
</div>