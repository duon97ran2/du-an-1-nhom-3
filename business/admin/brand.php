<?php
function brand_index(){
    $sql = "select * from brands";
    $brands = executeQuery($sql);

    admin_render('brand/index.php', [
        'dsThuongHieu' => $brands,
    ],
    [
        'customize/js/brand/list.js' //Thêm để hiển thị string alert
    ]);
}

function brand_remove(){
    // lấy id từ đường dẫn
    $brand_id = $_GET['brand_id'];
    $sql = "select * from products where brand_id = $brand_id";
    $brand_product  = executeQuery($sql);
   if($brand_product){
       $_SESSION['message-errors'] = 'San pham cua thuong hiệu này vẫn đang tồn tại.Hãy xóa sản phẩm trước';
       redirect_back();
   }else{
    $sql = "delete from brands where brand_id = $brand_id";
    executeQuery($sql);
    $_SESSION['message']='Xóa thương hiệu thành công';
    header("location: " . ADMIN_URL . 'thuong-hieu');
   }
   
    
    

}

function brand_create(){
    admin_render("brand/add-form.php");
    
}
function brand_save_add(){
    $brand_name = $_POST['brand_name'];
    $file = $_FILES['brand_image'];
    $brand_image='';
    if($file['size'] > 0){
        $filename = uniqid() . '-' . $file['name'];
        move_uploaded_file($file['tmp_name'], './public/uploads/brands/' . $filename);
        $brand_image = "uploads/brands/" . $filename;
    }
    $errors = [];
        if (empty($brand_name)) {
            $errors['brand_name'] = 'Vui lòng nhập tên thương hiệu';
    }
        if (empty($brand_image)) {
            $errors['brand_image'] = 'Vui lòng upload ảnh';
    }

    $_SESSION['errors'] = $errors;
    // tạo ra câu sql insert tài khoản mới
    $sql = "insert into brands
                (brand_name, brand_image) 
            values 
                ('$brand_name', '$brand_image')";
    // Thực thi câu sql với db
    if ($errors) {
        $_SESSION['message-errors'] = 'Thêm thất bại';
        redirect_back();
    }else{
        $_SESSION['message'] = 'Thêm thành công';
        executeQuery($sql);
        header("location: " . ADMIN_URL . 'thuong-hieu');
    }
    
    
}
function brand_edit_form(){
    $brand_id = $_GET['brand_id'];
    $sql = "select * from brands where brand_id = $brand_id";
    $brand = executeQuery($sql, false);
    admin_render('brand/edit-form.php', [
        'brand' => $brand
    ]);
}

function brand_save_edit(){
    // lấy ra thông tin cũ của dữ liệu vừa submit lên
    $brand_id = $_GET['brand_id'];
    $sql = "select * from brands where brand_id = $brand_id";
    $oldData = executeQuery($sql, false);
    // nhận dữ liệu từ form gửi lên
    $brand_name = $_POST['brand_name'];
    // lưu ảnh vào thư mục public/uploads
    $file = $_FILES['brand_image'];
    $brand_image = $oldData['brand_image'];
    // Lưu ảnh
    if($file['size'] > 0){
        $filename = uniqid() . '-' . $file['name'];
        move_uploaded_file($file['tmp_name'], './public/uploads/brands/' . $filename);
        $brand_image = "uploads/brands/" . $filename;
    }
    $errors = [];
        if (empty($brand_name)) {
            $errors['brand_name'] = 'Vui lòng nhập tên thương hiệu';
    }
        if (empty($brand_image)) {
            $errors['brand_image'] = 'Vui lòng upload ảnh';
    }

    $_SESSION['errors'] = $errors;
    // tạo ra câu sql insert tài khoản mới
    $sql = "update brands 
            set
                brand_name = '$brand_name', 
                brand_image = '$brand_image'
            where brand_id = $brand_id";
    // Thực thi câu sql với db
    if ($errors) {
        $_SESSION['message-errors'] = 'Cập nhật thương hiệu thất bại';
        redirect_back();
    }else{
        $_SESSION['message'] = 'Cập nhật thương hiệu thành công';
        executeQuery($sql);
        header("location: " . ADMIN_URL . 'thuong-hieu');
    }
    
    
}
?>