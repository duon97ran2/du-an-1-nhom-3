<?php
function categories_index(){
    $sql = "select c1.*, c2.category_name as parent_name 
                from categories c1 
            left join categories c2 on c2.category_id = c1.parent_id"; //truy vấn
    $categories = executeQuery($sql, true);
    admin_render('categories/index.php', [
        'dsCategories' => $categories, 
    ]);
} 

function categories_remove(){
    //lấy id từ đường dẫn
    $category_id = $_GET['category_id'];
    $sql = "delete from categories where category_id = $category_id";
    executeQuery($sql);
    set_session('message', 'Xoá thành công');
    header("location: " . ADMIN_URL . 'danh-muc'); //
}
function categories_create(){
    $sql = "select * from categories where is_parent = 1"; //truy vấn
    $categories = executeQuery($sql, true);
    admin_render("categories/add-form.php", [
        'categories' => $categories
    ], [
        'customize/js/commons.js',
    ]);
}
//thêm 
function categories_save_add(){
    $category_name = $_POST['category_name'];
    $category_slug = $_POST['category_slug'];
    $is_parent = $_POST['is_parent'];
    $parent_id = $_POST['parent_id'];
    $menu_url = $_POST['menu_url'];
    $category_index = $_POST['category_index'];
    $is_menu = $_POST['is_menu'];
    $file = $_FILES['category_image'];
    $fileName = "";
    if($file['size']>0){
        $fileName = uniqid() . '-' . $file['name'];
        move_uploaded_file($file['tmp_name'],'./public/uploads/' .$fileName);
        $fileName = 'uploads/' . $fileName;
    }
    $sql = "insert into categories (category_name, category_slug, is_parent, parent_id, category_image, is_menu, menu_url, category_index)
    values
    ('$category_name','$category_slug', $is_parent, $parent_id, '$fileName', $is_menu, '$menu_url', $category_index)";

    executeQuery($sql);
    set_session('message', 'Thêm thành công');
    header("location: " .ADMIN_URL . 'danh-muc');
}
function categories_edit_form(){
    $category_id = $_GET['category_id'];
    $sql = "select * from categories where category_id = $category_id";
    $categories = executeQuery($sql, false);
    $cate_parent_sql = "select * from categories where is_parent = 1"; //truy vấn
    $cate_parents = executeQuery($cate_parent_sql, true);
 
    admin_render('categories/edit-form.php', [
        'categories' => $categories,
        'cate_parents' => $cate_parents
    ], [
        'customize/js/commons.js',
    ]);
}
function categories_save_edit(){
    $category_id = $_GET['category_id'];
    $sql = "select * from categories where category_id = $category_id";
    $oldData = executeQuery($sql, false); 
    $category_name = $_POST['category_name'];
    $category_slug = $_POST['category_slug'];
    $is_parent = $_POST['is_parent'];
    $parent_id = $_POST['parent_id'];
    $menu_url = $_POST['menu_url'];
    $category_index = $_POST['category_index'];
    $is_menu = $_POST['is_menu'];
    $file = $_FILES['category_image'];

    $category_image = $oldData['category_image'];
    if($file['size'] > 0){
        $fileName = uniqid() . '-' . $file['name'];
        move_uploaded_file($file['tmp_name'],'./public/uploads/' .$fileName);
        $category_image = 'uploads/' . $fileName;
    }
    $sql = "update categories
        set
            category_name = '$category_name',
            category_slug = '$category_slug',
            is_parent = $is_parent,
            menu_url = '$menu_url',
            parent_id = $parent_id,
            is_menu = $is_menu,
            category_image = '$category_image',
            category_index = $category_index
    where category_id = $category_id";
    executeQuery($sql);
    set_session('message', 'Cập nhật thành công');
    header("location: " . ADMIN_URL . 'danh-muc');
}

?>