<?php

function product_page() {
    $cate_sql = "SELECT * FROM categories WHERE parent_id IS NOT NULL";
    $brand_sql = "SELECT * FROM brands";
    $variant_sql = "SELECT * FROM product_variants";
    $variants = executeQuery($variant_sql, true);
    $categories = executeQuery($cate_sql, true);
    $brands = executeQuery($brand_sql, true);

    $where = [];
    $brand_get = input_get('brand');
    $cate_get = input_get('category');
    $status_get = input_get('status');
    $sql = "SELECT * FROM products P
        LEFT JOIN categories C ON C.category_id = P.category_id
        LEFT JOIN brands B ON B.brand_id = P.brand_id";
    if (!empty($brand_get)) {
        $where[] = "P.brand_id = $brand_get";
    }
    if (!empty($cate_get)) {
        $where[] = "P.category_id = $cate_get";
    } 
    if (!empty($status_get)) {
        $where[] = "P.product_status = $status_get";
    }

    if ($where) {
        $sql .= " WHERE ". implode(' AND ', $where);
    }

    $products = executeQuery($sql, true);
    admin_render('product/list.php', [
        'page_title' => 'Danh sách sản phẩm',
        'products' => $products,
        'categories' => $categories,
        'brands' => $brands,
        'variants' => $variants,
    ], [
        'customize/js/commons.js',
        'customize/js/product/scripts.js'
    ], [
        'customize/css/product.css',
    ]);
}

function product_create() {
    $cate_sql = "SELECT * FROM categories WHERE is_parent = 0";
    $brand_sql = "SELECT * FROM brands";
    $gift_sql = "SELECT * FROM gifts";
    $categories = executeQuery($cate_sql, true);
    $brands = executeQuery($brand_sql, true);
    $gifts = executeQuery($gift_sql, true);
    admin_render('product/create.php', [
        'page_title' => 'Thêm sản phẩm mới',
        'categories' => $categories,
        'brands' => $brands,
        'gifts' => $gifts,
    ], [
        'customize/js/commons.js',
        'customize/js/product/scripts.js'
    ], [
        'customize/css/product.css',
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
    $slug_data = find_product_by_slug($product_slug);
    if ($product_image['size'] == 0) {
        $errors['product_image'] = 'Vui lòng chọn hình ảnh';
    }
    if (empty($product_name)) {
        $errors['product_name'] = 'Vui lòng điền thông tin';
    }
    if (empty($product_slug)) {
        $errors['product_slug'] = 'Vui lòng điền thông tin';
    } else if (!empty($slug_data)) {
        $errors['product_slug'] = 'Liên kết đã tồn tại';
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
    if (!isset($product_quantity)) {
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
        $product_variant_discount = input_post('product_variant_discount');
        $product_variant_quantity = input_post('product_variant_quantity');

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
        if ($product_variant_quantity) {
            for ($i = 0; $i < count($product_variant_quantity); $i++) {
                $product_variant[$i]['product_variant_quantity'] = $product_variant_quantity[$i];
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
                }
                if ($key == 'product_variant_quantity') {
                    if (!isset($product_variant[$i][$key])) {
                        $errors[$key] = 'Vui lòng điền thông tin thuộc tính';
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
                        product_variant_image,product_variant_name,product_variant_slug,product_variant_price,product_variant_discount,product_variant_quantity,product_id
                    ) VALUES (
                        '$image_upload','".$item['product_variant_name']."','".$item['product_variant_slug']."',
                        '".$item['product_variant_price']."','".$item['product_variant_discount']."','".$item['product_variant_quantity']."','$product_id'
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
    $cate_sql = "SELECT * FROM categories WHERE is_parent = 0";
    $brand_sql = "SELECT * FROM brands";
    $gift_sql = "SELECT * FROM gifts";
    $categories = executeQuery($cate_sql, true);
    $brands = executeQuery($brand_sql, true);
    $gifts = executeQuery($gift_sql, true);
    $product_id = input_get('product_id');
    $product_sql = "SELECT * FROM products WHERE product_id = '$product_id'";
    $product = executeQuery($product_sql, false);
    $config_sql = "SELECT * FROM product_configuration WHERE product_id = '$product_id'";
    $config = executeQuery($config_sql, false);
    $variant_sql = "SELECT * FROM product_variants WHERE product_id = '$product_id'";
    $variant = executeQuery($variant_sql);
    admin_render('product/update.php', [
        'page_title' => 'Sửa sản phẩm ' . $product['product_name'],
        'product' => $product,
        'config' => $config,
        'variant' => $variant,
        'categories' => $categories,
        'brands' => $brands,
        'gifts' => $gifts,
    ], [
        'customize/js/commons.js',
        'customize/js/product/scripts.js'
    ], [
        'customize/css/product.css',
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
    $select_product_sql = "SELECT * FROM products WHERE product_id = '$product_id'";
    $product_data = executeQuery($select_product_sql, false);
    $slug_data = find_product_by_slug($product_slug);

    if (empty($product_name)) {
        $errors['product_name'] = 'Vui lòng điền thông tin';
    }
    if (empty($product_slug)) {
        $errors['product_slug'] = 'Vui lòng điền thông tin';
    } else if ($slug_data) {
        if ($slug_data['product_slug'] != $product_data['product_slug']) {
            $errors['product_slug'] = 'Liên kết đã tồn tại';
        }
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
    if (!isset($product_quantity)) {
        $errors['product_quantity'] = 'Vui lòng điền thông tin';
    }

    if (empty($errors)) {
        $time_now = date("Y-m-d H:i:s");
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
    } else {
        $delete_config_sql = "DELETE FROM product_configuration WHERE product_id = '$product_id'";
        executeQuery($delete_config_sql);
    }
    if ($is_variant == 1) {
        $product_variant_image = input_file('product_variant_image');
        $product_variant_name = input_post('product_variant_name');
        $product_variant_slug = input_post('product_variant_slug');
        $product_variant_price = input_post('product_variant_price');
        $product_variant_discount = input_post('product_variant_discount');
        $product_variant_quantity = input_post('product_variant_quantity');

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
        if ($product_variant_quantity) {
            for ($i = 0; $i < count($product_variant_quantity); $i++) {
                $product_variant[$i]['product_variant_quantity'] = $product_variant_quantity[$i];
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
                } 
                if ($key == 'product_variant_quantity') {
                    if (!isset($product_variant[$i][$key])) {
                        $errors[$key] = 'Vui lòng điền thông tin thuộc tính';
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
        $product_variant_quantity_update = input_post('product_variant_quantity_update');

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
        if ($product_variant_quantity_update) {
            for ($i = 0; $i < count($product_variant_quantity_update); $i++) {
                $product_variant_update[$i]['product_variant_quantity_update'] = $product_variant_quantity_update[$i];
            }
        }
        for ($i = 0; $i < count($product_variant_update); $i++) {
            foreach ($product_variant_update[$i] as $key => $value) {
                if ($key == 'product_variant_discount_update') {
                    continue;
                }
                if ($key == 'product_variant_image_update') {
                    continue;
                }
                if ($key == 'product_variant_quantity_update') {
                    if (!isset($product_variant_update[$i][$key])) {
                        $errors[$key] = 'Vui lòng điền thông tin thuộc tính';
                    }
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
                        product_variant_image,product_variant_name,product_variant_slug,product_variant_price,product_variant_discount,product_variant_quantity,product_id
                    ) VALUES (
                        '$image_upload','".$item['product_variant_name']."','".$item['product_variant_slug']."',
                        '".$item['product_variant_price']."','".$item['product_variant_discount']."','".$item['product_variant_quantity']."','$product_id'
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
                    $up_variant_quantity = $item['product_variant_quantity_update'];
                    $up_variant_id = $select_variant['product_variant_id'];
                    $variant_update_sql = "UPDATE product_variants 
                        SET
                            product_variant_image = '$image_upload_update', 
                            product_variant_name = '$up_variant_name',
                            product_variant_slug = '$up_variant_slug',
                            product_variant_price = '$up_variant_price',
                            product_variant_discount = '$up_variant_discount',
                            product_variant_quantity = '$up_variant_quantity' 
                        WHERE 
                            product_variant_id = '$up_variant_id'";
                    executeQuery($variant_update_sql);
                }
            } 
        }
    }

    $variant_count_sql = "SELECT * FROM product_variants WHERE product_id = '$product_id'";
    $variant_count = executeQuery($variant_count_sql, true);
    if (count($variant_count) == 0) {
        $product_update_variant_sql = "UPDATE products SET is_variant = 0 WHERE product_id = '$product_id'";
        executeQuery($product_update_variant_sql);
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

function product_change_status_handle() {
    $product_id = input_post('product_id');
    $status = input_post('status');
    $sql = "UPDATE products SET product_status = $status WHERE product_id = $product_id";
    executeQuery($sql);
    echo "Cập nhật thành công";
}

function product_remove_product_handle() {
    $product_id = input_get('product_id');
    $sql = "DELETE FROM products WHERE product_id = '$product_id'";
    executeQuery($sql);
    set_session('message', 'Xoá sản phẩm thành công');
    redirect_back();
}

function product_remove_variant_handle() {
    $variant_id = input_get('variant_id');
    $product_id = input_get('product_id');
    $sql = "DELETE FROM product_variants WHERE product_variant_id = '$variant_id'";
    executeQuery($sql);
    $variant_sql = "SELECT * FROM product_variants WHERE product_id = '$product_id'";
    $variants = executeQuery($variant_sql, true);
    if (count($variants) == 0) {
        $product_sql = "UPDATE products SET is_variant = 0 WHERE product_id = '$product_id'";
        executeQuery($product_sql);
    }
    set_session('message', 'Xoá biến thể thành công');
    redirect_back();
}

function find_product_by_slug($slug) {
    $sql = "SELECT * FROM products WHERE product_slug = '$slug'";
    return executeQuery($sql, false);
}

function find_product_by_slug_json() {
    $slug = input_post('slug');
    $action = input_post('action');
    $old_slug = input_post('old_slug');
    $product = find_product_by_slug($slug);
    if ($product) {
        if (strtolower($action) == 'add') {
            echo $product['product_slug'];
        }
        if (strtolower($action) == 'edit'){
            if ($slug != $old_slug) {
                echo $product['product_slug'];
            }
        }
    }
}