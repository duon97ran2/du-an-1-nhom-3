<?php
function account_index(){
    $sql = "select * from users";
    $users = executeQuery($sql);

    admin_render('account/index.php', 
        [
            'page_title' => 'Danh sách tài khoản',
            'dsTaiKhoan' => $users,
        ], 
        [
            'customize/js/account/list.js'
        ]
    );
}

function account_remove(){
    // lấy id từ đường dẫn
    $id = $_GET['id'];
    $sql = "delete from users where user_id = $id";
    executeQuery($sql);
    header("location: " . ADMIN_URL . 'tai-khoan');
}
function account_create(){
    admin_render("account/add-form.php",[
        'page_title' => 'Thêm tài khoản'
    ]);
}
function account_save_add(){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $is_active = $_POST['is_active'];
    $is_verify = 1;
    $role = $_POST['role'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $name_arr = nameSeparation($name);
    $first_name = $name_arr['first_name'];
    $last_name = $name_arr['last_name'];
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $file = $_FILES['avatar'];
    $type_arr = ['jpg', 'png', 'jpeg', 'jfif', 'webp', 'gif'];
    $avatar_type = pathinfo($file['name'], PATHINFO_EXTENSION);
    $user = find_user_by_email($email);
    $avatar='';
    $errors=[];
    if($file['size']==0){
        $errors['avatar']='Vui lòng tải ảnh lên';
    }
    else if($file['size']>5000000){
        $errors['avatar']='Vui lòng chọn ảnh nhỏ hơn 5mb';
    }
    else if(!in_array($avatar_type, $type_arr)){
        $errors['avatar']='Vui lòng chọn đúng loại ảnh';
    }
    if(empty($errors['avatar'])){
        $filename = uniqid() . '-' . $file['name'];
        move_uploaded_file($file['tmp_name'], './public/uploads/avatars/' . $filename);
        $avatar = "uploads/avatars/" . $filename;
    }
    if(empty($name)){
        $errors['name']='Vui lòng điền thông tin';
    }
    if (empty($email)) {
        $errors['email'] = 'Vui lòng điền thông tin';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email sai định dạng';
    } else if (!empty($user)) {
        $errors['email'] = 'Email đã tồn tại';
    }
    if (empty($password)) {
        $errors['password'] = 'Vui lòng điền thông tin';
    } else if (strlen($password) < 6) {
        $errors['password'] = 'Mật khẩu tối thiểu 6 ký tự';
    }
    if(empty($role)){
        $errors['role']='Vui lòng điền thông tin';
    }
    if(empty($gender)){
        $errors['gender']='Vui lòng điền thông tin';
    }
    if(empty($address)){
        $errors['address']='Vui lòng điền thông tin';
    }
    if(empty($phone)){
        $errors['phone']='Vui lòng điền thông tin';
    }
    // tạo ra câu sql insert tài khoản mới
    $sql = "insert into users 
                (name,first_name,last_name,email, password, avatar,gender,is_active,is_verify,role,address,phone) 
            values 
                ('$name','$first_name','$last_name', '$email', '$passwordHash', '$avatar','$gender','$is_active','$is_verify','$role','$address','$phone')";
    // Thực thi câu sql với db
    $_SESSION['errors']=$errors;
    if(empty($errors)){
    executeQuery($sql);
    $_SESSION['errors']['message']='Thêm tài khoản thành công';
    header("location: " . ADMIN_URL . 'tai-khoan');}
    else{
        $_SESSION['errors']['message']='Thêm tài khoản thất bại';
        redirect_back();
    }
}
function account_edit_form(){
    $id = $_GET['id'];
    $sql = "select * from users where user_id = $id";
    $user = executeQuery($sql, false);
    admin_render('account/edit-form.php', [
        'user' => $user,
        'page_title' => 'Sửa '.$user['name']
    ]);
}

function account_save_edit(){
    // lấy ra thông tin cũ của dữ liệu vừa submit lên
    $id = $_GET['id'];
    $sql = "select * from users where user_id = $id";
    $oldData = executeQuery($sql, false);
    // nhận dữ liệu từ form gửi lên
    $name = $_POST['name'];
    // lưu ảnh vào thư mục public/uploads
    $file = $_FILES['avatar'];
    $gender = $_POST['gender'];
    $is_active = $_POST['is_active'];
    $is_verify = 1;
    $role = $_POST['role'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $name_arr = nameSeparation($name);
    $first_name = $name_arr['first_name'];
    $last_name = $name_arr['last_name'];
    $avatar = $oldData['avatar'];
    $type_arr = ['jpg', 'png', 'jpeg', 'jfif', 'webp', 'gif'];
    $avatar_type = pathinfo($file['name'], PATHINFO_EXTENSION);
    $errors=[];
    if($file['size']>5000000){
        $errors['avatar']='Vui lòng chọn ảnh nhỏ hơn 5mb';
    }
    else if(!in_array($avatar_type, $type_arr)&&($file['size']>0)){
        $errors['avatar']='Vui lòng chọn đúng loại ảnh';
    }
    if(empty($errors['avatar'])){
        $filename = uniqid() . '-' . $file['name'];
        move_uploaded_file($file['tmp_name'], './public/uploads/avatars/' . $filename);
        $avatar = "uploads/avatars/" . $filename;
    }
    if(empty($name)){
        $errors['name']='Vui lòng điền thông tin';
    }
    if(empty($address)){
        $errors['address']='Vui lòng điền thông tin';
    }
    if(empty($phone)){
        $errors['phone']='Vui lòng điền thông tin';
    }
    // Lưu ảnh
    // tạo ra câu sql insert tài khoản mới
    $sql = "update users 
            set
                name = '$name',  
                avatar = '$avatar',
                gender='$gender',
                first_name='$first_name',
                last_name='$last_name',
                is_active='$is_active',
                is_verify='$is_verify',
                role='$role',
                address='$address',
                phone='$phone'
            where user_id = $id";
    // Thực thi câu sql với db
    $_SESSION['errors']=$errors;
    if(empty($errors)){
        executeQuery($sql);
        $_SESSION['errors']['message']='Cập nhật tài khoản thành công';
        header("location: " . ADMIN_URL . 'tai-khoan');
    }
    else{
        $_SESSION['errors']['message']='Cập nhật tài khoản thất bại';
        redirect_back();
    }
    
}
