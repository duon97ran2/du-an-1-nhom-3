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
        'customize/js/commons.js',
        'customize/js/product/scripts.js'
    ]);
}

function product_create_handle() {
    $errors = [];
    $product_variant = [];
    $product_config = [];
    $product_image = input_file('product_image');
    $product_name = input_post('product_name');
    $product_slug = input_post('product_slug');
    $product_description = input_post('product_description');
    $product_content = input_post('product_content');
    $category_id = input_post('category_id');
    $brand_id = input_post('brand_id');
    $product_price = input_post('product_price');
    $product_quantity = input_post('product_quantity');
    $product_discount = input_post('product_discount');
    $product_gifts = input_post('product_gifts');
    $product_gifts = implode(',', $product_gifts);
    $product_status = input_post('product_status');
    $product_hot = input_post('product_hot');
    $is_variant = input_post('is_variant');
    $is_config = input_post('is_config');
    if ($product_image['size'] == 0) {
        $errors['product_image'] = 'Vui lòng chọn hình ảnh';
    }
    if (empty($product_name)) {
        $errors['product_name'] = 'Vui lòng điền thông tin';
    }
    if (empty($product_slug)) {
        $errors['product_slug'] = 'Vui lòng điền thông tin';
    }
    if (empty($product_description)) {
        $errors['product_description'] = 'Vui lòng điền thông tin';
    }
    if (empty($product_content)) {
        $errors['product_content'] = 'Vui lòng điền thông tin';
    }
    if (empty($category_id)) {
        $errors['category_id'] = 'Vui lòng chọn thông tin';
    }
    if (empty($brand_id)) {
        $errors['brand_id'] = 'Vui lòng chọn thông tin';
    }
    if (empty($product_price)) {
        $errors['product_price'] = 'Vui lòng điền thông tin';
    }
    if (empty($product_quantity)) {
        $errors['product_quantity'] = 'Vui lòng điền thông tin';
    }

    if ($is_config == 1) {
        $display = input_post('display');
        $camera_front = input_post('camera_front');
        $camera_back = input_post('camera_back');
        $ram = input_post('ram');
        $storage = input_post('storage');
        $cpu = input_post('cpu');
        $gpu = input_post('gpu');
        $battery = input_post('battery');
        $sim = input_post('sim');
        $system = input_post('system');
        $made_in = input_post('made_in');
        $product_config = [
            'display' => $display,
            'camera_front' => $camera_front,
            'camera_back' => $camera_back,
            'ram' => $ram,
            'storage' => $storage,
            'cpu' => $cpu,
            'gpu' => $gpu,
            'battery' => $battery,
            'sim' => $sim,
            'system' => $system,
            'made_in' => $made_in,
        ];
    }
    if ($is_variant == 1) {
        $product_variant_image = input_file('product_variant_image');
        $product_variant_name = input_post('product_variant_name');
        $product_variant_slug = input_post('product_variant_slug');
        $product_variant_price = input_post('product_variant_price');
        $product_variant_discount = input_post('product_variant_discount');

        if ($product_variant_image) {
            for ($i = 0; $i < count($product_variant_image['name']); $i++) {
                $product_variant[$i]['product_variant_image']['name'] = $product_variant_image['name'][$i];
                $product_variant[$i]['product_variant_image']['size'] = $product_variant_image['size'][$i];
                $product_variant[$i]['product_variant_image']['type'] = $product_variant_image['type'][$i];
                $product_variant[$i]['product_variant_image']['tmp_name'] = $product_variant_image['tmp_name'][$i];
                $product_variant[$i]['product_variant_image']['error'] = $product_variant_image['error'][$i];
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
                if ($product_variant[$i][$key] != $product_variant[$i]['product_variant_discount']) {
                    continue;
                } else {
                    if ($product_variant[$i][$key] != $product_variant[$i]['product_variant_image']) {
                        if (empty($product_variant[$i][$key])) {
                            $errors[$key] = 'Vui lòng điền thông tin thuộc tính';
                        }
                    } else {
                        if ($product_variant[$i]['product_variant_image']['size'] == 0) {
                            $errors['product_variant_image'] = 'Vui lòng chọn hình ảnh thuộc tính';
                        }
                    }
                }
            }
        }
    }
    $product = [
        'product_image' => $product_image,
        'product_name' => $product_name,
        'product_slug' => $product_slug,
        'product_description' => $product_description,
        'product_content' => $product_content,
        'category_id' => $category_id,
        'brand_id' => $brand_id,
        'product_price' => $product_price,
        'product_quantity' => $product_quantity,
        'product_discount' => $product_discount,
        'product_gifts' => $product_gifts,
        'product_status' => $product_status,
        'product_hot' => $product_hot,
        'is_variant' => $is_variant,
    ];
    $product['product_variant'] = $product_variant;
    $product['product_config'] = $product_config;
    dd($product);
}