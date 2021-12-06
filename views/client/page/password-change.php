<section class="fs-main">
  <div class="f-wrap">
    <div class="row my-5">
      <div class="offset-sm-3 col-sm-6">
        <div class="well">
          <h1>Đổi mật khẩu</h1>
          <form action="" method="POST">
            <div class="bg-vid">
              <img width="100%" src="https://cdn.dribbble.com/users/1525393/screenshots/15722735/media/fdb36d13151cbc4030699f668faa4226.gif" alt="">
            </div>
            <div class="form-group d-flex flex-column justify-content-center mx-5 ">
              <label for="old_password">Mật khẩu cũ</label>
              <input type="password" class="form-control form-control my-3" placeholder="Nhập mật khẩu cũ của bạn" name="old_password">
              <span class='text-danger'><?= print_errors('old_password')?></span>
            </div>
            <div class="form-group d-flex flex-column justify-content-center mx-5 ">
              <label for="old_password">Mật khẩu mới</label>
              <input type="password" class="form-control form-control my-3" placeholder="Nhập mật khẩu mới của bạn" name="new_password">
              <span class='text-danger'><?= print_errors('new_password')?></span>
            </div>
            <div class="form-group d-flex flex-column justify-content-center mx-5 ">
              <label for="old_password">Xác nhận mật khẩu</label>
              <input type="password" class="form-control form-control my-3" placeholder="Xác nhận mật khẩu mới của bạn" name="confirm_password">
              <span class='text-danger'><?= print_errors('confirm_password')?></span>
            </div>
            <div class="buttons mx-5">
              <div class="text-right">
                <input type="submit" name ='change_btn' value="Đổi mật khẩu" class="btn btn-danger btn-block">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php unset($_SESSION['errors'])?>
</section>