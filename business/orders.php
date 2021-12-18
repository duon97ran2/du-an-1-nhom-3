<?php
  function search_index(){
    $order_code = $_POST['order_code']??'';
    $user_name = $_POST['user_name']??'';
    $order_date = input_post('order_date');
    $where = [];
    $sql = "SELECT O.*, U.name FROM orders O
            LEFT JOIN users U ON U.user_id = O.user_id
            WHERE (O.order_code = '$order_code' or O.phone='$order_code')";
    if (isset($_POST['status'])) {
      $status_get = (int)input_post('status');
      $where[] = "O.order_status = $status_get";
    }
    if(!empty($user_name)){
      $where[] = "U.name = '$user_name'";
    }
    if (!empty($order_date)) {
      $where[] = "DATE(O.order_date) = '$order_date'";
    }
    if(isset($_POST['remove'])){
      $where='';
      unset($_POST['status']);
      unset($_POST['user_name']);
    }
    if($where){
      $sql .= " AND " . implode(' AND ', $where);
    }
    $order = executeQuery($sql);
    if(isset($_POST['btn-search'])||isset($_POST['filter'])){
      if(empty($order)){
        set_session('message-errors','Đơn hàng bạn tìm không tồn tại');
      }
    }
    client_render('page/order-search',[
        'order'=>$order,
        'order_code'=>$order_code,
    ]
  );
  }
?>