<?php

function sp_hot_sale(){
    $sql = "SELECT * FROM products WHERE product_hot = 1 AND product_status = 1 AND product_discount > 0 LIMIT 10";
    return executeQuery($sql,true);
}
function sp_categories(){
    $sql = "SELECT P.*, 
                C.category_name as cate_child_name, C.category_id as cate_child_id, C.category_slug as cate_child_slug, 
                CP.category_name as cate_parent_name, CP.category_id as cate_parent_id, CP.category_slug as cate_parent_slug
            FROM products P
            LEFT JOIN categories C ON C.category_id = P.category_id
            LEFT JOIN categories CP ON CP.category_id = C.parent_id
            LIMIT 8";
    return executeQuery($sql,true);
}
function sp_hot_view(){
    $sql = "SELECT * FROM products WHERE product_views > 0 AND product_status = 1 ORDER BY product_views DESC LIMIT 10";
    return executeQuery($sql,true);
}
function list_categories() {
    $sql = "SELECT C.*, COUNT(*) as product_count
            FROM categories C
            JOIN categories CC ON CC.parent_id = C.category_id
            RIGHT JOIN products P ON P.category_id = CC.category_id
            GROUP BY C.category_id;";
    return executeQuery($sql,true);
}
function banners() {
    $sql ="SELECT * FROM banners WHERE banner_position = 1 ORDER BY banner_index ASC";
    return executeQuery($sql,true);
}

function index() {
    $hot_sale = sp_hot_sale();
    $hot_view = sp_hot_view();
    $lst_categories = list_categories();
    $banners = banners();
    $sp_categories = sp_categories();
    client_render('page/home',[
        'hot_sale' => $hot_sale,
        'hot_view' => $hot_view,
        'banners' => $banners,
        'sp_categories' => $sp_categories,
        'lst_categories' => $lst_categories,
    ]);
}

function search_ajax() {
    $search = $_POST['keyword'];
    $query = "SELECT * FROM `products` WHERE `product_name` like '%$search%'";
    $result = executeQuery($query, true);
    $output = '';
    if($result){
        foreach($result as $item){
            $output .= '<li><a href="'.app_url('san-pham/'.$item['product_slug']).'">' . $item['product_name'] . '</a></li>';
        }
    }else{
        $output = '<li><a href="javascript:;">Không tìm thấy sản phẩm nào...</a></li>';
    }
    echo $output;
}
