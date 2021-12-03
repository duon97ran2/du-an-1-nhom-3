<section class="fs-main">
  <div class="f-wrap">
    <div class="row">
      <ol class="ml-2 mt-0 breadcrumb bg-transparent breadcrumb-margin">
        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
        <li class="breadcrumb-item active"><a href="<?= app_url('dang-nhap') ?>">Đăng nhập</a></li>
      </ol>
    </div>
    <div class="row my-5">
      <div class="col-sm-6">
        <div class="well">
          <h2>Khách hàng mới</h2>
          <p>Bằng cách tạo tài khoản, bạn sẽ có thể mua sắm nhanh hơn, cập nhật trạng thái đơn hàng và theo dõi các đơn hàng bạn đã thực hiện trước đó.</p>
          <a href="<?= app_url('dang-ky') ?>" class="btn btn-danger">Đăng ký ngay</a>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="well">
          <h2 class="mb-5">Tôi là đã có tài khoản</h2>
          <form action="<?= app_url('dang-nhap/kiem-tra') ?>" method="post">
            <div class="form-group">
              <label class="control-label" for="input-email">Địa chỉ email</label>
              <input type="text" name="email" value="" id="input-email" class="form-control<?= print_errors('email') ? ' is-invalid' : '' ?>" placeholder="Địa chỉ email" />
              <small class="errors text-danger"><?= print_errors('email') ?></small>
            </div>
            <div class="form-group">
              <label class="control-label" for="input-password">Mật khẩu</label>
              <input type="password" name="password" value="" id="input-password" class="form-control<?= print_errors('password') ? ' is-invalid' : '' ?>" placeholder="Mật khẩu" />
              <small class="errors text-danger"><?= print_errors('password') ?></small>
            </div>
            <?php remove_errors() ?>
            <div class="mb-3">
              <a href="<?= app_url('quen-mat-khau') ?>" class="mt-0">Quên mật khẩu?</a>
            </div>
            <div class="form-group">
              <input type="submit" value="Đăng nhập" class="btn btn-danger">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>