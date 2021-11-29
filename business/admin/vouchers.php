<?php
function voucher_index(){
    $sql = "select * from vouchers";
    $vouchers = executeQuery($sql);
    admin_render('vouchers/index.php', [
        'dsVouchers' => $vouchers,
    ]);
}
function voucher_remove(){
    $voucher_id =$_GET['voucher_id'];
    $sql = "delete from vouchers where voucher_id= $voucher_id";
    executeQuery($sql);
    header("location: " . ADMIN_URL . 'phieu-giam-gia');
}
function voucher_create(){
    admin_render("vouchers/add-form.php");
}
function voucher_save_add(){
    $voucher_code = $_POST['voucher_code'];
    $limit_number = $_POST['limit_number'];
    $end_time = date("Y-m-d H:i:s", strtotime($_POST['end_time']));
    $description = $_POST['description'];
    $apply_price = $_POST['apply_price'];
    $minimum_order_price = $_POST['minimum_order_price'];
$sql = "insert into vouchers (voucher_code, limit_number, end_time, description, apply_price, minimum_order_price)
values
('$voucher_code', $limit_number, '$end_time','$description', $apply_price, $minimum_order_price)";
executeQuery($sql);
header("location: " . ADMIN_URL . 'phieu-giam-gia');
}
?>