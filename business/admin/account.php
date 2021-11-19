<?php
function account_index(){
    
    $sql = "select * from users";
    $users = executeQuery($sql);

    admin_render('account/index.php', [
        'dsTaiKhoan' => $users,
    ]);
}

function account_remove(){
    // lấy id từ đường dẫn
    $id = $_GET['id'];
    $sql = "delete from users where id = $id";
    executeQuery($sql);
    header("location: " . ADMIN_URL . 'tai-khoan');
}
function account_create(){
    admin_render("account/add-form.php");
}
function account_save_add(){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];
    $role_id = $_POST['role_id'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
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
                (name, email, password, avatar,gender,status,role_id,address,phone) 
            values 
                ('$name', '$email', '$passwordHash', '$avatar',$gender,$status,$role_id,'$address','$phone')";
    // Thực thi câu sql với db
    executeQuery($sql);
    header("location: " . ADMIN_URL . 'tai-khoan');
}
function account_edit_form(){
    $id = $_GET['id'];
    $sql = "select * from users where id = $id";
    $user = executeQuery($sql, false);
    admin_render('account/edit-form.php', [
        'user' => $user
    ]);
}

function account_save_edit(){
    // lấy ra thông tin cũ của dữ liệu vừa submit lên
    $id = $_GET['id'];
    $sql = "select * from users where id = $id";
    $oldData = executeQuery($sql, false);
    // nhận dữ liệu từ form gửi lên
    $name = $_POST['name'];
    $email = $_POST['email'];
    // lưu ảnh vào thư mục public/uploads
    $file = $_FILES['avatar'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];
    $role_id = $_POST['role_id'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
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
                status='$status',
                role_id='$role_id',
                address='$address',
                phone='$phone'
            where id = $id";
    // Thực thi câu sql với db
    executeQuery($sql);

    
    header("location: " . ADMIN_URL . 'tai-khoan');
}
?>
