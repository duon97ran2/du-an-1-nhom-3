<?php
function banner_list()
{
    $sql = "SELECT * FROM banners";
    $banners = executeQuery($sql, true);
    admin_render('banner/banner_list.php', [
        'banners' => $banners
    ], [
        'customize/js/banner&comment/script.js'
    ]);
}

function banner_add()
{
    admin_render('banner/add.php', [
        'page_title' => 'them banner',

    ]);
}

function banner_add_handle()
{
    // $errors = [];
    $banner_name = input_post('banner_name');
    $banner_url = input_post('banner_url');
    $banner_index = input_post('banner_index');
    $banner_target = input_post('banner_target');
    $banner_position = input_post('banner_position');
    $is_active = input_post('is_active');
    $banner_image = input_file('banner_image');

    if ($banner_image['size'] == 0) {
        $errors['banner_image'] = 'Vui lòng chọn hình ảnh';
    }
    if (empty($errors)) {
        $image_upload = upload_image($banner_image, 'banner');
        $sql = "INSERT INTO banners(banner_name,banner_url,banner_image,banner_index,banner_target,banner_position,is_active) 
                     VALUES('$banner_name','$banner_url','$image_upload','$banner_index','$banner_target','$banner_position','$is_active')";
        executeQuery($sql);
        set_session('message', 'them banner thành công');
        redirect('cp-admin/banner');
    }
}
function remove_banner()
{
    $banner_id = $_GET['banner_id'];
    $sql = "DELETE FROM banners WHERE banner_id = $banner_id";
    executeQuery($sql);
    set_session('message', 'xoa banner thành công');
    redirect('cp-admin/banner');
}

function banner_update()
{
    $banner_id = $_GET['banner_id'];
    $sql = "SELECT * from banners where banner_id = $banner_id";

    $banner = executeQuery($sql, true);
    // var_dump($banner);die;
    admin_render('banner/update.php', [
        'page_title' => 'update banner',
        'banner' => $banner,
    ]);
}

function banner_update_handle()
{
    // $banner_id = $_GET['banner_id'];
    // $sql = "SELECT * FROM banners WHERE banner_id=$banner_id";
    // $old_banner = executeQuery($sql, true);

    // $banner_name = input_post('banner_name');
    // $banner_url = input_post('banner_url');
    // $banner_index = input_post('banner_index');
    // $banner_target = input_post('banner_target');
    // $banner_position = input_post('banner_position');
    // $is_active = input_post('is_active');
    // $banner_image = input_file('banner_image');
  
    //     $image_upload = upload_image($banner_image, 'banner');
    //     $b_sql = "UPDATE banners 
    //             SET banner_name='$banner_name',
    //                     banner_url='$banner_url',
    //                     banner_image='$image_upload',
    //                     banner_index='$banner_index',
    //                     banner_target='$banner_target',
    //                     banner_position='$banner_position',
    //                     is_active='$is_active'
    //             WHERE banner_id=$banner_id";
    //     executeQuery($b_sql);
    //     set_session('message', 'update banner thành công');
    //     redirect('cp-admin/banner');
    
}
