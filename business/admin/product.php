<?php

function product_page() {
    admin_render('product/list.php', [
        'page_title' => 'Danh sách sản phẩm'
    ]);
}

function product_create() {
    admin_render('product/create.php', [
        'page_title' => 'Thêm sản phẩm mới'
    ], [
        'customize/js/product/scripts.js'
    ]);
}

function product_create_handle() {
    $errors = [];
    $product_variant = [];
    $is_variant = input_post('is_variant');
    $product_gifts = input_post('product_gifts');
    $product_variant_image = input_file('product_variant_image');
    $product_variant_name = input_post('product_variant_name');
    $product_variant_slug = input_post('product_variant_slug');
    $product_variant_price = input_post('product_variant_price');
    $product_variant_discount = input_post('product_variant_discount');
    if ($is_variant == 1) {
        if ($product_variant_image) {
            for ($i = 0; $i < count($product_variant_image['name']); $i++) {
                $product_variant[$i]['product_variant_image'] = $product_variant_image['name'][$i];
            }
        }
        if ($product_variant_name) {
            for ($i = 0; $i < count($product_variant_name); $i++) {
                $product_variant[$i]['product_variant_name'] = $product_variant_name[$i];
            }
        }
        if ($product_variant_slug) {
            for ($i = 0; $i < count($product_variant_slug); $i++) {
                $product_variant[$i]['product_variant_slug'] = $product_variant_slug[$i];
            }
        }
        if ($product_variant_price) {
            for ($i = 0; $i < count($product_variant_price); $i++) {
                $product_variant[$i]['product_variant_price'] = $product_variant_price[$i];
            }
        }
        if ($product_variant_discount) {
            for ($i = 0; $i < count($product_variant_discount); $i++) {
                $product_variant[$i]['product_variant_discount'] = $product_variant_discount[$i];
            }
        }
        for ($i = 0; $i < count($product_variant); $i++) {
            foreach ($product_variant[$i] as $key => $value) {
                if (empty($product_variant[$i][$key])) {
                    $errors[$key] = 'Vui lòng điền thông tin thuộc tính';
                }
            }
        }
    }
    dd($errors);
}