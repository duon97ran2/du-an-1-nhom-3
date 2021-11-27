<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?= ADMIN_ASSETS ?>plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="<?= ADMIN_ASSETS ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= ADMIN_ASSETS ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= ADMIN_ASSETS ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- sweetalert2 -->
<link rel="stylesheet" href="<?= ADMIN_ASSETS ?>plugins/sweetalert2/sweetalert2.min.css">
<!-- Toastr -->
<link rel="stylesheet" href="<?= ADMIN_ASSETS ?>plugins/toastr/toastr.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="<?= ADMIN_ASSETS ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="<?= ADMIN_ASSETS ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Sweet Alert -->
<link rel="stylesheet" href="<?= ADMIN_ASSETS ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- JQVMap -->
<link rel="stylesheet" href="<?= ADMIN_ASSETS ?>plugins/jqvmap/jqvmap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?= ADMIN_ASSETS ?>dist/css/adminlte.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="<?= ADMIN_ASSETS ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="<?= ADMIN_ASSETS ?>plugins/daterangepicker/daterangepicker.css">
<!-- summernote -->
<link rel="stylesheet" href="<?= ADMIN_ASSETS ?>plugins/summernote/summernote-bs4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="<?= ADMIN_ASSETS ?>plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- CodeMirror -->
<link rel="stylesheet" href="<?= ADMIN_ASSETS ?>plugins/codemirror/codemirror.css">
<link rel="stylesheet" href="<?= ADMIN_ASSETS ?>plugins/codemirror/theme/monokai.css">
<?php foreach ($styles as $style) : ?>
<link rel="stylesheet" href="<?= asset($style) ?>">
<?php endforeach; ?>