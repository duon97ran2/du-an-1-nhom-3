<?php
function profile_index()
{
  $_SESSION['AUTH_ID'] = 2;
  $sql = "select * from users where user_id=" . $_SESSION['AUTH_ID'];
  $user = executeQuery($sql, false);
  view_no_layout('auth/client/profile', $user);
}
function profile_save()
{
  $id = $_GET['id'];
  $sql = "select * from users where user_id = $id";
  $oldData = executeQuery($sql, false);
  // nhận dữ liệu từ form gửi lên
  $name = $_POST['name'];
  $email = $_POST['email'];
  // lưu ảnh vào thư mục public/uploads
  $file = $_FILES['avatar'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $avatar = $oldData['avatar'];
  // Lưu ảnh
  if ($file['size'] > 0) {
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
                address='$address',
                phone='$phone'
            where user_id = $id";
  // Thực thi câu sql với db
  executeQuery($sql);
  redirect_back();
}
