<?php
function gift_index(){
    $sql = "select * from gifts";
    $gifts = executeQuery($sql);

    admin_render('gifts/index.php', [
        'dsGifts' => $gifts,
    ]);
}
function gift_remove(){
    $gift_id = $_GET['gift_id'];
    $sql = "delete from gifts where gift_id = $gift_id";
    executeQuery($sql);
    header("location: " . ADMIN_URL . 'qua-tang');
}
function gift_create(){
    admin_render("gifts/add-form.php");
}
function gift_save_add(){
    $gift_name = $_POST['gift_name'];
    $start_time = date("Y-m-d H:i:s", strtotime($_POST['start_time']));
    $end_time = date("Y-m-d H:i:s", strtotime($_POST['end_time']));
$sql = "insert into gifts (gift_name, start_time, end_time)
values
('$gift_name', '$start_time', '$end_time')";
executeQuery($sql);
header("location: " . ADMIN_URL . 'qua-tang');
}
function gift_edit_form(){
    $gift_id = $_GET['gift_id'];
    $sql = "select * from gifts where gift_id = $gift_id";
    $gifts = executeQuery($sql, false);
    admin_render('gifts/edit-form.php', [
        'gifts' => $gifts
    ]);
}
function gift_save_edit(){
    $gift_id = $_GET['gift_id'];
    $sql = "select * from gifts where gift_id = $gift_id";
    $gift_name = $_POST['gift_name'];
    $start_time = date("Y-m-d H:i:s", strtotime($_POST['start_time']));
    $end_time = date("Y-m-d H:i:s", strtotime($_POST['end_time']));
$sql = "update gifts
set
        gift_name = '$gift_name',
        start_time = '$start_time',
        end_time = '$end_time'
where gift_id = $gift_id";
executeQuery($sql);
header("location: " . ADMIN_URL . 'qua-tang');
}
?>