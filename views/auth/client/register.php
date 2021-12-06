</html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng ký tài khoản</title>
    <link rel="stylesheet" href="<?= asset('css/auth.css') ?>" />
  </head>
  <body>
    <div class="content">
      <div class="flex-div">
        <div class="name-content">
          <a href="<?= app_url() ?>"><h1 class="logo">POLY&nbsp;MOBILE</h1></a>
          <p>Thế giới công nghệ.</p>
        </div>
          <form action="<?= app_url('dang-ky/kiem-tra') ?>" method="post">
            <?php if (!empty(print_errors('message'))) : ?>
            <div class="alert alert-danger"><?= print_errors('message') ?></div>
            <?php endif; ?>

            <?php if (!empty(get_session('message'))) : ?>
            <div class="alert alert-success">
                <?= get_session('message') ?>
            </div>
            <?php remove_session('message') ?>
            <?php endif; ?>

            <div class="mb-3">
                <input type="text" name="name" class="<?= print_errors('name') ? ' is-invalid' : '' ?>" placeholder="Họ và Tên" />
                <small class="errors"><?= print_errors('name') ?></small>
            </div>
            <div class="mb-3">
                <input type="text" name="email" class="<?= print_errors('email') ? ' is-invalid' : '' ?>" placeholder="Địa chỉ email" />
                <small class="errors"><?= print_errors('email') ?></small>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="<?= print_errors('password') ? ' is-invalid' : '' ?>" placeholder="Mật khẩu" />
                <small class="errors"><?= print_errors('password') ?></small>
            </div>
            <div class="mb-3">
                <input type="password" name="confirm_password" class="<?= print_errors('confirm_password') ? ' is-invalid' : '' ?>" placeholder="Xác nhận mật khẩu" />
                <small class="errors"><?= print_errors('confirm_password') ?></small>
            </div>
            <?php remove_errors() ?>
            <button type="submit" class="login">Đăng Ký</button>
            <hr>
            <a href="<?= app_url('dang-nhap') ?>" class="create-account">Đăng nhập</a>
          </form>
      </div>
    </div>
  </body>
</html>