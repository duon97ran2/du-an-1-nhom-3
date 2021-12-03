</html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="<?= asset('css/auth.css') ?>" />
  </head>
  <body>
    <div class="content">
      <div class="flex-div">
        <div class="name-content">
          <a href="<?= app_url() ?>"><h1 class="logo">POLY&nbsp;MOBILE</h1></a>
          <p>Thế giới công nghệ.</p>
        </div>
          <form action="<?= app_url('quen-mat-khau/cap-nhat-mat-khau/kiem-tra') ?>" method="post">
            <?php if (!empty(print_errors('message'))) : ?>
            <div class="alert alert-danger"><?= print_errors('message') ?></div>
            <?php endif; ?>
            
            <input type="hidden" name="token" value="<?= $token ?>">
            <input type="hidden" name="email" value="<?= $email ?>">
            <div class="mb-3">
                <input type="password" name="password" class="<?= print_errors('password') ? ' is-invalid' : '' ?>" placeholder="Mật khẩu mới" />
                <small class="errors"><?= print_errors('password') ?></small>
            </div>
            <div class="mb-3">
                <input type="password" name="confirm_password" class="<?= print_errors('confirm_password') ? ' is-invalid' : '' ?>" placeholder="Xác nhận mật khẩu mới" />
                <small class="errors"><?= print_errors('confirm_password') ?></small>
            </div>
            <?php remove_errors() ?>
            <button type="submit" class="login">Cập nhật mật khẩu</button>
          </form>
      </div>
    </div>
  </body>
</html>
