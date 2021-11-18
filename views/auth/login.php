<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PolyMOBILE | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= asset('adminlte/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= asset('adminlte/dist/css/adminlte.min.css') ?>">
</head>
<body class="hold-transition login-page">
<div class="login-box" style="width: 400px">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Poly</b>MOBILE</a>
    </div>
    <div class="card-body">
        <form action="<?= admin_url('dang-nhap/kiem-tra') ?>" method="post">
            <?php if (!empty(print_errors('message'))) : ?>
            <div class="alert alert-danger"><?= print_errors('message') ?></div>
            <?php endif; ?>

            <div class="form-group mb-3">
                <div class="input-group">
                    <input type="text" name="email" class="form-control<?= print_errors('email') ? ' is-invalid' : '' ?>" placeholder="Email">
                    <div class="input-group-append">  
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <span class="text-danger"><?= print_errors('email') ?></span>
            </div>
            <div class="form-group mb-3">
                <div class="input-group">
                <input type="password" name="password" class="form-control<?= print_errors('password') ? ' is-invalid' : '' ?>" placeholder="Mật khẩu">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <span class="text-danger"><?= print_errors('password') ?></span>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
        </form>
        <?php remove_errors() ?>
        <p class="mt-2 mb-1">
            <a href="#">Quên mật khẩu?</a>
        </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= asset('adminlte/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= asset('adminlte/dist/js/adminlte.min.js') ?>"></script>
</body>
</html>
