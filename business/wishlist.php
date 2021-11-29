<?php
function shopping_wishlist(){
    $user_id = auth_info()['user_id'] ?? '';
    $sql = "select wishlists.wishlist_id, users.name, products.product_name, products.product_slug,categories.category_name,brands.brand_name 
    from wishlists
        left join users on wishlists.user_id = users.$user_id
        left join products on products.product_id = wishlists.product_id
        left join categories on categories.category_id = products .category_id
        left join brands on brands.brand_id = products .brand_id;";

$wishlists = executeQuery($sql, true);
view_no_layout('shopping-wishlist', [
    'wishlists' => $wishlists,
]);
}

function add_to_wishlist()
{
    $errors = '';
    $user_id = auth_info()['user_id'] ?? '';
    $product_id = input_post('product_id');
   

    if (empty($user_id)) {
        $errors = 'Vui long dang nhap';
    } else if (empty($product_id)) {
        $errors = 'Vui long chon san pham';
    } 
}

function remove_item_wishlist(){
    $id = input_get('id');
    $sql = "DELETE FROM wishlists WHERE wishlist_id = $id";
    executeQuery($sql);
    redirect_back();
}
?>