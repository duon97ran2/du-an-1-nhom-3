<?php
    function comment_page_admin(){
        $sql = "SELECT products.*, users.*, count(comments.comment_id) as 'so_cmt' FROM comments
                join products on comments.product_id = products.product_id
                join users on users.user_id	= comments.user_id
                group by products.product_id 
                having so_cmt > 0";

        $cmt = executeQuery($sql,true);        
        admin_render('comment/list_comment.php', [
            'cmt' => $cmt],
             [
            'customize/js/banner&comment/script.js'
             ]);
     }

    function detail_cmt_admin(){
        $product_id = $_GET['product_id'];
        $sql = "SELECT c.*, p.product_name,u.* 
                FROM comments c JOIN products p ON p.product_id = c.product_id
                JOIN users u ON u.user_id = c.user_id 
                WHERE c.product_id = $product_id ";

        $cmt_detail = executeQuery($sql,true);
        
        admin_render('comment/detail_cmt.php',[
            'cmt_detail' =>  $cmt_detail,
            'page_title' => 'trang cmt'],
            [
            'customize/js/banner&comment/script.js'
            ]
        );  

    }

    function remove_comment_admin(){
        $comment_id = $_GET['comment_id'];
        $sql = "DELETE FROM comments WHERE comment_id = $comment_id";
        executeQuery($sql,false);
        set_session('message', 'xoa comment thành công');
        redirect('cp-admin/comment');
    }

    function reply_comment(){
        extract($_REQUEST);
        var_dump($_REQUEST);
        $sql = "UPDATE comments SET comment_author = '$comment_author' WHERE comment_id = '$comment_id'";
        executeQuery($sql);
        set_session('message', 'Rep Thành công');
        redirect('cp-admin/comment/chi-tiet');
    }
 
    
  



    // ----------------------cilent-----------------------------------------------------

    function get_product_by_slug($slug) {
        $product_sql = "SELECT * FROM products WHERE product_slug = '$slug'";
        return executeQuery($product_sql, false);
    }
    
    function get_detail_comment(){
        $sql = "SELECT products.*, users.*, comments.*, count(comments.comment_id) as 'so_cmt' FROM comments
                join products on comments.product_id = products.product_id
                join users on users.user_id	= comments.user_id 
                group by products.product_id 
                having so_cmt > 0 
           
                ";
        $comment = executeQuery($sql,true); 
        view_no_layout('comment',[
            'comment' => $comment
        ]);

    }

    function get_all_cmt(){
        $sql = "SELECT * FROM comments JOIN products ON products.product_id = comments.product_id WHERE ";
        executeQuery($sql,true);

    }
    




 
    
  

