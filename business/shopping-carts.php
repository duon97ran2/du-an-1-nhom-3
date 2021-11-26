<?php

require_once DIR_ROOT."/commons/mailer/mail.php";

function shopping_carts() {
    $user_id = auth_info()['user_id'] ?? '';
    $cart_sql = "SELECT 
            P.product_name, SP.*, V.product_variant_name
        FROM shopping_carts SP
        LEFT JOIN products P ON SP.product_id = P.product_id
        LEFT JOIN product_variants V ON V.product_variant_slug = SP.color
        WHERE user_id = $user_id AND is_buy = 0;";
    $cart_data = executeQuery($cart_sql, true);
    $cart_buy_sql = "SELECT 
            P.product_name, SP.*, V.product_variant_name
        FROM shopping_carts SP
        LEFT JOIN products P ON SP.product_id = P.product_id
        LEFT JOIN product_variants V ON V.product_variant_slug = SP.color
        WHERE user_id = $user_id AND is_buy = 1;";
    $cart_buy_data = executeQuery($cart_buy_sql, true);
    view_no_layout('shopping-carts', [
        'cart_data' => $cart_data,
        'cart_buy_data' => $cart_buy_data,
    ]);
}

function add_to_cart() {
    $errors = '';
    $success = '';
    $user_id = auth_info()['user_id'] ?? '';
    $product_id = input_post('product_id');
    $quantity = input_post('quantity');
    $color = input_post('color');
    $price = input_post('price');

    if (empty($user_id)) {
        $errors = 'Vui long dang nhap';
    } else if (empty($product_id)) {
        $errors = 'Vui long chon san pham';
    } else if (empty($quantity)) {
        $errors = 'Vui long nhap so luong';
    }
    $cart_sql = "SELECT * FROM shopping_carts WHERE user_id = $user_id AND product_id = $product_id AND color = '$color' AND is_buy = 0";
    $cart_data = executeQuery($cart_sql, false);

    $product_sql = "SELECT * FROM products WHERE product_id = $product_id";
    $product_data = executeQuery($product_sql, false);

    $variant_sql = "SELECT * FROM product_variants WHERE product_variant_slug = '$color'";
    $variant_data = executeQuery($variant_sql, false);

    if ($cart_data) {
        $count_quantity = $cart_data['quantity'] + $quantity;
        if ($color) {
            if ($count_quantity > $variant_data['product_variant_quantity']) {
                $quantity = $variant_data['product_variant_quantity'] - $cart_data['quantity'];
            }
        } else {
            if ($count_quantity > $product_data['product_quantity']) {
                $quantity = $product_data['product_quantity'] - $cart_data['quantity'];
            }
        }
        if ($quantity == 0) {
            $errors = 'Đã đạt giới hạn thêm';
        }

        if (empty($errors)) {
            $time_now = date("Y-m-d H:i:s");
            $cart_update_sql = "UPDATE shopping_carts 
                            SET 
                                quantity = quantity + $quantity,
                                price = $price,
                                total_price = total_price + ($price * $quantity),
                                updated_at = '$time_now'
                            WHERE 
                                user_id = $user_id 
                            AND 
                                product_id = $product_id 
                            AND 
                                color = '$color'";
            executeQuery($cart_update_sql);
            $success = 'Them thanh cong';
        }
    } else {
        if (empty($errors)  ) {
            if ($color) {
                if ($quantity > $variant_data['product_variant_quantity']) {
                    $quantity = $variant_data['product_variant_quantity'];
                }
            } else {
                if ($quantity > $product_data['product_quantity']) {
                    $quantity = $product_data['product_quantity'];
                }
            }
            $cart_insert_sql = "INSERT INTO shopping_carts 
                                (user_id, product_id, quantity, color, price, total_price) 
                            VALUES 
                                ('$user_id', '$product_id', '$quantity', '$color', '$price', '".($price * $quantity)."')";
            executeQuery($cart_insert_sql);
            $success = 'Them thanh cong';
        }
    }

    $response = [
        'success' => $success,
        'cart_total' => cart_total() ?? 0,
        'errors' => $errors
    ];

    echo json_encode($response);
}

function cart_update_handle() {
    $quantity = input_post('quantity');
    $cart_id = input_post('cart_id');
    $time_now = date("Y-m-d H:i:s");
    
    $cart_sql = "SELECT * FROM shopping_carts WHERE cart_id = $cart_id";
    $cart_data = executeQuery($cart_sql, false);

    if (!empty($cart_data['color'])) {
        $variant_sql = "SELECT * FROM product_variants WHERE product_variant_slug = '".$cart_data['color']."'";
        $variant_data = executeQuery($variant_sql, false);
        if ($quantity > $variant_data['product_variant_quantity']) {
            $quantity = $variant_data['product_variant_quantity'];
        }
    } else {
        $product_sql = "SELECT * FROM products WHERE product_id = ". $cart_data['product_id'];
        $product_data = executeQuery($product_sql, false);
        if ($quantity > $product_data['product_quantity']) {
            $quantity = $product_data['product_quantity'];
        }
    }

    $cart_update_sql = "UPDATE shopping_carts 
                    SET 
                        quantity =  $quantity,
                        total_price = price * $quantity,
                        updated_at = '$time_now'
                    WHERE 
                        cart_id = $cart_id";
    executeQuery($cart_update_sql);
    redirect('gio-hang');
}

function remove_item_cart() {
    $id = input_get('id');
    $sql = "DELETE FROM shopping_carts WHERE cart_id = $id";
    executeQuery($sql);
    redirect_back();
}


function checkout() {
    $auth_info = auth_info() ?? '';
    $user_id = $auth_info['user_id'] ?? '';
    $cart_sql = "SELECT * FROM shopping_carts WHERE is_buy = 0 AND user_id = $user_id AND quantity > 0";
    $carts = executeQuery($cart_sql, true);
    if (empty($carts)) {
        error_page();
    }
    $cart_total_price_sql = "SELECT sum(total_price) as total_price FROM shopping_carts WHERE is_buy = 0 AND user_id = ".$user_id." AND quantity > 0";
    $cart_total_price = executeQuery($cart_total_price_sql, false)['total_price'];
    view_no_layout('checkout', [
        'total_cart' => count($carts),
        'total_price' => $cart_total_price,
        'auth_info' => $auth_info,
        'voucher' => get_session('VOUCHER') ?? []
    ]);
}

function checkout_handle() {
    $errors = [];
    $auth_info = auth_info() ?? '';
    $user_id = $auth_info['user_id'] ?? '';
    $action = input_post('action');
    $name = input_post('name');
    $email = input_post('email');
    $phone = input_post('phone');
    $address = input_post('address');
    $payment_type = input_post('payment_type');
    $price = input_post('price');
    $time_now = date("Y-m-d H:i:s");
    $total_price = input_post('total_price');
    if ($action == 'voucher') {
        $voucher = strtoupper(input_post('voucher'));
        $voucher_sql = "SELECT * FROM vouchers WHERE voucher_code = '$voucher'";
        $voucher_result = executeQuery($voucher_sql, false);
        if ($voucher_result) {
            $user_voucher_sql = "SELECT * FROM user_vouchers WHERE voucher_id = " . $voucher_result['voucher_id'];
            $user_voucher_result = executeQuery($user_voucher_sql, true);
            $end_time = strtotime($voucher_result['end_time']);
            $time_now = strtotime(date("Y-m-d H:i:s"));
            if ($voucher_result['limit_number'] == 0 || $voucher_result['is_active'] == 0 || $end_time < $time_now) {
                $errors['voucher'] = "Mã $voucher đã hết hạn.";
                remove_session('VOUCHER');
            } else if (count($user_voucher_result) >= $voucher_result['limit_number']) {
                remove_session('VOUCHER');
                $errors['voucher'] = "Bạn đã hết lượt sử dụng mã $voucher";
            } else if ($price < $voucher_result['minimum_order_price']) {
                remove_session('VOUCHER');
                $errors['voucher'] = "Mã $voucher chỉ áp dụng với đơn hàng từ ". priceVND($voucher_result['minimum_order_price']);
            } else {
                set_session('VOUCHER', [
                    'id' => $voucher_result['voucher_id'],
                    'price' => $voucher_result['apply_price'],
                    'code' => $voucher
                ]);
                redirect('thanh-toan');
            }
        } else {
            if (empty($voucher)) {
                remove_session('VOUCHER');
                redirect('thanh-toan');
            } else {
                $errors['voucher'] = 'Mã '.$voucher.' không tồn tại';
            }
        }
    }
    if ($action == 'thanh-toan') {
        if (empty($address)) {
            $errors['address'] = 'Vui lòng điền địa chỉ';
        }
        if (empty($name)) {
            $errors['name'] = 'Vui lòng điền họ tên';
        }
        if (empty($email)) {
            $errors['email'] = 'Vui lòng điền địa chỉ email';
        }
        if (empty($phone)) {
            $errors['phone'] = 'Vui lòng điền số điện thoại';
        }

        if (empty($errors)) {
            $order_code = generatorOrderCode();

            $cart_sql = "SELECT 
                            P.product_name, P.product_price, SP.*, V.product_variant_name, V.product_variant_id
                        FROM shopping_carts SP
                        LEFT JOIN products P ON SP.product_id = P.product_id
                        LEFT JOIN product_variants V ON V.product_variant_slug = SP.color
                        WHERE is_buy = 0 AND user_id = $user_id AND quantity > 0;";
            $carts = executeQuery($cart_sql, true);
            
            $voucher_id_apply = get_session('VOUCHER')['id'] ?? '';
            if (!empty($voucher_id_apply)) {
                $voucher_apply_sql = "INSERT INTO user_vouchers (user_id, voucher_id) VALUES ($user_id, $voucher_id_apply)";
                executeQuery($voucher_apply_sql);
            }

            $order_sql = "INSERT INTO orders (order_code, order_total, payment_type ,user_id, address, phone, order_date) 
                            VALUES ('$order_code', $total_price, '$payment_type', $user_id, '$address', '$phone', '$time_now')";
            $order_id = insertExecuteQueryLastID($order_sql);

            foreach ($carts as $item) {
                $update_cart_sql = "UPDATE shopping_carts SET is_buy = 1 WHERE cart_id = ".$item['cart_id'];
                executeQuery($update_cart_sql);
                $insert_order_item_sql = "INSERT INTO order_items (order_id, product_id, price, total_price ,quantity, color) 
                            VALUES ($order_id, ".$item['product_id'].", ".$item['price'].", ".$item['total_price'].", ".$item['quantity'].", '".$item['color']."')";
                executeQuery($insert_order_item_sql);
                // $quantity_update = $item['quantity'];
                // $update_quantity_sql = '';
                // if (!empty($item['product_variant_id'])) {
                //     $update_quantity_sql = "UPDATE product_variants 
                //                                 SET product_variant_quantity = product_variant_quantity - $quantity_update 
                //                         WHERE product_variant_id = ".$item['product_variant_id'];
                // } else {
                //     $update_quantity_sql = "UPDATE products 
                //                                 SET product_quantity = product_quantity - $quantity_update 
                //                         WHERE product_id = ".$item['product_id'];
                // }
                // executeQuery($update_quantity_sql);
            }
            $content_mail = "<div style='max-width: 800px; padding: 15px; background-color: #f2f2f2;border: 1px solid #ddd'>
                    <span>Bạn vừa đặt hàng thành công tại <a href='".app_url()."' style='text-decoration: none;'>Poly-mobile</a>.</span>
                    <p>Họ tên người nhận: $name</p>
                    <p>Số điện thoại nhận: $phone</p>
                    <p>Địa chỉ nhận: $address</p>
                    <p>Mã đơn hàng: $order_code</p>
                    <table style='border: 1px solid #000;border-collapse: collapse; width: 100%;'>
                        <tr>
                            <th style='border: 1px solid #000; padding: 5px 10px'>Sản phẩm</th>
                            <th style='border: 1px solid #000; padding: 5px 10px'>Giá tiền</th>
                            <th style='border: 1px solid #000; padding: 5px 10px'>Số lượng</th>
                            <th style='border: 1px solid #000; padding: 5px 10px'>Tổng tiền</th>
                        </tr>";
            foreach ($carts as $item) {
                $content_mail .= "<tr>
                        <td style='border: 1px solid #000; padding: 5px 10px'>".$item['product_name'] . (empty($item['product_variant_name']) ? '' : ' - '.$item['product_variant_name']) ."</td>
                        <td style='border: 1px solid #000; padding: 5px 10px'>".priceVND($item['price'])."</td>
                        <td style='border: 1px solid #000; padding: 5px 10px'>".$item['quantity']."</td>
                        <td style='border: 1px solid #000; padding: 5px 10px'>".priceVND($item['total_price'])."</td>
                    </tr>";
            }
            $content_mail .= "</table>
                    <p><strong>Tổng tiền: ".priceVND($total_price)."</strong></p>
                    <br>
                    <span>Cảm ơn bạn đã ủng hộ shop <i>.!.</i></span>
                    <p>
                        Thân.<br>
                        <strong>PolyMobile</strong>
                    </p>
            </div>";
            sendEmailOrder($email, "Thông tin đơn hàng $order_code", $content_mail);
            remove_session('VOUCHER');
            echo "Đặt hàng thành công. Chi tiết đơn hàng đã được gửi vào email bạn cung cấp.";
        }
    }

    if ($errors) {
        set_session('message-errors', $errors);
        redirect('thanh-toan');
    }
}

function checkOrderCode($code) {
    $sql = "SELECT * FROM orders";
    $result = executeQuery($sql, true);
    $keyExists = false;
    foreach ($result as $item) {
        if ($item['order_code'] == $code) {
            $keyExists = true;
            break;
        } else {
            $keyExists = false;
        }
    }
    return $keyExists;
}

function generatorOrderCode() {
    $code_length = 8;
    $str = '1234567890';
    $code = substr(str_shuffle($str), 0, $code_length);
    $check = checkOrderCode($code);
    while ($check == true) {
        $code = substr(str_shuffle($str), 0, $code_length);
        $check = checkOrderCode($code);
    }
    return 'PM'.$code;
}