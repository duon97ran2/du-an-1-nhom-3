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
  // lưu ảnh vào thư mục public/uploads
  $file = $_FILES['avatar'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $avatar = $oldData['avatar'];
  // Lưu ảnh
  if ($file['size'] > 0) {
    $avatar = upload_image($file,'avatars');
  }

  // tạo ra câu sql insert tài khoản mới
  $sql = "update users 
            set
                name = '$name', 
                avatar = '$avatar',
                gender='$gender',
                address='$address',
                phone='$phone'
            where user_id = $id";
  // Thực thi câu sql với db
  executeQuery($sql);
  redirect_back();
}
