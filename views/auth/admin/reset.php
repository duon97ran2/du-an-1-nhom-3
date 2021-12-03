<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PolyMOBILE | Cập nhật mật khẩu</title>

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
<div class="login-box" style="width: 500px">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= admin_url('dashboard') ?>" class="h1"><b>Poly</b>MOBILE</a>
    </div>
    <div class="card-body">
        <form action="<?= admin_url('quen-mat-khau/cap-nhat-mat-khau/kiem-tra') ?>" method="post">
            <?php if (!empty(print_errors('message'))) : ?>
            <div class="alert alert-danger"><?= print_errors('message') ?></div>
            <?php endif; ?>
            
            <input type="hidden" name="token" value="<?= $token ?>">
            <input type="hidden" name="email" value="<?= $email ?>">
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
            <div class="form-group mb-3">
                <div class="input-group">
                <input type="password" name="confirm_password" class="form-control<?= print_errors('confirm_password') ? ' is-invalid' : '' ?>" placeholder="Xác nhận mật khẩu">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <span class="text-danger"><?= print_errors('confirm_password') ?></span>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Cập nhật mật khẩu</button>
        </form>
        <?php remove_errors() ?>
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
