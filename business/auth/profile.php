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
  // nhận dữ liệu từ form gửi lên
  $name = $_POST['name'];
  // lưu ảnh vào thư mục public/uploads
  $file = $_FILES['avatar'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $name_arr = nameSeparation($name);
  $first_name = $name_arr['first_name'];
  $last_name = $name_arr['last_name'];
  $phone = $_POST['phone'];
  // Lưu ảnh
  

  // tạo ra câu sql insert tài khoản mới
  $sql = "update users 
            set
                name = '$name', 
                first_name='$first_name',
                last_name='$last_name',
                gender='$gender',
                address='$address',
                phone='$phone'
            where user_id = $id";
  // Thực thi câu sql với db
  if ($file['size'] > 0) {
    $avatar = "uploads/".upload_image($file, 'avatars');
    $sql ="update users set avatar='$avatar' where user_id=$id";
  }
  executeQuery($sql);
  redirect_back();
}
