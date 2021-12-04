<?php
function comment_page_admin()
{
    $sql = "SELECT products.*, users.*, count(comments.comment_id) as 'so_cmt' FROM comments
                join products on comments.product_id = products.product_id
                join users on users.user_id	= comments.user_id
                group by products.product_id 
                having so_cmt > 0";

    $cmt = executeQuery($sql, true);
    admin_render(
        'comment/list_comment.php',
        [
            'cmt' => $cmt
        ],
        [
            'customize/js/banner&comment/script.js'
        ]
    );
}

function detail_cmt_admin()
{
    $product_id = $_GET['product_id'];
    $sql = "SELECT c.*, p.product_name,u.* 
                FROM comments c JOIN products p ON p.product_id = c.product_id
                JOIN users u ON u.user_id = c.user_id 
                WHERE c.product_id = $product_id ";

    $cmt_detail = executeQuery($sql, true);

    admin_render(
        'comment/detail_cmt.php',
        [
            'cmt_detail' =>  $cmt_detail,
            'page_title' => 'trang cmt'
        ],
        [
            'customize/js/banner&comment/script.js'
        ]
    );
}

function remove_comment_admin()
{
    $comment_id = $_GET['comment_id'];
    $sql = "DELETE FROM comments WHERE comment_id = $comment_id";
    executeQuery($sql, false);
    set_session('message', 'xoa comment thành công');
    redirect('cp-admin/comment');
}

function reply_comment()
{
    extract($_REQUEST);
    var_dump($_REQUEST);
    $sql = "UPDATE comments SET comment_author = '$comment_author' WHERE comment_id = '$comment_id'";
    executeQuery($sql);
    set_session('message', 'Rep Thành công');
    redirect('cp-admin/comment/chi-tiet');
}

// ----------------------cilent-----------------------------------------------------

function get_product_by_slug($slug)
{
    $product_sql = "SELECT * FROM products WHERE product_slug = '$slug'";
    return executeQuery($product_sql, false);
}

function get_product_variant_by_slug($slug)
{
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
                        if ($variant['product_variant_slug'] == $color) {
                            $product_default = $variant;
                            $flag = true;
                        } else {
                            $flag = false;
                        }
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
    $gifts=get_gifts();
    view_no_layout('comment', [
        'page_title' => $product_default['product_name'],
        'product_default' => $product_default,
        'product_variant' => $product_variant,
        'product_configuration' => $product_configuration,
        'gifts' => $gifts,
    ],[
        'customize/js/add-to-cart.js',
        'customize/js/add-to-wishlist.js',
    ]);
}
function get_detail_comment()
{
    
    $sql = "SELECT products.product_id, products.product_name, users.*, comments.*, count(comments.comment_id) as 'so_cmt' FROM comments
                join products on comments.product_id = products.product_id
                join users on users.user_id	= comments.user_id 
                where comments.product_id = 17
                group by products.product_id 
                having so_cmt > 0";
    $comment = executeQuery($sql, true);
    view_no_layout('comment', [
        'comment' => $comment
    ]);
}



function insertCmt()
{
        $error = [];
        if (empty($product_default)) {
            error_page();
        }
        $user_id = $_POST['user_id'];
        $product_id = $_POST['product_id'];
        $comment_content = $_POST['comment_content'];
        $sql = "INSERT INTO comments(comment_content,user_id,product_id) VALUES('$comment_content',$user_id,$product_id) ";
        executeQuery($sql, true);
        set_session('message', 'Bình luận Thành công');
        refresh_page();
    
}
