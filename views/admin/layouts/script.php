<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script src="<?= ADMIN_ASSETS ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= ADMIN_ASSETS ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= ADMIN_ASSETS ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= ADMIN_ASSETS ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= ADMIN_ASSETS ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= ADMIN_ASSETS ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= ADMIN_ASSETS ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= ADMIN_ASSETS ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= ADMIN_ASSETS ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= ADMIN_ASSETS ?>plugins/jszip/jszip.min.js"></script>
<script src="<?= ADMIN_ASSETS ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= ADMIN_ASSETS ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= ADMIN_ASSETS ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= ADMIN_ASSETS ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= ADMIN_ASSETS ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?= ADMIN_ASSETS ?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- Custom File -->
<script src="<?= ADMIN_ASSETS ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- JQUERY validate -->
<script src="<?= ADMIN_ASSETS ?>plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= ADMIN_ASSETS ?>plugins/jquery-validation/additional-methods.min.js"></script>
<!-- daterangepicker -->
<script src="<?= ADMIN_ASSETS ?>plugins/moment/moment.min.js"></script>
<script src="<?= ADMIN_ASSETS ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- sweetalert2 -->
<script src="<?= ADMIN_ASSETS ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= ADMIN_ASSETS ?>plugins/toastr/toastr.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= ADMIN_ASSETS ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= ADMIN_ASSETS ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= ADMIN_ASSETS ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Sweet Alert -->
<script src="<?= ADMIN_ASSETS ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= ADMIN_ASSETS ?>dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= ADMIN_ASSETS ?>dist/js/demo.js"></script>
<?php if(isset($scripts)):?>
<?php foreach ($scripts as $script) : ?>
<script src="<?= asset($script) ?>"></script>
<?php endforeach; ?>
<?php endif; ?>
<script>
$(function () {
  bsCustomFileInput.init();
    //Bootstrap Duallistbox
});
</script>
<?php if (!empty(get_session('message-errors'))) : ?>
<script>
    $(function () {
      toastr.error('<?= get_session('message-errors') ?>')
    });
</script>
<?php remove_session('message-errors') ?>
<?php endif; ?>

<?php if (!empty(get_session('message'))) : ?>
<script>
    $(function () {
      toastr.success('<?= get_session('message') ?>')
    });
</script>
<?php remove_session('message') ?>
<?php endif; ?>
