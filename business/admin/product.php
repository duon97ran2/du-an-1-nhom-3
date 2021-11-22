<?php

function product_page() {
    admin_render('product/list.php', [
        'page_title' => 'Danh sách sản phẩm'
    ], [
        'customize/js/product/scripts.js'
    ]);
}

function get_gifts() {
    return [
        [
            'gift_id' => 1,
            'gift_name' => 'Quà số 1',
        ],
        [
            'gift_id' => 2,
            'gift_name' => 'Quà số 2',
        ],
        [
            'gift_id' => 3,
            'gift_name' => 'Quà số 3',
        ],
        [
            'gift_id' => 4,
            'gift_name' => 'Quà số 4',
        ],
        [
            'gift_id' => 5,
            'gift_name' => 'Quà số 5',
        ]
    ];
}

function get_brands() {
    return [
        [
            'brand_id' => 64,
            'brand_name' => 'Thương hiệu 1',
        ],
        [
            'brand_id' => 65,
            'brand_name' => 'Thương hiệu 2',
        ],
        [
            'brand_id' => 66,
            'brand_name' => 'Thương hiệu 3',
        ]
    ];
}

function get_categories() {
    return [
        [
            'category_id' => 63,
            'category_name' => 'Danh mục 1',
        ],
        [
            'category_id' => 64,
            'category_name' => 'Danh mục 2',
        ],
        [
            'category_id' => 65,
            'category_name' => 'Danh mục 3',
        ]
    ];
}

function product_create() {
    $categories = get_categories();
    $brands = get_brands();
    $gifts = get_gifts();
    admin_render('product/create.php', [
        'page_title' => 'Thêm sản phẩm mới',
        'categories' => $categories,
        'brands' => $brands,
        'gifts' => $gifts,
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

    if (empty($errors)) {
        $image_upload = upload_image($product_image, 'products');
        $product_sql = "INSERT INTO products (
            product_image,product_name,product_slug,product_description,
            product_content,category_id,brand_id,product_price,product_quantity,product_discount,
            product_gifts,product_status,product_hot,is_variant
        ) VALUES (
            '$image_upload','$product_name','$product_slug','$product_description',
            '$product_content','$category_id','$brand_id','$product_price','$product_quantity',
            '$product_discount','$product_gifts','$product_status','$product_hot','$is_variant'
        );";
        $product_id = insertExecuteQueryLastID($product_sql);
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

        if (empty($errors)) {
            $config_sql = "INSERT INTO product_configuration (
                display,camera_front,camera_back,ram,storage,cpu,gpu,battery,sim,system,made_in,product_id
            ) VALUES (
                '$display','$camera_front','$camera_back','$ram','$storage','$cpu','$gpu','$battery','$sim','$system','$made_in','$product_id'
            );";
            executeQuery($config_sql);
        }
    }
    if ($is_variant == 1) {
        $product_variant_image = input_file('product_variant_image');
        $product_variant_name = input_post('product_variant_name');
        $product_variant_slug = input_post('product_variant_slug');
        $product_variant_price = input_post('product_variant_price');
        $product_variant_discount = input_post('product_variant_discount') ?? 0;

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
                if ($key == 'product_variant_discount') {
                    continue;
                } 
                if ($key == 'product_variant_image') {
                    if ($product_variant[$i][$key]['size'] == 0) {
                        $errors['product_variant_image'] = 'Vui lòng chọn hình ảnh thuộc tính';
                    }
                } else {
                    if (empty($product_variant[$i][$key])) {
                        $errors[$key] = 'Vui lòng điền thông tin thuộc tính';
                    }
                }
            }
        }
        if (empty($errors)) {
            if (!empty($product_variant)) {
                foreach ($product_variant as $item) {
                    $image_upload = upload_image($item['product_variant_image'], 'products');
                    $variant_sql = "INSERT INTO product_variants (
                        product_variant_image,product_variant_name,product_variant_slug,product_variant_price,product_variant_discount,product_id
                    ) VALUES (
                        '$image_upload','".$item['product_variant_name']."','".$item['product_variant_slug']."',
                        '".$item['product_variant_price']."','".$item['product_variant_discount']."','$product_id'
                    );";
                    executeQuery($variant_sql);
                }
            } 
        }
    }

    if (empty($errors)) {
        set_session('message', 'Thêm sản phẩm thành công');
        redirect('cp-admin/san-pham');
    } 
    else {
        set_session('message-errors', 'Thêm sản phẩm thất bại');
        redirect('cp-admin/san-pham/them-moi');
    }
}

function product_update() {
    $categories = get_categories();
    $brands = get_brands();
    $gifts = get_gifts();
    $product_id = input_get('product_id');
    $product_sql = "SELECT * FROM products WHERE product_id = '$product_id'";
    $product = executeQuery($product_sql, false);
    $config_sql = "SELECT * FROM product_configuration WHERE product_id = '$product_id'";
    $config = executeQuery($config_sql, false);
    $variant_sql = "SELECT * FROM product_variants WHERE product_id = '$product_id'";
    $variant = executeQuery($variant_sql);
    admin_render('product/update.php', [
        'page_title' => 'Sửa sản phẩm',
        'product' => $product,
        'config' => $config,
        'variant' => $variant,
        'categories' => $categories,
        'brands' => $brands,
        'gifts' => $gifts,
    ], [
        'customize/js/commons.js',
        'customize/js/product/scripts.js'
    ]);
}

function product_update_handle() {
    $errors = [];
    $product_id = input_get('product_id');
    $product_variant = [];
    $product_variant_update = [];
    $product_config = [];
    $product_image = input_file('product_image_update');
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

    if (empty($errors)) {
        $time_now = date("Y-m-d H:i:s");
        $select_product_sql = "SELECT * FROM products WHERE product_id = '$product_id'";
        $product_data = executeQuery($select_product_sql, false);
        $image_upload = $product_image['size'] > 0 ? upload_image($product_image, 'products') : $product_data['product_image'];
        $product_sql = "UPDATE products SET
            product_image = '$image_upload',product_name = '$product_name',product_slug = '$product_slug',product_description = '$product_description',
            product_content = '$product_content',category_id = '$category_id',brand_id = '$brand_id',product_price = '$product_price',
            product_quantity = '$product_quantity',product_discount = '$product_discount',
            product_gifts = '$product_gifts',product_status = '$product_status',product_hot = '$product_hot',is_variant = '$is_variant',
            updated_at = '$time_now'
        WHERE product_id = '$product_id';";
        executeQuery($product_sql);
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

        if (empty($errors)) {
            $select_config_sql = "SELECT * FROM product_configuration WHERE product_id = '$product_id'";
            $config_data = executeQuery($select_config_sql, false);
            if (empty($config_data)) {
                $config_sql = "INSERT INTO product_configuration (
                    display,camera_front,camera_back,ram,storage,cpu,gpu,battery,sim,system,made_in,product_id
                ) VALUES (
                    '$display','$camera_front','$camera_back','$ram','$storage','$cpu','$gpu','$battery','$sim','$system','$made_in','$product_id'
                );";
                executeQuery($config_sql);
            } else {
                $config_sql = "UPDATE product_configuration 
                    SET
                        display = '$display',camera_front = '$camera_front',camera_back = '$camera_back',
                        ram = '$ram',storage = '$storage',
                        cpu = '$cpu',gpu = '$gpu',
                        battery = '$battery',sim = '$sim',
                        system = '$system',
                        made_in = '$made_in'
                    WHERE
                        product_id = '$product_id'";
                executeQuery($config_sql);
            }
        }
    } 
    if ($is_variant == 1) {
        $product_variant_image = input_file('product_variant_image');
        $product_variant_name = input_post('product_variant_name');
        $product_variant_slug = input_post('product_variant_slug');
        $product_variant_price = input_post('product_variant_price');
        $product_variant_discount = input_post('product_variant_discount');

        //  insert
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
                if ($key == 'product_variant_discount') {
                    continue;
                } 
                if ($key == 'product_variant_image') {
                    if ($product_variant[$i][$key]['size'] == 0) {
                        $errors['product_variant_image'] = 'Vui lòng chọn hình ảnh thuộc tính';
                    }
                } else {
                    if (empty($product_variant[$i][$key])) {
                        $errors[$key] = 'Vui lòng điền thông tin thuộc tính';
                    }
                }
            }
        }
        // update

        $product_variant_id_update = input_post('product_variant_id_update');
        $product_variant_image_update = input_file('product_variant_image_update');
        $product_variant_name_update = input_post('product_variant_name_update');
        $product_variant_slug_update = input_post('product_variant_slug_update');
        $product_variant_price_update = input_post('product_variant_price_update');
        $product_variant_discount_update = input_post('product_variant_discount_update');

        if ($product_variant_image_update) {
            for ($i = 0; $i < count($product_variant_image_update['name']); $i++) {
                $product_variant_update[$i]['product_variant_image_update']['name'] = $product_variant_image_update['name'][$i];
                $product_variant_update[$i]['product_variant_image_update']['size'] = $product_variant_image_update['size'][$i];
                $product_variant_update[$i]['product_variant_image_update']['type'] = $product_variant_image_update['type'][$i];
                $product_variant_update[$i]['product_variant_image_update']['tmp_name'] = $product_variant_image_update['tmp_name'][$i];
                $product_variant_update[$i]['product_variant_image_update']['error'] = $product_variant_image_update['error'][$i];
            }
        }
        if ($product_variant_id_update) {
            for ($i = 0; $i < count($product_variant_id_update); $i++) {
                $product_variant_update[$i]['product_variant_id_update'] = $product_variant_id_update[$i];
            }
        }
        if ($product_variant_name_update) {
            for ($i = 0; $i < count($product_variant_name_update); $i++) {
                $product_variant_update[$i]['product_variant_name_update'] = $product_variant_name_update[$i];
            }
        }
        if ($product_variant_slug_update) {
            for ($i = 0; $i < count($product_variant_slug_update); $i++) {
                $product_variant_update[$i]['product_variant_slug_update'] = $product_variant_slug_update[$i];
            }
        }
        if ($product_variant_price_update) {
            for ($i = 0; $i < count($product_variant_price_update); $i++) {
                $product_variant_update[$i]['product_variant_price_update'] = $product_variant_price_update[$i];
            }
        }
        if ($product_variant_discount_update) {
            for ($i = 0; $i < count($product_variant_discount_update); $i++) {
                $product_variant_update[$i]['product_variant_discount_update'] = $product_variant_discount_update[$i];
            }
        }
        for ($i = 0; $i < count($product_variant_update); $i++) {
            foreach ($product_variant_update[$i] as $key => $value) {
                if ($key == 'product_variant_discount_update') {
                    continue;
                } 
                if ($key == 'product_variant_image_update') {
                    continue;
                } else {
                    if (empty($product_variant_update[$i][$key])) {
                        $errors[$key] = 'Vui lòng điền thông tin thuộc tính';
                    }
                }
            }
        }
        if (empty($errors)) {
            if (!empty($product_variant)) {
                foreach ($product_variant as $item) {
                    $image_upload = upload_image($item['product_variant_image'], 'products');
                    $variant_insert_sql = "INSERT INTO product_variants (
                        product_variant_image,product_variant_name,product_variant_slug,product_variant_price,product_variant_discount,product_id
                    ) VALUES (
                        '$image_upload','".$item['product_variant_name']."','".$item['product_variant_slug']."',
                        '".$item['product_variant_price']."','".$item['product_variant_discount']."','$product_id'
                    );";
                    executeQuery($variant_insert_sql);
                }
            }
            
            if (!empty($product_variant_update)) {
                foreach ($product_variant_update as $item) {
                    $up_variant_id = $item['product_variant_id_update'];
                    $select_variant_sql = "SELECT * FROM product_variants WHERE product_variant_id = '$up_variant_id'";
                    $select_variant = executeQuery($select_variant_sql, false);

                    $image_upload_update = $item['product_variant_image_update']['size'] > 0 ? upload_image($item['product_variant_image_update'], 'products') : $select_variant['product_variant_image'];
                    $up_variant_name = $item['product_variant_name_update'];
                    $up_variant_slug = $item['product_variant_slug_update'];
                    $up_variant_price = $item['product_variant_price_update'];
                    $up_variant_discount = $item['product_variant_discount_update'];
                    $up_variant_id = $select_variant['product_variant_id'];
                    $variant_update_sql = "UPDATE product_variants 
                        SET
                            product_variant_image = '$image_upload_update', 
                            product_variant_name = '$up_variant_name',
                            product_variant_slug = '$up_variant_slug',
                            product_variant_price = '$up_variant_price',
                            product_variant_discount = '$up_variant_discount' 
                        WHERE 
                            product_variant_id = '$up_variant_id'";
                    executeQuery($variant_update_sql);
                }
            } 
        }
    }

    if (empty($errors)) {
        set_session('message', 'Cập nhật sản phẩm thành công');
        redirect('cp-admin/san-pham/cap-nhat?product_id='.$product_id);
    } 
    else {
        set_session('message-errors', 'Cập nhật sản phẩm thất bại');
        redirect('cp-admin/san-pham/cap-nhat?product_id='.$product_id);
    }
}

function product_remove_variant_handle() {
    $variant_id = input_get('variant_id');
    $sql = "DELETE FROM product_variants WHERE product_variant_id = '$variant_id'";
    executeQuery($sql);
    set_session('message', 'Xoá biến thể thành công');
    redirect_back();
}