<section class="fs-main">
  <div class="f-wrap">
    <div class="row">
      <ol class="ml-2 mt-0 breadcrumb bg-transparent breadcrumb-margin">
        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
        <li class="breadcrumb-item active"><a href="<?= app_url('dang-ky') ?>">Đăng ký</a></li>
      </ol>
    </div>
    <div class="row my-5">
      <div class="col-sm-6">
        <div class="well">
          <h2>Khách hàng mới</h2>
          <form action="<?= app_url('dang-ky/kiem-tra') ?>" method="post">
            <div class="form-group">
              <label>Họ và Tên</label>
              <input type="text" name="name" value="" class="form-control<?= print_errors('name') ? ' is-invalid' : '' ?>" placeholder="Họ và Tên" />
              <small class="errors text-danger"><?= print_errors('name') ?></small>
            </div>
            <div class="form-group">
              <label>Địa chỉ email</label>
              <input type="text" name="email" value="" class="form-control<?= print_errors('email') ? ' is-invalid' : '' ?>" placeholder="Địa chỉ email" />
              <small class="errors text-danger"><?= print_errors('email') ?></small>
            </div>
            <div class="form-group">
              <label>Mật khẩu</label>
              <input type="password" name="password" value="" class="form-control<?= print_errors('password') ? ' is-invalid' : '' ?>" placeholder="Mật khẩu" />
              <small class="errors text-danger"><?= print_errors('password') ?></small>
            </div>
            <div class="form-group">
              <label>Xác nhận mật khẩu</label>
              <input type="password" name="confirm_password" value="" class="form-control<?= print_errors('confirm_password') ? ' is-invalid' : '' ?>" placeholder="Xác nhận mật khẩu" />
              <small class="errors text-danger"><?= print_errors('confirm_password') ?></small>
            </div>
            <?php remove_errors() ?>
            <div class="buttons">
              <div class="text-right">
                <input type="submit" value="Đăng ký ngay" class="btn btn-danger btn-block">
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="well pb-0">
          <h2>Tôi là đã có tài khoản</h2>
          <span>Nếu bạn đã có tài khoản với chúng tôi, <a href="<?= app_url('dang-nhap') ?>">đăng nhập</a> ngay.</p>
        </div>
      </div>
    </div>
  </div>
</section>