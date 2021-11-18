<?php
session_start();
require_once './commons/app_config.php';
require_once './commons/helpers.php';
require_once './dao/system_dao.php';
$url = isset($_GET['url']) ? $_GET['url'] : "/";
switch ($url) {
    case '/':
        require_once './business/homepage.php';
        index();
        break;
    case 'cp-admin/dashboard':
        require_once './business/admin/dashboard.php';
        dashboard_info();
        break;
    case 'cp-admin/dang-nhap':
        require_once "./business/auth/login.php";
        admin_login_page();
        break;
    case 'cp-admin/dang-nhap/kiem-tra':
        require_once "./business/auth/login.php";
        admin_login_handle();
        break;
    case 'cp-admin/dang-xuat':
        require_once "./business/auth/login.php";
        admin_logout();
        break;
    case 'cp-admin/quen-mat-khau':
        require_once "./business/auth/reset.php";
        admin_forgot_password_page();
        break;
    case 'cp-admin/quen-mat-khau/kiem-tra':
        require_once "./business/auth/reset.php";
        admin_forgot_password_handle();
        break;
    case 'cp-admin/quen-mat-khau/cap-nhat-mat-khau':
        require_once "./business/auth/reset.php";
        admin_reset_password_page();
        break;
    case 'cp-admin/quen-mat-khau/cap-nhat-mat-khau/kiem-tra':
        require_once "./business/auth/reset.php";
        admin_reset_password_handle();
        break;
    case 'cp-admin/tai-khoan':
        require_once "./business/admin/account.php";
        account_index();
        break;
    case 'cp-admin/tai-khoan/tao-moi':
        require_once "./business/admin/account.php";
        account_create();
        break;
    case 'cp-admin/tai-khoan/luu-tao-moi':
        require_once "./business/admin/account.php";
        account_save_add();
        break;
    case 'cp-admin/tai-khoan/sua':
        require_once "./business/admin/account.php";
        account_edit_form();
        break;
    case 'cp-admin/tai-khoan/luu-sua':
        require_once "./business/admin/account.php";
        account_save_edit();
        break;
    case 'cp-admin/tai-khoan/xoa':
        require_once "./business/admin/account.php";
        account_remove();
        break;
    default:
        error_page();
        break;
}
