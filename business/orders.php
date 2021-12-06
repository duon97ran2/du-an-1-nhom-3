<?php
  function search_index(){
    $order_code = $_POST['order_code']??'';
    $sql = "SELECT O.*, U.name, P.product_name FROM orders O
            LEFT JOIN order_items OI ON OI.order_id = O.order_id
            LEFT JOIN users U ON U.user_id = O.user_id
            LEFT JOIN products P ON P.product_id = OI.product_id
            WHERE O.order_code = '$order_code'";
    $order = executeQuery($sql);
    if(isset($_POST['btn-search'])){
      if(empty($order)){
        set_session('message-errors','Đơn hàng bạn nhập không tồn tại');
      }
    }
    client_render('page/order-search',[
        'order'=>$order,
    ]);
  }
?>