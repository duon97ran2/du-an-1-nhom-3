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
        $data_products_sql .= " WHERE is_delete = 0 AND " . implode(' AND ', $where);
    } else {
        $data_products_sql .= " WHERE is_delete = 0";
    }
    $data_products_sql .= ' LIMIT 12';
    $data_products = executeQuery($data_products_sql, true);
    $category_sql ="SELECT * FROM categories WHERE category_slug = '$slug'";
    $category = executeQuery($category_sql, false);
    client_render('page/category', [
        'page_title' => $category['category_name'] ?? 'Toàn bộ sản phẩm',
        'categories' => list_categories(),
        'banners' => banners(),
        'products' => $data_products,
        'brand_name' => $brand_name ?? '',
        'category_name' => $category['category_name'] ?? 'Toàn bộ sản phẩm',
        'category_slug' => $category ? '/'.$category['category_slug'] : '',
    ]);
}

function load_more() {
    $slug = input_get('slug');
    $filter_brand = input_get('brand');
    $filter_price = input_get('price');
    $filter_other = input_get('other');
    $limit = input_get('limit');
    $where = [];
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
        $data_products_sql .= " WHERE is_delete = 0 AND " . implode(' AND ', $where);
    } else {
        $data_products_sql .= " WHERE is_delete = 0";
    }
    $data_products_sql .= ' LIMIT '. $limit;
    $data_products = executeQuery($data_products_sql, true);

    $output = '';
    foreach($data_products as $item) {
        $output .= '<div class="cdt-product">
                <div class="cdt-product__img">
                    <a href="'.app_url('san-pham/' . $item['product_slug']).'">
                        <img src="'.asset('uploads/' . $item['product_image']).'" style=" width: 214px; height: 214px; ">
                    </a>';
                if ($item['product_discount'] > 0) {
                    $output .= '<div class="cdt-product__label">
                        <span class="badge badge-primary">Giảm '.price_minus_discount($item['product_price'], $item['product_discount']).'</span>
                    </div>';
                }
                $output .= '</div>
                <div class="cdt-product__info">
                    <h3>
                        <a href="'.app_url('san-pham/' . $item['product_slug']).'" class="cdt-product__name">'.$item['product_name'].'</a>
                    </h3>
                    <div class="cdt-product__show-promo">';
            if ($item['product_discount'] > 0) {
                $output .= '<div class="progress justify-content-center">
                            '.discount_price($item['product_price'], $item['product_discount']).'
                            <div class="progress-bar" style="width: 100%;"></div>
                        </div>
                        <div class="strike-price">
                            <strike>'.priceVND($item['product_price']).'</strike>
                        </div>';
            } else {
                $output .= '<div class="progress justify-content-center">
                            '.priceVND($item['product_price']).'
                            <div class="progress-bar" style="width: 100%;"></div>
                        </div>';
            }
        $output .= '</div>';
        if ($item['display'] || $item['ram'] || $item['storage']) {
            $output .= '<div class="cdt-product__config">
                        <div class="cdt-product__config__param">
                            <span data-title="Màn hình">
                                <span class="material-icons align-top">phone_iphone</span>
                                '.$item['display'].'
                            </span>
                            <span data-title="RAM">
                                <span class="material-icons align-top">memory</span>
                                '.$item['ram'].'
                            </span>
                            <span data-title="Bộ nhớ trong">
                                <span class="material-icons align-top">album</span>
                                '.$item['storage'].'
                            </span>
                        </div>
                    </div>';
        }
        $output .= '<div class="cdt-product__btn">
                        <a href="'.app_url('san-pham/' . $item['product_slug']).'" class="btn btn-primary btn-sm btn-main">XEM SẢN PHẨM</a>
                    </div>
                </div>
            </div>';
    }
    if (count($data_products) >= $limit) {
        $output .= '<div class="cdt-product--loadmore mb-5"><a class="btn btn-light js-load-moresss"><img src="https://icon-library.com/images/loading-icon-animated-gif/loading-icon-animated-gif-3.jpg" style="width: 12px;margin-right: 5px;margin-left: -10px;margin-top: -2px;display:none">Xem thêm</a></div>';
    } else {
        $output .= '<div class="cdt-product--loadmore mb-5"><a class="btn btn-light">Đã hết sản phẩm</a></div>';
    }
    echo $output;
}