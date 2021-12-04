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
    $avatar='';
    if($file['size'] > 0){
        $filename = uniqid() . '-' . $file['name'];
        move_uploaded_file($file['tmp_name'], './public/uploads/avatars/' . $filename);
        $avatar = "uploads/avatars/" . $filename;
    }

    // tạo ra câu sql insert tài khoản mới
    $sql = "insert into users 
                (name,first_name,last_name,email, password, avatar,gender,is_active,is_verify,role,address,phone) 
            values 
                ('$name','$first_name','$last_name', '$email', '$passwordHash', '$avatar','$gender','$is_active','$is_verify','$role','$address','$phone')";
    // Thực thi câu sql với db
    executeQuery($sql);
    header("location: " . ADMIN_URL . 'tai-khoan');
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
// chỗ xử lí login đâu

function account_save_edit(){
    // lấy ra thông tin cũ của dữ liệu vừa submit lên
    $id = $_GET['id'];
    $sql = "select * from users where user_id = $id";
    $oldData = executeQuery($sql, false);
    // nhận dữ liệu từ form gửi lên
    $name = $_POST['name'];
    $email = $_POST['email'];
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
    // Lưu ảnh
    if($file['size'] > 0){
        $filename = uniqid() . '-' . $file['name'];
        move_uploaded_file($file['tmp_name'], './public/uploads/avatars/' . $filename);
        $avatar = "uploads/avatars/" . $filename;
    }

    // tạo ra câu sql insert tài khoản mới
    $sql = "update users 
            set
                name = '$name', 
                email = '$email', 
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
    executeQuery($sql);
    header("location: " . ADMIN_URL . 'tai-khoan');
}
?>
