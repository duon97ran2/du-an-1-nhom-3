<?php 

function option_page() {
    $sql = "SELECT * FROM options";
    $option = executeQuery($sql, false);
    admin_render("options/form.php", [
        'page_title' => 'Cấu hình trang',
        'option' => $option
    ]);
}

function option_handle() {
    $option_id = input_post('option_id');
    $app_name = input_post('app_name');
    $hotline_1 = input_post('hotline_1');
    $hotline_2 = input_post('hotline_2');
    $hotline_3 = input_post('hotline_3');
    $address = input_post('address');
    $email = input_post('email');
    $logo = input_file('logo');
    $favicon = input_file('favicon');
    $license = input_post('license');
    $is_maintenance = input_post('is_maintenance');
    $option_sql = "SELECT * FROM options WHERE option_id = '$option_id'";
    $option_data = executeQuery($option_sql, false);
    if (empty($option_data)) {
        $logo_img = $logo['size'] > 0 ? upload_image($logo, 'options') : '';
        $favicon_img = $favicon['size'] > 0 ? upload_image($favicon, 'options') : '';

        $sql = "INSERT INTO options 
                    (app_name, hotline_1, hotline_2, hotline_3, address, email, logo, favicon, license, is_maintenance) 
                VALUES 
                    ('$app_name', '$hotline_1', '$hotline_2', '$hotline_3', '$address', '$email', '$logo_img', '$favicon_img', '$license', '$is_maintenance')";
    } else {
        $logo_img = $logo['size'] > 0 ? upload_image($logo, 'options') : $option_data['logo'];
        $favicon_img = $favicon['size'] > 0 ? upload_image($favicon, 'options') : $option_data['favicon'];
        $sql = "UPDATE options 
                SET 
                    app_name = '$app_name', hotline_1 = '$hotline_1', hotline_2 = '$hotline_2', hotline_3 = '$hotline_3', 
                    address = '$address', email = '$email', logo = '$logo_img', favicon = '$favicon_img', license = '$license', is_maintenance = '$is_maintenance'
                WHERE option_id = '$option_id'";
    }
    executeQuery($sql);
    set_session('message', 'Cập nhật thành công');
    redirect('cp-admin/cau-hinh-trang');
}