<?php

require_once DIR_ROOT."/commons/mailer/mail.php";

function order_index()
{
  $where = [];
  $sql = "SELECT O.*,U.name 
        FROM orders O 
        LEFT JOIN users U on O.user_id = U.user_id";
  if (isset($_GET['status'])) {
    $status_get = (int)input_get('status');
    $where[] = "O.order_status = $status_get";
  }
  $order_code = input_get('order_code');
  if (!empty($order_code)) {
    $where[] = "O.order_code = '$order_code'";
  }
  if ($where) {
    $sql .= " WHERE " . implode(' AND ', $where);
  }
  $orders = executeQuery($sql);
  if (empty($orders)) {
    set_session('message-errors', 'Đơn hàng không tồn tại');
  }
  admin_render('orders/index.php', [
    'orders' => $orders,
  ], [
    'customize/js/order/script.js'
  ]);
}
function items_index()
{
  $order_id = $_GET['order_id'];
  $order_code = $_GET['order_code'];
  $total=0;
  $sql = "SELECT OI.*,P.product_name
            FROM order_items OI 
            LEFT JOIN products P on OI.product_id = P.product_id  
            WHERE OI.order_id = $order_id";
  $order_items = executeQuery($sql);
  admin_render('orders/order_items.php', [
    'order_items' => $order_items,
    'order_code' => $order_code,
    'total'=>$total,
  ], [
    'customize/js/order/script.js'
  ]);
}
function order_update()
{
  $order_id = (int)$_GET['order_id'];
  $order_status = (int)$_GET['order_status'];
  $sql = "SELECT O.*,U.name,U.email 
        FROM orders O 
        LEFT JOIN users U on O.user_id = U.user_id
        WHERE O.order_id=$order_id
        ";
  $order = executeQuery($sql,false);
  $name = $order['name'];
  $email = $order['email'];
  $order_code = $order['order_code'];
  $sql_update = "UPDATE orders set order_status = $order_status, order_confirm_date = NOW() where order_id = $order_id ";
  if ($order_status == 1) {
    $mail_content = "Xin chào " . $name . "!.<br><br>Đơn hàng $order_code tại POLY-MOBILE đã được cửa hàng xác nhận. Chúng tôi sẽ giao hàng cho bạn trong thời gian sớm nhất có thể. Bạn hãy chuẩn bị tiền thanh toán và chờ điện thoại giao hàng của shipper nhé.";
    $mail_subject = '[POLY-MOBILE] Xác nhận đơn hàng';
    $web_btn = 'Truy cập trang web';
    $web_url = app_url('/');
  }
  if ($order_status == 2) {
    $mail_content = "Xin chào " . $name . "!.<br><br>Đơn hàng $order_code tại POLY-MOBILE đã được hoàn thành. Cảm ơn bạn đã mua hàng tại website của chúng tôi. Hy vọng bạn thấy hài lòng về chất lượng dịch vụ của POLY-MOBILE, nếu được xin vui lòng để lại đánh giá về sản phẩm của chúng tôi nhé.";
    $mail_subject = '[POLY-MOBILE] Hoàn thành đơn hàng';
    $web_btn = 'Đánh giá sản phẩm';
    $web_url = app_url('/');
  }
  if ($order_status == 3) {
    $mail_content = "Xin chào " . $name . "!.<br><br>Rất tiếc đơn hàng $order_code tại POLY-MOBILE đã bị hủy. Vì một vài lý do chúng tôi không thể giao đơn hàng này đến cho bạn được. Chúng tôi vô cùng xin lỗi bạn vì sự bất tiện này. Xin vui lòng liên hệ liên hệ với chúng tôi để biết thêm chi tiết.";
    $mail_subject = '[POLY-MOBILE] Hủy đơn hàng';
    $web_btn = 'Liên hệ ngay';
    $web_url = app_url('/');
  }
  sendEmail($email,$mail_subject,$mail_content,$web_btn,$web_url);
  set_session('message','Cập nhật trạng thái thành công, một email thông báo sẽ được gửi đến cho khách hàng');
  executeQuery($sql_update);
  redirect_back();
}
function delete_order(){
  $id = input_get('order_id');
  $sql = "DELETE FROM orders WHERE order_id = $id";
  executeQuery($sql);
  set_session('message','Xóa đơn thành công');
  redirect_back();
}
