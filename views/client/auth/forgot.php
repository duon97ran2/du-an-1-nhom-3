<section class="fs-main">
  <div class="f-wrap">
    <div class="row">
      <ol class="ml-2 mt-0 breadcrumb bg-transparent breadcrumb-margin">
        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
        <li class="breadcrumb-item active"><a href="<?= app_url('quen-mat-khau') ?>">Quên mật khẩu</a></li>
      </ol>
    </div>
    <div class="row my-5">
      <div class="offset-sm-3 col-sm-6">
        <div class="well">
          <h2 class="mb-5">Quên mật khẩu</h2>
          <form action="<?= app_url('quen-mat-khau/kiem-tra') ?>" method="post">
            <div class="form-group">
              <label class="control-label" for="input-email">Địa chỉ email</label>
              <input type="text" name="email" value="" id="input-email" class="form-control<?= print_errors('email') ? ' is-invalid' : '' ?>" placeholder="Địa chỉ email" />
                <small class="errors text-danger"><?= print_errors('email') ?></small>
            </div>
            <?php remove_errors() ?>
            <div class="mb-3">
              <a href="<?= app_url('dang-nhap') ?>" class="mt-0">Đăng nhập</a>
            </div>
            <div class="form-group">
              <input type="submit" value="Quên mật khẩu" class="btn btn-danger">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
