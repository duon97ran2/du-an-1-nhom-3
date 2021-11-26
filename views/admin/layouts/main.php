<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $page_title ?? 'Dashboard' ?><?= (!empty(option_info()) ? ' - ' . option_info('app_name') : 'Document') ?></title>
  <?php if(!empty(option_info('favicon'))): ?>
  <link rel="icon" type="image/png" href="<?= asset('uploads/'.option_info('favicon')) ?>"/>
  <?php endif; ?>
  <?php include_once "./views/admin/layouts/style.php" ?>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= ADMIN_ASSETS ?>dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <?php include_once "./views/admin/layouts/header.php" ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include_once "./views/admin/layouts/sidebar.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <?php include_once $businessView; ?>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="<?= admin_url('dashboard') ?>"><?= (!empty(option_info()) ? option_info()['app_name'] : 'Document') ?></a>.</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php include_once "./views/admin/layouts/script.php" ?>

</body>
</html>
