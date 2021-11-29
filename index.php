<?php

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
    case 'cp-admin/danh-muc':
        require_once "./business/admin/categories.php";
        categories_index();
        break;
    case 'cp-admin/danh-muc/tao-moi':
        require_once "./business/admin/categories.php";
        categories_create();
        break;
    case 'cp-admin/danh-muc/luu-tao-moi':
        require_once "./business/admin/categories.php";
        categories_save_add();
        break;
    case 'cp-admin/danh-muc/sua':
        require_once "./business/admin/categories.php";
        categories_edit_form();
        break;
    case 'cp-admin/danh-muc/luu-sua':
        require_once "./business/admin/categories.php";
        categories_save_edit();
        break;
    case 'cp-admin/danh-muc/xoa':
        require_once "./business/admin/categories.php";
        categories_remove();
        break;
    case 'cp-admin/qua-tang':
        require_once "./business/admin/gifts.php";
        gift_index();
        break;
    case 'cp-admin/qua-tang/xoa':
        require_once "./business/admin/gifts.php";
        gift_remove();
        break;
    case 'cp-admin/qua-tang/tao-moi':
        require_once "./business/admin/gifts.php";
        gift_create();
        break;
    case 'cp-admin/qua-tang/luu-tao-moi':
        require_once "./business/admin/gifts.php";
        gift_save_add();
        break;
    case 'cp-admin/qua-tang/sua':
        require_once "./business/admin/gifts.php";
        gift_edit_form();
        break;
    case 'cp-admin/qua-tang/luu-sua':
        require_once "./business/admin/gifts.php";
        gift_save_edit();
        break;
    case 'cp-admin/phieu-giam-gia':
        require_once "./business/admin/vouchers.php";
        voucher_index();  
        break;
    case 'cp-admin/phieu-giam-gia/xoa':
        require_once "./business/admin/vouchers.php";
        voucher_remove();  
        break;
    case 'cp-admin/phieu-giam-gia/tao-moi':
        require_once "./business/admin/vouchers.php";
        voucher_create();
        break;    
    case 'cp-admin/phieu-giam-gia/luu-tao-moi':
        require_once "./business/admin/vouchers.php";
        voucher_save_add();
        break;
    case 'cp-admin/phieu-giam-gia/sua':
        require_once "./business/admin/vouchers.php";
        voucher_edit_form();
        break;
    case 'cp-admin/phieu-giam-gia/luu-sua':
        require_once "./business/admin/vouchers.php";
        voucher_save_edit();
        break;  
    default:
        echo "Đường dẫn bạn đang truy cập chưa được định nghĩa";
        break;
}
