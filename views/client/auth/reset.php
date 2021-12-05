<section class="fs-main">
  <div class="f-wrap">
    <div class="row my-5">
      <div class="offset-sm-3 col-sm-6">
        <div class="well">
          <h2 class="mb-5">Cập nhật mật khẩu mới</h2>
          <form action="<?= app_url('quen-mat-khau/cap-nhat-mat-khau/kiem-tra') ?>" method="post">
            <input type="hidden" name="token" value="<?= $token ?>">
            <input type="hidden" name="email" value="<?= $email ?>">
            <div class="form-group">
              <label class="control-label">Mật khẩu mới</label>
                <input type="password" name="password" class="form-control<?= print_errors('password') ? ' is-invalid' : '' ?>" placeholder="Mật khẩu mới" />
                <small class="errors text-danger"><?= print_errors('password') ?></small>
            </div>
            <div class="form-group">
              <label class="control-label">Xác nhận mật khẩu mới</label>
              <input type="password" name="confirm_password" class="form-control<?= print_errors('confirm_password') ? ' is-invalid' : '' ?>" placeholder="Xác nhận mật khẩu mới" />
              <small class="errors text-danger"><?= print_errors('confirm_password') ?></small>
            </div>
            <?php remove_errors() ?>
            <div class="form-group">
              <input type="submit" value="Cập nhật mật khẩu" class="btn btn-danger">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
