<?php

function sp_hot_sale(){
    $sql = "SELECT * FROM products WHERE product_hot = 1 AND product_status = 1 AND product_discount > 0 AND is_delete = 0 LIMIT 10";
    return executeQuery($sql,true);
}
function sp_categories($cate_slug){
    $sql = "SELECT P.*, 
                C.category_name as cate_child_name, C.category_id as cate_child_id, C.category_slug as cate_child_slug, 
                CP.category_name as cate_parent_name, CP.category_id as cate_parent_id, CP.category_slug as cate_parent_slug
            FROM products P
            LEFT JOIN categories C ON C.category_id = P.category_id
            LEFT JOIN categories CP ON CP.category_id = C.parent_id
            WHERE CP.category_slug = '$cate_slug' AND P.is_delete = 0 LIMIT 8";
    return executeQuery($sql,true);
}
function sp_hot_view(){
    $sql = "SELECT * FROM products WHERE product_views > 0 AND product_status = 1 AND is_delete = 0 ORDER BY product_views DESC LIMIT 10";
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
    client_render('page/home',[
        'hot_sale' => $hot_sale,
        'hot_view' => $hot_view,
        'banners' => $banners,
        'lst_categories' => $lst_categories,
    ]);
}
    // function sp_hot(){
    //     $sql = "SELECT * FROM products WHERE product_hot = 1 AND product_status = 1 AND product_discount > 0 LIMIT 8";
    //     return executeQuery( $sql,true);
    // }
    // function sp_categories(){
    //     $sql = "SELECT * FROM products WHERE category_id=14 AND product_status = 1 LIMIT 8";
    //     return executeQuery( $sql,true);
    // }

    // function hot_views(){
    //     $sql = "SELECT *
    //             FROM  products p
    //             JOIN categories c
    //             ON p.category_id = c.category_id
    //             WHERE p.product_views > 1 AND p.product_status = 1
    //             GROUP BY p.product_price DESC 
    //             LIMIT 8
    //             ";
    //     return executeQuery( $sql,true);

    // }

    // function get_cate_img() {
    //     $sql = "SELECT * FROM categories WHERE is_parent = 0";
    //     return  executeQuery( $sql,true);
        
    // }


    // function showBanner() {
    //     $sql ="SELECT * FROM banners order by banner_index asc ";
    //     return  executeQuery( $sql,true);

    // }

    function list_price(){
        $sql = "SELECT product_price FROM products order by product_price ASC";
        $result =  executeQuery( $sql,true);
        return $result;
    }

    

    function search_product_by_price($from_price, $to_price, $category_id){

        $sql = "select * from products p left join categories c on p.category_id = c.category_id
                where p.product_price >= $from_price
                AND p.product_price <= $to_price and c.category_id = $category_id and P.product_status = 1";
        return  executeQuery($sql,true);
    }

    function client_header(){
        $sql_allCate = "SELECT category_name, category_id FROM  categories";
        $allCategories = executeQuery($sql_allCate,true);
        
        $sql = "SELECT logo FROM options"; 
        $logo = executeQuery($sql, false);

        $sql_brand = "SELECT * FROM brands";
        $list_brand= executeQuery($sql_brand,true);

        if(isset($_GET['from_price']) && isset($_GET['to_price']) && isset($_GET['category_id'])){
            $products = search_product_by_price(intval($_GET['from_price']), intval($_GET['to_price']), intval($_GET['category_id']));
        }else {
            $sql_products = "SELECT * FROM products p JOIN categories c ON p.category_id  = c.category_id";
            $products = executeQuery($sql_products,true);
        }
        
        $list_price = list_price();

        return [
            'logo' => $logo[0],
            'list_brand' => $list_brand,
            'products' => $products, 
            'allCategories' => $allCategories,
            'list_price' => $list_price,
        ];
    }

    // function index() {

    //     $menu = client_header();

    //     $hot_sale = sp_hot();
    //     $hot_view = hot_views();
    //     $cate_img = get_cate_img();
    //     $banner = showBanner();
    //     $sp_cate = sp_categories();
    //     client_render('page/home',[
    //         'logo' => $menu['logo'],
    //         'list_brand' => $menu['list_brand'],
    //         'products' => $menu['products'], 
    //         'allCategories' => $menu['allCategories'],
    //         'list_price' => $menu['list_price'],
    //         'hot_sale' => $hot_sale,
    //         'hot_view' => $hot_view,
    //         'cate_img' => $cate_img,
    //         'banner' => $banner,
    //         'sp_cate' => $sp_cate,
    //     ]);
    
    // }
    
    // function search_ajax() {
    //     $search = $_POST['keyword'];
    //     $query = "SELECT * FROM `products` WHERE `product_name` like '%$search%'";
    //     $result = executeQuery($query, true);
    //     $output = '';
    //     if($result){
    //         foreach($result as $item){
    //             $output .= '
    //             <div class="p-2 border-bottom">
    //                 <a href="sanpham.php?product_id=' . $item['product_id'] . '">
    //                     <div class="product_search_item d-flex align-items-center">
    //                         <img style=" width: 100px;font-weight:400px" src="'.asset('uploads/'). $item['product_image'].'" alt="sp tim thay">
    //                         <div>
    //                             <p class="text-uppercase">' . $item['product_name'] . '- ' . $item['category_id'] . '</p>
    //                             <p style="color:#000">' . priceVND($item['product_price']) . 'đ</p>
    //                         </div>
    //                     </div>
    //                 </a>
    //             </div>';
    //         }
    //     }else{
    //         $output = '<div class="alert alert-danger w-100" role="alert">
    //             không tìm thấy sản phẩm nào!!!
    //         </div>';
    //     }
    //     echo $output;
    // }
    
function search_ajax() {
    $search = $_POST['keyword'];
    $query = "SELECT * FROM products WHERE product_name LIKE '%$search%' AND is_delete = 0";
    $result = executeQuery($query, true);
    $output = '';
    if($result){
        foreach($result as $key => $item){
            if ($key < 5) {
                $output .= '<li><a href="'.app_url('san-pham/'.$item['product_slug']).'">' . $item['product_name'] . '</a></li>';
            } else {
                continue;
            }
        }
    }else{
        $output = '<li><a href="javascript:;">Không tìm thấy sản phẩm nào...</a></li>';
    }

    if (count($result) > 5) {
        $count_result = count($result) - 5;
        $output .= '<li><a href="'.app_url('tim-kiem?keyword='.$search).'">Xem thêm '.$count_result.' kết quả khác</a></li>';
    }
    echo $output;
}
