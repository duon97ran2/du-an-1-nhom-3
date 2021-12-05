<?php

function banners() {
    $sql ="SELECT * FROM banners WHERE banner_position = 2 ORDER BY banner_index ASC";
    return executeQuery($sql,true);
}
function list_categories() {
    $sql = "SELECT * FROM categories WHERE is_parent = 0 AND is_menu = 0";
    return executeQuery($sql,true);
}

function category_page() {
    $slug = input_get('slug');
    $filter_brand = input_get('brand');
    $filter_price = input_get('price');
    $filter_other = input_get('other');
    $where = [];
    $brand_name = '';
    $data_products_sql = "SELECT P.*, PC.*,
                        C.category_name as cate_child_name, C.category_id as cate_child_id, C.category_slug as cate_child_slug, 
                        CP.category_name as cate_parent_name, CP.category_id as cate_parent_id, CP.category_slug as cate_parent_slug
                FROM products P
                LEFT JOIN categories C ON C.category_id = P.category_id
                LEFT JOIN categories CP ON CP.category_id = C.parent_id
                LEFT JOIN product_configuration PC ON PC.product_id = P.product_id";
    if ($slug) {
        $where[] = "CP.category_slug = '$slug' AND P.product_status = 1";
    } else {
        $where[] = "P.product_status = 1";
    }
    if ($filter_brand) {
        $where[] = "P.brand_id = $filter_brand";
        $brand_sql ="SELECT * FROM brands WHERE brand_id = $filter_brand";
        $brand = executeQuery($brand_sql, false);
        $brand_name = $brand['brand_name'];
    }
    if ($filter_price == 'duoi-2-trieu') {
        $where[] = "P.product_price < 2000000";
    } else if ($filter_price == 'tu-2-4-trieu') {
        $where[] = "P.product_price BETWEEN 2000000 AND 4000000";
    } else if ($filter_price == 'tu-4-7-trieu') {
        $where[] = "P.product_price BETWEEN 4000000 AND 7000000";
    } else if ($filter_price == 'tu-7-13-trieu') {
        $where[] = "P.product_price BETWEEN 7000000 AND 13000000";
    } else if ($filter_price == 'tren-13-trieu') {
        $where[] = "P.product_price > 13000000";
    }

    if ($filter_other == 'uu-dai') {
        $where[] = "P.product_gift IS NOT NULL";
    } else if ($filter_other == 'giam-gia') {
        $where[] = "P.product_discount > 0";
    }
    if ($where) {
        $data_products_sql .= " WHERE " . implode(' AND ', $where);
    }
    $data_products = executeQuery($data_products_sql, true);
    $category_sql ="SELECT * FROM categories WHERE category_slug = '$slug'";
    $category = executeQuery($category_sql, false);
    client_render('page/category', [
        'page_title' => 'Danh mục',
        'categories' => list_categories(),
        'banners' => banners(),
        'products' => $data_products,
        'brand_name' => $brand_name ?? '',
        'category_name' => $category ? $category['category_name'] : 'Toàn bộ sản phẩm',
        'category_slug' => $category ? '/'.$category['category_slug'] : '',
    ]);
}