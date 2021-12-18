<?php
function profile_index()
{
  $id = auth_info()['user_id'];
  $sql = "select * from users where user_id=" . $id;
  $user = executeQuery($sql, false);
  client_render('page/profile', [
    'user' => $user,
  ], [
    'customize/js/upload.js'
  ]);
}
function profile_save()
{
  $id = $_GET['id'];
  // nhận dữ liệu từ form gửi lên
  $sql = "select * from users where user_id = $id";
  $oldData = executeQuery($sql, false);
  $name = $_POST['name'];
  // lưu ảnh vào thư mục public/uploads
  $file = $_FILES['avatar'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $name_arr = nameSeparation($name);
  $first_name = $name_arr['first_name'];
  $last_name = $name_arr['last_name'];
  $phone = $_POST['phone'];
  $avatar = $oldData['avatar'];
  $type_arr = ['jpg', 'png', 'jpeg', 'jfif', 'webp', 'gif'];
  $avatar_type = pathinfo($file['name'], PATHINFO_EXTENSION);
  $errors = [];
  if ($file['size'] > 5000000) {
    $errors['avatar'] = 'Vui lòng chọn ảnh nhỏ hơn 5mb';
  } else if (!in_array($avatar_type, $type_arr) && ($file['size'] > 0)) {
    $errors['avatar'] = 'Vui lòng chọn đúng loại ảnh';
  }
  if (empty($name)) {
    $errors['name'] = 'Vui lòng điền thông tin';
  }
  if (empty($address)) {
    $errors['address'] = 'Vui lòng điền thông tin';
  }
  if (empty($phone)) {
    $errors['phone'] = 'Vui lòng điền thông tin';
  }
  // tạo ra câu sql insert tài khoản mới
  $_SESSION['errors'] = $errors;
  if (empty($errors)) {
    if ($file['size'] > 0) {
      $filename = uniqid() . '-' . $file['name'];
      move_uploaded_file($file['tmp_name'], './public/uploads/avatars/' . $filename);
      $avatar = "uploads/avatars/" . $filename;
    }
    $sql = "update users 
            set
                name = '$name', 
                first_name='$first_name',
                last_name='$last_name',
                gender='$gender',
                address='$address',
                phone='$phone',
                avatar='$avatar'
            where user_id = $id";
    // Thực thi câu sql với db}
    executeQuery($sql);
    $_SESSION['message'] = 'Cập nhật tài khoản thành công';
    redirect_back();
  } else {
    $_SESSION['message-errors'] = 'Cập nhật tài khoản thất bại';
    redirect_back();
  }
}
function user_order_index()
{
  $id = auth_info()['user_id'];
  $where=[];
  $sql = "SELECT * 
          FROM orders 
          WHERE user_id = $id";
  if (isset($_GET['status'])) {
    $status_get = (int)input_get('status');
    $where[] = "order_status = $status_get";
  }
  $order_code = input_get('order_code');
  if (!empty($order_code)) {
    $where[] = "order_code = '$order_code'";
  }
  if ($where) {
    $sql .= " AND ".implode(' AND ', $where);
  }
  $orders = executeQuery($sql);
  if (empty($orders)) {
    set_session('message-errors', 'Đơn hàng không tồn tại');
  }
  client_render('page/user-orders', [
    'orders' => $orders,
  ],[
    'customize/js/order/script.js',
  ]);
}
function change_password()
{
  if (isset($_POST['change_btn'])) {
    $errors=[];
    if (empty($_POST['new_password']) || empty($_POST['confirm_password']) || empty($_POST['old_password'])) {
      set_session('message-errors', 'Vui lòng điền đầy đủ thông tin');
    } else {
      if(!password_verify($_POST['old_password'],auth_info()['password'])){
        $errors['old_password']='Mật khẩu cũ không chính xác';
      }
      if(strlen($_POST['new_password']) < 6){
        $errors['new_password']='Mật khẩu mới cần trên 6 ký tự';
      }
      if($_POST['new_password']==$_POST['old_password']){
        $errors['new_password']='Bạn đang nhập mật khẩu cũ';
      }
      if($_POST['new_password']!=($_POST['confirm_password'])){
        $errors['confirm_password']='Mật khẩu xác nhận chưa đúng';
      }
      if(empty($errors)){
        $new_password=password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        $id=auth_info()['user_id'];
        set_session('message', 'Đổi mật khẩu thành công');
        $sql="UPDATE users set password='$new_password' where user_id=$id";
        executeQuery($sql);
        redirect('thong-tin-ca-nhan');
      }else{
        set_session('errors',$errors);
        set_session('message-errors', 'Đổi mật khẩu thật bại');
      }
    }
  }
  client_render('page/password-change', []);
}
function user_order_items(){
  $order_id = $_GET['order_id'];
  $order_sql = "select * from orders where order_id = $order_id";
  $order = executeQuery($order_sql, false);
  $sql = "SELECT OI.*,P.product_name,P.product_image
            FROM order_items OI 
            LEFT JOIN products P on OI.product_id = P.product_id  
            WHERE OI.order_id = $order_id";
  $order_items = executeQuery($sql);
  client_render('page/order-items', [
    'order_items' => $order_items,
    'order_id' => $order_id,
    'order' => $order,
  ], [
    'customize/js/order/script.js'
  ]);
}
function add_item()
{
  $cate_sql = "SELECT * FROM categories WHERE parent_id IS NOT NULL";
  $brand_sql = "SELECT * FROM brands";
  $categories = executeQuery($cate_sql, true);
  $brands = executeQuery($brand_sql, true);
  $where = [];
  $variants_sql = "SELECT * FROM product_variants";
  $variants = executeQuery($variants_sql);
  $product_sql = "SELECT * FROM products P
        LEFT JOIN categories C ON C.category_id = P.category_id
        LEFT JOIN brands B ON B.brand_id = P.brand_id
        WHERE P.product_status=1 AND P.is_delete=0
        ";
  $id = input_get('id');
  $brand_get = input_get('brand');
  $cate_get = input_get('category');
  if (!empty($brand_get)) {
    $where[] = "P.brand_id = $brand_get";
  }
  if (!empty($cate_get)) {
    $where[] = "P.category_id = $cate_get";
  }
  if ($where) {
    $product_sql .= " AND " . implode(' AND ', $where);
  }
  $products = executeQuery($product_sql);
  client_render('page/add-item', [
    'products' => $products,
    'categories' => $categories,
    'brands' => $brands,
    'variants' => $variants,
    'id' => $id,
  ]);
}