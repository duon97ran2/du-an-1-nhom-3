<?php
session_start();
require_once './commons/app_config.php';
require_once './dao/system_dao.php';
require_once './commons/helpers.php';
$url = isset($_GET['url']) ? $_GET['url'] : "/";
switch ($url) {
    case 'cp-admin/tai-khoan':
        is_admin();
        require_once "./business/admin/account.php";
        account_index();
        break;
    case 'cp-admin/tai-khoan/tao-moi':
        is_admin();
        require_once "./business/admin/account.php";
        account_create();
        break;
    case 'cp-admin/tai-khoan/luu-tao-moi':
        is_admin();
        require_once "./business/admin/account.php";
        account_save_add();
        break;
    case 'cp-admin/tai-khoan/sua':
        is_admin();
        require_once "./business/admin/account.php";
        account_edit_form();
        break;
    case 'cp-admin/tai-khoan/luu-sua':
        is_admin();
        require_once "./business/admin/account.php";
        account_save_edit();
        break;
    case 'cp-admin/tai-khoan/xoa':
        is_admin();
        require_once "./business/admin/account.php";
        account_remove();
        break;
    case '/':
        is_maintenance();
        require_once './business/homepage.php';
        index();
        break;
    case 'danh-muc':
        is_maintenance();
        require_once './business/category.php';
        category_page();
        break;
    case 'danh-muc-xem-them':
        is_maintenance();
        require_once './business/category.php';
        load_more();
        break;
    case 'thong-tin-san-pham':
        is_maintenance();
        require_once './business/product.php';
        require_once './business/homepage.php';
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
    case 'thanh-toan':
        is_maintenance();
        require_once './business/shopping-carts.php';
        checkout();
        break;
    case 'thanh-toan/kiem-tra-voucher':
        require_once './business/shopping-carts.php';
        checkVoucher();
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
    case 'thong-tin-ca-nhan':
        require_once "./business/auth/profile.php";
        profile_index();
        break;
    case 'thong-tin-ca-nhan/don-hang':
        require_once "./business/auth/profile.php";
        user_order_index();
        break;
    case 'thong-tin-ca-nhan/luu-sua':
        require_once "./business/auth/profile.php";
        profile_save();
        break;
    case 'thong-tin-ca-nhan/doi-mat-khau':
        require_once "./business/auth/profile.php";
        change_password();
        break;
    case 'cp-admin/dashboard':
        is_admin();
        require_once './business/admin/dashboard.php';
        dashboard_info();
        break;
    case 'cp-admin/dang-nhap':
        is_admin();
        is_login_for_auth_page();
        require_once "./business/auth/login.php";
        admin_login_page();
        break;
    case 'cp-admin/dang-nhap/kiem-tra':
        is_admin();
        require_once "./business/auth/login.php";
        admin_login_handle();
        break;
    case 'cp-admin/dang-xuat':
        is_admin();
        require_once "./business/auth/login.php";
        logout(true);
        break;
    case 'cp-admin/quen-mat-khau':
        is_admin();
        is_login_for_auth_page();
        require_once "./business/auth/reset.php";
        admin_forgot_password_page();
        break;
    case 'cp-admin/quen-mat-khau/kiem-tra':
        is_admin();
        require_once "./business/auth/reset.php";
        admin_forgot_password_handle();
        break;
    case 'cp-admin/quen-mat-khau/cap-nhat-mat-khau':
        is_admin();
        require_once "./business/auth/reset.php";
        admin_reset_password_page();
        break;
    case 'cp-admin/quen-mat-khau/cap-nhat-mat-khau/kiem-tra':
        is_admin();
        require_once "./business/auth/reset.php";
        admin_reset_password_handle();
        break;
    case 'cp-admin/cau-hinh-trang':
        is_admin();
        require_once "./business/admin/options.php";
        option_page();
        break;
    case 'cp-admin/cau-hinh-trang/kiem-tra':
        is_admin();
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
        is_admin();
        require_once "./business/admin/product.php";
        product_create_handle();
        break;
    case 'cp-admin/san-pham/cap-nhat':
        is_admin();
        require_once "./business/admin/product.php";
        product_update();
        break;
    case 'cp-admin/san-pham/luu-cap-nhat':
        is_admin();
        require_once "./business/admin/product.php";
        product_update_handle();
        break;
    case 'cp-admin/san-pham/cap-nhat-trang-thai':
        is_admin();
        require_once "./business/admin/product.php";
        product_change_status_handle();
        break;
    case 'cp-admin/san-pham/cap-nhat/xoa-bien-the':
        is_admin();
        require_once "./business/admin/product.php";
        product_remove_variant_handle();
        break;
    case 'cp-admin/san-pham/kiem-tra-slug':
        is_admin();
        require_once "./business/admin/product.php";
        find_product_by_slug_json();
        break;
    case 'cp-admin/san-pham/xoa-san-pham':
        is_admin();
        require_once "./business/admin/product.php";
        product_remove_product_handle();
        break;
        // Brand By Tr???n Kh??nh Linh
    case 'cp-admin/thuong-hieu':
        is_admin();
        require_once "./business/admin/brand.php";
        brand_index();
        break;
    case 'cp-admin/thuong-hieu/tao-moi':
        is_admin();
        require_once "./business/admin/brand.php";
        brand_create();
        break;
    case 'cp-admin/thuong-hieu/luu-tao-moi':
        is_admin();
        require_once "./business/admin/brand.php";
        brand_save_add();
        break;
    case 'cp-admin/thuong-hieu/sua':
        is_admin();
        require_once "./business/admin/brand.php";
        brand_edit_form();
        break;
    case 'cp-admin/thuong-hieu/luu-sua':
        is_admin();
        require_once "./business/admin/brand.php";
        brand_save_edit();
        break;
    case 'cp-admin/thuong-hieu/xoa':
        is_admin();
        require_once "./business/admin/brand.php";
        brand_remove();
        break;
        // Wishlist By Tr???n Kh??nh Linh
    case 'danh-sach-yeu-thich':
        is_maintenance();
        require_once './business/wishlist.php';
        break;
    case 'danh-sach-yeu-thich/them-san-pham':
        require_once './business/wishlist.php';

        break;
    case 'danh-sach-yeu-thich/xoa-san-pham':
        require_once './business/wishlist.php';
        break;
    case 'cp-admin/banner':
        is_admin();
        require_once "./business/admin/banner.php";
        banner_list();
        break;
    case 'cp-admin/banner/them-moi':
        is_admin();
        require_once "./business/admin/banner.php";
        banner_add();
        break;
    case 'cp-admin/banner/luu-them-moi':
        is_admin();
        require_once "./business/admin/banner.php";
        banner_add_handle();
        break;
    case 'cp-admin/banner/cap-nhat':
        is_admin();
        require_once "./business/admin/banner.php";
        banner_update();
        break;
    case 'cp-admin/banner/luu-cap-nhat':
        is_admin();
        require_once "./business/admin/banner.php";
        banner_update_handle();
        break;
    case 'cp-admin/banner/xoa':
        is_admin();
        require_once "./business/admin/banner.php";
        remove_banner();
        break;
    case 'cp-admin/danh-muc':
        is_admin();
        require_once "./business/admin/categories.php";
        categories_index();
        break;
    case 'cp-admin/danh-muc/tao-moi':
        is_admin();
        require_once "./business/admin/categories.php";
        categories_create();
        break;
    case 'cp-admin/danh-muc/luu-tao-moi':
        is_admin();
        require_once "./business/admin/categories.php";
        categories_save_add();
        break;
    case 'cp-admin/danh-muc/sua':
        is_admin();
        require_once "./business/admin/categories.php";
        categories_edit_form();
        break;
    case 'cp-admin/danh-muc/luu-sua':
        is_admin();
        require_once "./business/admin/categories.php";
        categories_save_edit();
        break;
    case 'cp-admin/danh-muc/xoa':
        is_admin();
        require_once "./business/admin/categories.php";
        categories_remove();
        break;
    case 'cp-admin/qua-tang':
        is_admin();
        require_once "./business/admin/gifts.php";
        gift_index();
        break;
    case 'cp-admin/qua-tang/xoa':
        is_admin();
        require_once "./business/admin/gifts.php";
        gift_remove();
        break;
    case 'cp-admin/qua-tang/tao-moi':
        is_admin();
        require_once "./business/admin/gifts.php";
        gift_create();
        break;
    case 'cp-admin/qua-tang/luu-tao-moi':
        is_admin();
        require_once "./business/admin/gifts.php";
        gift_save_add();
        break;
    case 'cp-admin/qua-tang/sua':
        is_admin();
        require_once "./business/admin/gifts.php";
        gift_edit_form();
        break;
    case 'cp-admin/qua-tang/luu-sua':
        is_admin();
        require_once "./business/admin/gifts.php";
        gift_save_edit();
        break;
    case 'cp-admin/phieu-giam-gia':
        is_admin();
        require_once "./business/admin/vouchers.php";
        voucher_index();
        break;
    case 'cp-admin/phieu-giam-gia/xoa':
        is_admin();
        require_once "./business/admin/vouchers.php";
        voucher_remove();
        break;
    case 'cp-admin/phieu-giam-gia/tao-moi':
        is_admin();
        require_once "./business/admin/vouchers.php";
        voucher_create();
        break;
    case 'cp-admin/phieu-giam-gia/luu-tao-moi':
        is_admin();
        require_once "./business/admin/vouchers.php";
        voucher_save_add();
        break;
    case 'cp-admin/phieu-giam-gia/sua':
        is_admin();
        require_once "./business/admin/vouchers.php";
        voucher_edit_form();
        break;
    case 'cp-admin/phieu-giam-gia/luu-sua':
        is_admin();
        require_once "./business/admin/vouchers.php";
        voucher_save_edit();
        break;
    case 'luu-yeu-thich':
        require_once "./business/wishlist.php";
        save_wishlist();
        break;
    case 'cp-admin/comment':
        is_admin();
        require_once "./business/admin/comment.php";
        comment_page_admin();
        // get_all_cmt();
        break;
    case 'cp-admin/comment/chi-tiet':
        is_admin();
        require_once "./business/admin/comment.php";
        detail_cmt_admin();
        break;
    case 'cp-admin/comment/xoa':
        is_admin();
        require_once "./business/admin/comment.php";
        remove_comment_admin();
        break;
    case 'cp-admin/comment/tra-loi':
        is_admin();
        require_once "./business/admin/comment.php";
        reply_comment();
        break;
    case 'cp-admin/don-hang':
        is_admin();
        require_once "./business/admin/orders.php";
        order_index();
        break;
    case 'cp-admin/don-hang/chi-tiet':
        is_admin();
        require_once "./business/admin/orders.php";
        items_index();
        break;
    case 'cp-admin/don-hang/cap-nhat':
        is_admin();
        require_once "./business/admin/orders.php";
        order_update();
        break;
    case 'cp-admin/don-hang/xoa':
        is_admin();
        require_once "./business/admin/orders.php";
        delete_order();
        break;
    case 'cp-admin/don-hang/xoa-chi-tiet':
        is_admin();
        require_once "./business/admin/orders.php";
        delete_item();
        break;
    case 'cp-admin/don-hang/luu-chi-tiet':
        is_admin();
        require_once "./business/admin/orders.php";
        save_item();
        break;
    case 'cp-admin/don-hang/sua-chi-tiet':
        is_admin();
        require_once "./business/admin/orders.php";
        item_update();
        break;
    case 'cp-admin/don-hang/them-chi-tiet':
        is_admin();
        require_once "./business/admin/orders.php";
        add_item();
        break;
    case 'tim-kiem-don-hang':
        is_maintenance();
        require_once "./business/orders.php";
        search_index();
        break;
    case 'save-comment':
        require_once "./business/admin/comment.php";
        insertCmt();
        break;
    case 'yeu-thich':
        is_maintenance();
        require_once "./business/wishlist.php";
        wishlist_index();
        break;
    case 'xoa-yeu-thich':
        require_once "./business/wishlist.php";
        wishlist_delete();
    case 'cp-admin/bai-viet':
        is_admin();
        require_once "./business/admin/blog.php";
        blog_index();
        break;
    case 'cp-admin/bai-viet/chi-tiet':
        is_admin();
        require_once "./business/admin/blog.php";
        blog_detail();
        break;
    case 'cp-admin/bai-viet/xoa':
        is_admin();
        require_once "./business/admin/blog.php";
        deleteBlog();
        break;
    case 'cp-admin/bai-viet/them-moi':
        is_admin();
        require_once "./business/admin/blog.php";
        add_blog();
        break;
    case 'cp-admin/bai-viet/luu-them-moi':
        is_admin();
        require_once "./business/admin/blog.php";
        save_add_blog();
        break;
    case 'cp-admin/bai-viet/luu-sua':
        is_admin();
        require_once "./business/admin/blog.php";
        update_handle();
        break;
    case 'tin-tuc':
        is_maintenance();
        require_once "./business/admin/blog.php";
        get_all_blog();
        break;
    case 'tim-kiem':
        is_maintenance();
        require_once './business/homepage.php';
        search();
        break;
    case 'tim-kiem/xu-ly':
        is_maintenance();
        require_once './business/homepage.php';
        search_ajax();
        break;
    case 'bai-viet':
        is_maintenance();
        require_once "./business/admin/blog.php";
        get_blog_by_slug();
        break;
    default:
        error_page();
        break;
}
