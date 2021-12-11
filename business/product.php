<?php

function get_product_by_slug($slug)
{
    $product_sql = "SELECT 
                        P.*, CP.category_name, CP.category_slug
                    FROM products P
                    LEFT JOIN categories C ON C.category_id = P.category_id
                    LEFT JOIN categories CP ON CP.category_id = C.parent_id
                    WHERE P.product_slug = '$slug' AND P.is_delete = 0 AND P.product_status = 1";
    return executeQuery($product_sql, false);
}

function get_product_variant_by_slug($slug)
{
    $data = [];
    $sql = "SELECT 
                P.*, C.category_name, CP.category_id as category_parent_id, CP.category_slug,CP.category_name as category_parent_name, B.brand_name,
                V.product_variant_name, V.product_variant_slug, V.product_variant_price, V.product_variant_discount, V.product_variant_quantity,
                V.product_variant_image
            FROM products P
            LEFT JOIN categories C ON C.category_id = P.category_id
            LEFT JOIN categories CP ON CP.category_id = C.parent_id
            LEFT JOIN brands B ON B.brand_id = P.brand_id
            LEFT JOIN product_variants V ON V.product_id = P.product_id
        WHERE P.product_slug = '$slug' AND P.is_delete = 0 AND P.product_status = 1";
    $product = executeQuery($sql, true);
    if (count($product) == 1) {
        $data[] = $product[0];
    } else {
        $data = $product;
    }
    return $data;
}

function get_configuration_by_product_id($product_id)
{
    $sql = "SELECT * FROM product_configuration WHERE product_id = '$product_id'";
    return executeQuery($sql, false);
}
function get_gifts()
{
    $sql = "SELECT * FROM gifts";
    return executeQuery($sql);
}

function view_count($product_id) {
    if (empty($_SESSION["product_$product_id"])) {
        $_SESSION["product_$product_id"] = true;
        $sql = "UPDATE products SET product_views = product_views + 1 WHERE product_id = $product_id";
        return executeQuery($sql);
    } 
    return false;
}

function product_details()
{
    $slug = input_get('slug');
    $product_variant = [];
    $product_default = get_product_by_slug($slug);
    if (empty($product_default)) {
        error_page();
    }
    if ($product_default['is_variant'] == 1) {
        $flag = false;
        $product_variant = get_product_variant_by_slug($slug);
        if ($product_variant) {
            $color = input_get('color');
            if (empty($color)) {
                $flag = false;
            } else {
                if (count($product_variant) > 1) {
                    foreach ($product_variant as $variant) {
                        if ($variant['product_variant_slug'] !== $color) {
                            continue;
                        }
                        $flag = true;
                        $product_default = $variant;
                    }
                } else {
                    $flag = false;
                }
            }
            if ($flag == false) {
                $product_default = $product_variant[0];
            }
        }
    }
    $product_configuration = get_configuration_by_product_id($product_default['product_id']);
    $product_id = $product_default['product_id'];
    view_count($product_id);
    $comments_sql = "SELECT products.*, users.*, comments.* FROM comments
                join products on comments.product_id = products.product_id
                join users on users.user_id	= comments.user_id 
                where products.product_id = $product_id";
    $comments = executeQuery($comments_sql, true);
    $gifts = get_gifts();
    client_render('page/product-details', [
        'page_title' => $product_default['product_name'],
        'product_default' => $product_default,
        'product_variant' => $product_variant,
        'product_configuration' => $product_configuration,
        'gifts' => $gifts,
        'total_cmt' => count($comments),
        'comments' => $comments,
    ], [
        'customize/js/add-to-cart.js',
        'customize/js/add-to-wishlist.js',
    ]);
}


