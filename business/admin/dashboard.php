<?php

function dashboard_info(){
    is_admin();
    echo "Thông tin trang quản trị. <a href='".admin_url('dang-xuat')."'>Đăng xuất</a><br>";
    dd(auth_info());
}

?>