<?php

function index(){

    $name = 'poly';
    $age = 12;
    include_once './views/homepage/trang-chu.php';
    if (!empty(auth_info())) {
        echo "<a href='".app_url('dang-xuat')."'>Đăng xuất</a><br>";
        dd(auth_info());
    } else {
        echo "<a href='".app_url('dang-nhap')."'>Đăng nhập</a><br>";
    }
}

?>