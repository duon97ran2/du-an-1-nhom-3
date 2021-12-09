<?php

require_once DIR_ROOT."/commons/mailer/mail.php";

function shopping_carts() {
    $user_id = auth_info()['user_id'] ?? '';
    $cart_sql = "SELECT 
            P.product_name, P.product_image, SP.*, V.product_variant_name, V.product_variant_id, V.product_variant_image
        FROM shopping_carts SP
        LEFT JOIN products P ON SP.product_id = P.product_id
        LEFT JOIN product_variants V ON V.product_variant_slug = SP.color
        WHERE SP.user_id = $user_id AND SP.is_buy = 0 AND P.product_status = 1;";
    $cart_data = executeQuery($cart_sql, true);
    client_render('page/shopping-cart', [
        'cart_data' => $cart_data,
    ]);
}

function add_to_cart() {
    $errors = '';
    $quantity_number = 0;
    $product_quantity = 0;
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

    $check_variant_sql = "SELECT * FROM product_variants WHERE product_variant_slug = '$color'";
    $check_variant_data = executeQuery($check_variant_sql, false);

    $check_product_sql = "SELECT * FROM products WHERE product_id = $product_id AND product_status = 1";
    $check_product_data = executeQuery($check_product_sql, false);

    if (empty($errors)  ) {
        if ($check_product_data['is_variant'] == 1) {
            $product_quantity = $check_variant_data['product_variant_quantity'];
        } else {
            $product_quantity = $check_product_data['product_quantity'];
        }

        if ($cart_data) {
            $quantity_cart_check = $cart_data['quantity'] + $quantity;
            if ($check_variant_data) {
                if ($quantity_cart_check > $check_variant_data['product_variant_quantity']) {
                    $quantity = $check_variant_data['product_variant_quantity'] - $cart_data['quantity'];
                }
            } else {
                if ($quantity_cart_check > $check_product_data['product_quantity']) {
                    $quantity = $check_product_data['product_quantity'] - $cart_data['quantity'];
                } 
            }
            $time_now = date("Y-m-d H:i:s");
            $cart_add_sql = "UPDATE shopping_carts 
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
        } else {
            if ($check_variant_data) {
                if ($quantity > $check_variant_data['product_variant_quantity']) {
                    $quantity = $check_variant_data['product_variant_quantity'];
                } 
            } else {
                if ($quantity > $check_product_data['product_quantity']) {
                    $quantity = $check_product_data['product_quantity'];
                } 
            }
            $cart_add_sql = "INSERT INTO shopping_carts 
                                (user_id, product_id, quantity, color, price, total_price) 
                            VALUES 
                                ('$user_id', '$product_id', '$quantity', '$color', '$price', '".($price * $quantity)."')";
            $quantity_number = 'Them thanh cong ' . $quantity  .' san pham';
        }
        executeQuery($cart_add_sql);
        $quantity_number = $quantity;
    }

    $response = [
        'quantity' => $quantity_number,
        'product_quantity' => $product_quantity,
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
    set_session('message', 'Cập nhật thành công');
    redirect('gio-hang');
}

function remove_item_cart() {
    $id = input_get('id');
    $sql = "DELETE FROM shopping_carts WHERE cart_id = $id";
    executeQuery($sql);
    set_session('message', 'Xóa thành công');
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

    $cart_data_sql = "SELECT 
                    P.product_name, P.product_image, SP.*, V.product_variant_name, V.product_variant_id, V.product_variant_image
                FROM shopping_carts SP
                LEFT JOIN products P ON SP.product_id = P.product_id
                LEFT JOIN product_variants V ON V.product_variant_slug = SP.color
                WHERE user_id = $user_id AND is_buy = 0 AND quantity > 0;";
    $cart_data = executeQuery($cart_data_sql, true);

    client_render('page/checkout', [
        'total_cart' => count($carts),
        'total_price' => $cart_total_price,
        'auth_info' => $auth_info,
        'cart_data' => $cart_data,
        'voucher' => get_session('VOUCHER') ?? []
    ],[
        'customize/js/add-to-cart.js',
    ]);
}

function checkout_handle() {
    $errors = [];
    $auth_info = auth_info() ?? '';
    $user_id = $auth_info['user_id'] ?? '';
    $name = input_post('name');
    $email = input_post('email');
    $phone = input_post('phone');
    $address = input_post('address');
    $payment_type = input_post('payment_type');
    $price = input_post('price');
    $time_now = date("Y-m-d H:i:s");
    $total_price = input_post('total_price');
    $voucher = strtoupper(input_post('voucher'));

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
    
    if ($voucher) {
        $voucher_sql = "SELECT * FROM vouchers WHERE voucher_code = '$voucher'";
        $voucher_result = executeQuery($voucher_sql, false);
    
        $user_voucher_sql = "SELECT * FROM user_vouchers WHERE voucher_id = " . $voucher_result['voucher_id'] . " AND user_id = " . $user_id;
        $user_voucher_result = executeQuery($user_voucher_sql, true);
    
        if (count($user_voucher_result) >= $voucher_result['limit_number']) {
            $errors['voucher'] = "Bạn đã hết lượt sử dụng mã $voucher";
        }
    }

    // checkout
    if (empty($errors)) {
        $order_code = generatorOrderCode();

        $cart_sql = "SELECT 
                        P.product_name, P.product_price, P.product_quantity, SP.*, V.product_variant_name, V.product_variant_id, V.product_variant_quantity
                    FROM shopping_carts SP
                    LEFT JOIN products P ON SP.product_id = P.product_id
                    LEFT JOIN product_variants V ON V.product_variant_slug = SP.color
                    WHERE is_buy = 0 AND user_id = $user_id AND quantity > 0;";
        $carts = executeQuery($cart_sql, true);

        $order_sql = "INSERT INTO orders (order_code, order_total, payment_type ,user_id, address, phone, order_date) 
                        VALUES ('$order_code', $total_price, '$payment_type', $user_id, '$address', '$phone', '$time_now')";
        $order_id = insertExecuteQueryLastID($order_sql);
            
        if ($voucher) {
            $voucher_apply_sql = "INSERT INTO user_vouchers (user_id, voucher_id) VALUES ($user_id, ". $voucher_result['voucher_id'] .")";
            executeQuery($voucher_apply_sql);
        }

        foreach ($carts as $item) {
            $update_cart_sql = "UPDATE shopping_carts SET is_buy = 1 WHERE cart_id = ".$item['cart_id'];
            executeQuery($update_cart_sql);

            $insert_order_item_sql = "INSERT INTO order_items (order_id, product_id, price, total_price ,quantity, color) 
                        VALUES ($order_id, ".$item['product_id'].", ".$item['price'].", ".$item['total_price'].", ".$item['quantity'].", '".$item['color']."')";
            executeQuery($insert_order_item_sql);

            $quantity_update = $item['quantity'];
            if (!empty($item['color'])) {
                if ($item['quantity'] > $item['product_variant_quantity']) {
                    $quantity_update = 0;
                }
                $update_quantity_sql = "UPDATE product_variants 
                                            SET product_variant_quantity = product_variant_quantity - $quantity_update 
                                    WHERE product_variant_id = " . $item['product_variant_id'];
            } else {
                if ($item['quantity'] > $item['product_quantity']) {
                    $quantity_update = 0;
                }
                $update_quantity_sql = "UPDATE products 
                                            SET product_quantity = product_quantity - $quantity_update 
                                    WHERE product_id = " . $item['product_id'];
            }
            executeQuery($update_quantity_sql);
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
                <p><strong>Đã giảm: ".priceVND($total_price - $price)."</strong></p>
                <p><strong>Tổng tiền: ".priceVND($total_price)."</strong></p>
                <br>
                <span>Cảm ơn bạn đã ủng hộ shop <i>.!.</i></span>
                <p>
                    Thân.<br>
                    <strong>PolyMobile</strong>
                </p>
        </div>";
        sendEmailOrder($email, "Thông tin đơn hàng $order_code", $content_mail);
        set_session('message', 'Đặt hàng thành công. Chi tiết đơn hàng đã được gửi vào email bạn cung cấp.');
        redirect('/');
    }

    if ($errors) {
        set_session('message-errors', $errors);
        redirect('thanh-toan');
    }
}

function checkVoucher() {
    $errors = '';
    $price_apply = 0;
    $auth_info = auth_info() ?? '';
    $user_id = $auth_info['user_id'] ?? '';
    $price = input_post('price');
    $voucher = strtoupper(input_post('voucher'));

    $voucher_sql = "SELECT * FROM vouchers WHERE voucher_code = '$voucher'";
    $voucher_result = executeQuery($voucher_sql, false);
    if ($voucher_result) {
        $user_voucher_sql = "SELECT * FROM user_vouchers WHERE voucher_id = " . $voucher_result['voucher_id'] . " AND user_id = " . $user_id;
        $user_voucher_result = executeQuery($user_voucher_sql, true);
        $end_time = strtotime($voucher_result['end_time']);
        $time_now = strtotime(date("Y-m-d H:i:s"));
        if ($voucher_result['limit_number'] == 0 || $voucher_result['is_active'] == 0 || $end_time < $time_now) {
            $errors = "Mã $voucher đã hết hạn.";
        } else if (count($user_voucher_result) >= $voucher_result['limit_number']) {
            $errors = "Bạn đã hết lượt sử dụng mã $voucher";
        } else if ($price < $voucher_result['minimum_order_price']) {
            $errors = "Mã $voucher chỉ áp dụng với đơn hàng từ ". priceVND($voucher_result['minimum_order_price']);
        } else {
            $price_apply = $voucher_result['apply_price'];
        }
    } else {
        $errors = 'Mã '.$voucher.' không tồn tại';
    }

    $data = [
        'price' => $price_apply,
        'errors' => $errors
    ];

    echo json_encode($data);
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