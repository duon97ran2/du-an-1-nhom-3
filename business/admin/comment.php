<?php
// đếm số cmt của từng sp, chi tieest cmt 
function getCountCommentInProductBySlug()
{
    $sql = "SELECT COUNT(p.product_id) as 'so_luot_Bl' ,c.* FROM comments c
            JOIN products p ON c.product_id = p.product_id 
            JOIN users u ON u.user_id = c.user_id
            WHERE p.product_id = 9 ";
    
    return  executeQuery($sql, true);
}

// lấy all cmt
function AllCmt(){
    $sql = "SELECT * FROM comments";
    return executeQuery($sql,true);
}
// xoas
function removeComment(){

}

function cmt_index(){
    $amountCmt = getCountCommentInProductBySlug();
    $AllCmt = AllCmt();
    client_render('page/comment.php',[
        'page_title' => 'Trang chi tiết sản phẩm',
        'amountCmt' => $amountCmt,
        'allCmt' => $AllCmt
        
        [
        'customize/js/banner&comment/script.js'
         ]
    ]);
}
