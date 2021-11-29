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
    // Brand By Trần Khánh Linh
    case 'cp-admin/thuong-hieu':
        require_once "./business/admin/brand.php";
        brand_index();
        break;
    case 'cp-admin/thuong-hieu/tao-moi':
        require_once "./business/admin/brand.php";
        brand_create();
        break;
    case 'cp-admin/thuong-hieu/luu-tao-moi':
        require_once "./business/admin/brand.php";
        brand_save_add();
        break;
    case 'cp-admin/thuong-hieu/sua':
        require_once "./business/admin/brand.php";
        brand_edit_form();
        break;
    case 'cp-admin/thuong-hieu/luu-sua':
        require_once "./business/admin/brand.php";
        brand_save_edit();
        break;
    case 'cp-admin/thuong-hieu/xoa':
        require_once "./business/admin/brand.php";
        brand_remove();
        break;
    // Wishlist By Trần Khánh Linh
    case 'danh-sach-yeu-thich':
        is_maintenance();
        require_once './business/wishlist.php';
        shopping_wishlist();
        break;
    case 'danh-sach-yeu-thich/them-san-pham':
        require_once './business/wishlist.php';
        add_to_wishlist();
        break;
    case 'danh-sach-yeu-thich/xoa-san-pham':
        require_once './business/wishlist.php';
        remove_item_wishlist();
        break;
    default:
        echo "Đường dẫn bạn đang truy cập chưa được định nghĩa";
        break;
        
}
