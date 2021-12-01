<?php 
function save_wishlist(){
  $success='';
  $errors='';
  $product_id=$_POST['product_id'];
  $user_id=auth_info()['user_id'];
  if(empty($product_id)){
    $errors='Thêm sản phẩm vào danh sách yêu thích thất bại';
  }
  $sql = "Select * from wishlists where product_id =$product_id and user_id =$user_id";
  $product = executeQuery($sql,false);
  if($product){
    $errors='Sản phẩm đã tồn tại trong danh sách yêu thích';
  }  
  if(empty($errors)){
    $success='Thêm sản phẩm vào danh sách yêu thích thành công';
    $sql = "insert into wishlists (product_id,user_id) values($product_id,$user_id) ";
    executeQuery($sql);
  }
  $response=[
    'errors'=>$errors,
    'success'=>$success
  ];
  echo json_encode($response);

}
?>