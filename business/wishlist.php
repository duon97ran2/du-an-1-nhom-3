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
function wishlist_index(){
  $id = auth_info()['user_id'];
  $sql="SELECT W.*,P.* FROM wishlists W
        LEFT JOIN products P on W.product_id = P.product_id
        WHERE W.user_id = $id ";
  $list=executeQuery($sql);
  client_render('page/wishlist',[
    'list'=>$list,
  ]);
}
function wishlist_delete(){
  $id=$_GET['id'];
  $sql = "DELETE FROM wishlists WHERE wishlist_id = $id";
  executeQuery($sql);
  set_session('message','Sản phẩm đã được xóa khỏi danh sách');
  redirect_back();
}
?>