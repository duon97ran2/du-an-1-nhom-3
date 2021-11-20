<!-- jQuery -->
<script src="<?= ADMIN_ASSETS ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= ADMIN_ASSETS ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= ADMIN_ASSETS ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?= ADMIN_ASSETS ?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- Custom File -->
<script src="<?= ADMIN_ASSETS ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- daterangepicker -->
<script src="<?= ADMIN_ASSETS ?>plugins/moment/moment.min.js"></script>
<script src="<?= ADMIN_ASSETS ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= ADMIN_ASSETS ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= ADMIN_ASSETS ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= ADMIN_ASSETS ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= ADMIN_ASSETS ?>dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= ADMIN_ASSETS ?>dist/js/demo.js"></script>
<?php foreach ($scripts as $script) : ?>
<script src="<?= asset($script) ?>"></script>
<?php endforeach; ?>
<script>
$(function () {
  bsCustomFileInput.init();
    //Bootstrap Duallistbox
});
</script>