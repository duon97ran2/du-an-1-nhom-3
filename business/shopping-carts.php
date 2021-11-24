<?php

function shopping_carts() {
    $user_id = auth_info()['user_id'];
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
        'cart_buy_data' => $cart_buy_data
    ]);
}

function add_to_cart() {
    $errors = '';
    $user_id = auth_info()['user_id'];
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

    if (empty($errors)) {
        $cart_sql = "SELECT * FROM shopping_carts WHERE user_id = $user_id AND product_id = $product_id AND color = '$color' AND is_buy = 0";
        $cart_data = executeQuery($cart_sql, false);
    
        if ($cart_data) {
            $time_now = date("Y-m-d H:i:s");
            $cart_update_sql = "UPDATE shopping_carts 
                            SET 
                                quantity = quantity + $quantity,
                                price = price + ($price * $quantity),
                                updated_at = '$time_now'
                            WHERE 
                                user_id = $user_id 
                            AND 
                                product_id = $product_id 
                            AND 
                                color = '$color'";
            executeQuery($cart_update_sql);
        } else {
            $cart_insert_sql = "INSERT INTO shopping_carts 
                                (user_id, product_id, quantity, color, price) 
                            VALUES 
                                ('$user_id', '$product_id', '$quantity', '$color', '".($price * $quantity)."')";
            executeQuery($cart_insert_sql);
        }
        $success = 'Them thanh cong';
    }

    $response = [
        'success' => $success,
        'errors' => $errors,
        'cart_total' => cart_total() ?? 0
    ];

    echo json_encode($response);
}