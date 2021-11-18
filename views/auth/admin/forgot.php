<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PolyMOBILE | Quên mật khẩu</title>

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
        <form action="<?= admin_url('quen-mat-khau/kiem-tra') ?>" method="post">
            <?php if (!empty(get_session('message'))) : ?>
            <div class="alert alert-success">
                <?= get_session('message') ?>
            </div>
            <?php remove_session('message') ?>
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
            <button type="submit" class="btn btn-primary btn-block">Gửi</button>
        </form>
        <?php remove_errors() ?>
        <p class="mt-2 mb-1">
            <a href="<?= admin_url('dang-nhap') ?>">Đăng nhập</a>
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
