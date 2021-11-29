<?php

function get_product_by_slug($slug) {
    $product_sql = "SELECT * FROM products WHERE product_slug = '$slug'";
    return executeQuery($product_sql, false);
}

function get_product_variant_by_slug($slug) {
    $data = [];
    $sql = "SELECT 
                P.*, C.category_name, CP.category_id as category_parent_id, CP.category_name as category_parent_name, B.brand_name,
                V.product_variant_name, V.product_variant_slug, V.product_variant_price, V.product_variant_discount, V.product_variant_quantity,
                V.product_variant_image
            FROM products P
            LEFT JOIN categories C ON C.category_id = P.category_id
            LEFT JOIN categories CP ON CP.category_id = C.parent_id
            LEFT JOIN brands B ON B.brand_id = P.brand_id
            LEFT JOIN product_variants V ON V.product_id = P.product_id
        WHERE product_slug = '$slug'";
    $product = executeQuery($sql, true);
    if (count($product) == 1) {
        $data[] = $product[0];
    } else {
        $data = $product;
    }
    return $data;
}

function get_configuration_by_product_id($product_id) {
    $sql = "SELECT * FROM product_configuration WHERE product_id = '$product_id'";
    return executeQuery($sql, false);
}

function product_details() {
    $slug = input_get('slug');
    $product_variant = [];
    $product_default = get_product_by_slug($slug);
    if (empty($product_default)) {
        error_page();
    } 
    if ($product_default['is_variant'] == 1) {
        $product_variant = get_product_variant_by_slug($slug);
        if ($product_variant) {
            $color = input_get('color');
            if (empty($color)) {
                $product_default = $product_variant[0];
            } else {
                if (count($product_variant) > 1) {
                    foreach ($product_variant as $variant) {
                        if ($variant['product_variant_slug'] == $color) {
                            $product_default = $variant;
                        }
                    }
                } else {
                    $product_default = $product_variant[0];
                }
            } 
        }
    }
    $product_configuration = get_configuration_by_product_id($product_default['product_id']);

    view_no_layout('layouts/product-details', [
        'product_default' => $product_default,
        'product_variant' => $product_variant,
        'product_configuration' => $product_configuration,
    ]);
}