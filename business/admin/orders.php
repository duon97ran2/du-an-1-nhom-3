<?php

require_once DIR_ROOT . "/commons/mailer/mail.php";

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
  $order_sql = "select * from orders where order_id = $order_id";
  $order = executeQuery($order_sql, false);
  $sql = "SELECT OI.*,P.product_name
            FROM order_items OI 
            LEFT JOIN products P on OI.product_id = P.product_id  
            WHERE OI.order_id = $order_id";
  $order_items = executeQuery($sql);
  admin_render('orders/order_items.php', [
    'order_items' => $order_items,
    'order_id' => $order_id,
    'order' => $order,
  ], [
    'customize/js/order/script.js'
  ]);
}
function get_item_by_id($id)
{
  $sql = "select * from order_items where id = $id";
  return executeQuery($sql, false);
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
  $order = executeQuery($sql, false);
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
  sendEmail($email, $mail_subject, $mail_content, $web_btn, $web_url);
  set_session('message', 'Cập nhật trạng thái thành công, một email thông báo sẽ được gửi đến cho khách hàng');
  executeQuery($sql_update);
  redirect_back();
}
function delete_order()
{
  $id = input_get('order_id');
  $sql = "DELETE FROM orders WHERE order_id = $id";
  executeQuery($sql);
  set_session('message', 'Xóa đơn thành công');
  redirect_back();
}
function delete_item()
{
  $id = input_get('id');
  $item = get_item_by_id($id);
  $item_price_total = $item['total_price'];
  $order_id = $item['order_id'];
  $sql_delete = "DELETE FROM order_items WHERE id = $id";
  executeQuery($sql_delete);
  $sql_update = "UPDATE orders set  order_total = order_total - $item_price_total WHERE order_id=$order_id";
  executeQuery($sql_update);
  set_session('message', 'Sản phẩm đã được xóa khỏi đơn hàng');
  redirect_back();
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
  admin_render('orders/add_item.php', [
    'products' => $products,
    'categories' => $categories,
    'brands' => $brands,
    'variants' => $variants,
    'id' => $id,
  ]);
}
function save_item()
{
  $id = input_post('order_id');
  $product_id = input_post('product_id');
  $color = input_post('color');
  $quantity = input_post('quantity');
  $product_price = input_post('product_price');
  $total = $product_price * $quantity;
  $add_sql = "insert into order_items(order_id,product_id,price,quantity,color,total_price) values($id,$product_id,$product_price,$quantity,'$color',$total)";
  executeQuery($add_sql);
  $sql_update = "UPDATE orders set  order_total = order_total + $total WHERE order_id=$id";
  set_session('message', 'Thêm sản phẩm vào đơn hàng thành công');
  executeQuery($sql_update);
  header('Location:' . admin_url('don-hang/chi-tiet?order_id=' . $id));
}
function item_update()
{
  $id = input_post('id');
  $item = get_item_by_id($id);
  $quantity = input_post('quantity');
  $total_price = $item['price'] * $quantity;
  $order_id = $item['order_id'];
  $item_sql = "UPDATE order_items set quantity=$quantity,total_price=$total_price where id = $id";
  $increase = ($quantity - $item['quantity']) * $item['price'];
  $order_update = "UPDATE orders set order_total= order_total+$increase where order_id =$order_id";
  executeQuery($item_sql);
  executeQuery($order_update);
  redirect_back();
}
