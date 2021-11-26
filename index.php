<?php
session_start();
require_once './commons/app_config.php';
require_once './dao/system_dao.php';
require_once './commons/helpers.php';
$url = isset($_GET['url']) ? $_GET['url'] : "/";
switch ($url) {
    case '/':
        is_maintenance();
        require_once './business/homepage.php';
        index();
        break;
    case 'thong-tin-san-pham':
        is_maintenance();
        require_once './business/product.php';
        product_details();
        break;
    case 'gio-hang':
        is_maintenance();
        require_once './business/shopping-carts.php';
        shopping_carts();
        break;
    case 'gio-hang/them-san-pham':
        require_once './business/shopping-carts.php';
        add_to_cart();
        break;
    case 'gio-hang/cap-nhat':
        require_once './business/shopping-carts.php';
        cart_update_handle();
        break;
    case 'gio-hang/xoa-san-pham':
        require_once './business/shopping-carts.php';
        remove_item_cart();
        break;
    case 'gio-hang/mua-lai':
        require_once './business/shopping-carts.php';
        rebuild();
        break;
    case 'thanh-toan':
        is_maintenance();
        require_once './business/shopping-carts.php';
        checkout();
        break;
    case 'thanh-toan/kiem-tra':
        is_maintenance();
        require_once './business/shopping-carts.php';
        checkout_handle();
        break;
    case 'dang-ky':
        is_maintenance();
        is_login_for_auth_page();
        require_once "./business/auth/register.php";
        client_register_page();
        break;
    case 'dang-ky/kiem-tra':
        require_once "./business/auth/register.php";
        client_register_handle();
        break;
    case 'dang-ky/xac-nhan-tai-khoan':
        is_maintenance();
        require_once "./business/auth/register.php";
        client_verify_hanle();
        break;
    case 'dang-nhap':
        is_maintenance();
        is_login_for_auth_page();
        require_once "./business/auth/login.php";
        client_login_page();
        break;
    case 'dang-nhap/kiem-tra':
        require_once "./business/auth/login.php";
        client_login_handle();
        break;
    case 'dang-xuat':
        require_once "./business/auth/login.php";
        logout();
        break;
    case 'quen-mat-khau':
        is_maintenance();
        is_login_for_auth_page();
        require_once "./business/auth/reset.php";
        client_forgot_password_page();
        break;
    case 'quen-mat-khau/kiem-tra':
        require_once "./business/auth/reset.php";
        client_forgot_password_handle();
        break;
    case 'quen-mat-khau/cap-nhat-mat-khau':
        require_once "./business/auth/reset.php";
        client_reset_password_page();
        break;
    case 'quen-mat-khau/cap-nhat-mat-khau/kiem-tra':
        require_once "./business/auth/reset.php";
        client_reset_password_handle();
        break;
    case 'cp-admin/dashboard':
        is_admin();
        require_once './business/admin/dashboard.php';
        dashboard_info();
        break;
    case 'cp-admin/dang-nhap':
        is_login_for_auth_page();
        require_once "./business/auth/login.php";
        admin_login_page();
        break;
    case 'cp-admin/dang-nhap/kiem-tra':
        require_once "./business/auth/login.php";
        admin_login_handle();
        break;
    case 'cp-admin/dang-xuat':
        require_once "./business/auth/login.php";
        logout(true);
        break;
    case 'cp-admin/quen-mat-khau':
        is_login_for_auth_page();
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
    case 'cp-admin/cau-hinh-trang':
        is_admin();
        require_once "./business/admin/options.php";
        option_page();
        break;
    case 'cp-admin/cau-hinh-trang/kiem-tra':
        require_once "./business/admin/options.php";
        option_handle();
        break;
    case 'cp-admin/san-pham':
        is_admin();
        require_once "./business/admin/product.php";
        product_page();
        break;
    case 'cp-admin/san-pham/them-moi':
        is_admin();
        require_once "./business/admin/product.php";
        product_create();
        break;
    case 'cp-admin/san-pham/luu-them-moi':
        require_once "./business/admin/product.php";
        product_create_handle();
        break;
    case 'cp-admin/san-pham/cap-nhat':
        is_admin();
        require_once "./business/admin/product.php";
        product_update();
        break;
    case 'cp-admin/san-pham/luu-cap-nhat':
        require_once "./business/admin/product.php";
        product_update_handle();
        break;
    case 'cp-admin/san-pham/cap-nhat-trang-thai':
        require_once "./business/admin/product.php";
        product_change_status_handle();
        break;
    case 'cp-admin/san-pham/cap-nhat/xoa-bien-the':
        require_once "./business/admin/product.php";
        product_remove_variant_handle();
        break;
    case 'cp-admin/san-pham/kiem-tra-slug':
        require_once "./business/admin/product.php";
        find_product_by_slug_json();
        break;
    case 'cp-admin/san-pham/xoa-san-pham':
        require_once "./business/admin/product.php";
        product_remove_product_handle();
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
    case 'thong-tin-ca-nhan':
        require_once "./business/auth/profile.php";
        profile_index();
        break;
    case 'thong-tin-ca-nhan/luu-sua':
        require_once "./business/auth/profile.php";
        profile_save();
        echo 'page';
        break;
    default:
        error_page();
        break;
}
