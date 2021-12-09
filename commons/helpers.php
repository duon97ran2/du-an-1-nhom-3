<?php

function admin_render($viewpath, $data = [], $scripts = [], $styles = []){

    extract($data);
    $businessView = "./views/admin/" . $viewpath;
    include_once './views/admin/layouts/main.php';
}

function client_render($viewpath, $data = [], $scripts = []){ 
    extract($data);
    $businessView = "./views/client/" . $viewpath .".php";
    include_once './views/client/layouts/main.php';
}

// function  client_menu($data = [], $scripts = []){ 
//     extract($data);
//     include_once './views/homepage/layouts/main.php';
// }

function dd(){
    echo "<pre>";
    $args = func_get_args();
    foreach($args as $item){
        var_dump($item);
    }
    echo "</pre>";
    die;
}
// chuong create
function view_no_layout($viewpath, $data = []) {
    extract($data);
    include_once "./views/" . $viewpath . '.php';
}

// chuong create
function asset($path) {
    $path = ltrim($path, '/');
    return PUBLIC_ASSETS . $path;
}

// chuong create
function app_url($path = '') {
    $path = ltrim($path, '/');
    return BASE_URL . $path;
}
function admin_url($path = '') {
    $path = ltrim($path, '/');
    return ADMIN_URL . $path;
}

function nameSeparation($name)
{
    $name_arr = explode(" ", $name);
    $first_name = count($name_arr) > 1 ? array_pop($name_arr) : $name;
    $last_name = count($name_arr) > 1 ? implode(" ", $name_arr) : '';
    return [
        'first_name' => $first_name,
        'last_name' => $last_name
    ];
}
function error_page($page = '_404') {
    include_once "./views/errors/$page.php";
    die;
}

// chuong create 
function set_session($key, $value) {
    $_SESSION[$key] = $value;
}
function get_session($key) {
    return $_SESSION[$key] ?? false;
}
function remove_session($key) {
    unset($_SESSION[$key]);
}

// chuong create
function input_get($name) {
    return $_GET[$name] ?? '';
}
function input_post($name) {
    return $_POST[$name] ?? '';
}
function input_file($name) {
    return $_FILES[$name] ?? '';
}
// chuong create
function redirect($url) {
    header('Location: '. app_url($url));
    die;
}
function redirect_back() {
    header('Location: '. $_SERVER['HTTP_REFERER']);
    die;
}
function refresh_page() {
    header('Refresh: 0');
    die;
}
//chuong create
function set_errors($array = []) {
    set_session('errors', $array);
}
function print_errors($name) {
    return get_session('errors')[$name] ?? '';
}
function remove_errors() {
    remove_session('errors');
}
// chuong create
function auth_info() {
    $user_id = get_session('AUTH_ID');
    $sql = "SELECT * FROM users WHERE user_id = '$user_id'";
    $data = executeQuery($sql, false);
    return $data ?? [];
}
function cart_total() {
    $user_id = auth_info()['user_id'] ?? '';
    $sql = "SELECT * FROM shopping_carts WHERE user_id = '$user_id' AND is_buy = 0";
    $cart_item = executeQuery($sql, true);
    return count($cart_item) ?? 0;
}
function is_login_for_auth_page() {
    if (get_session('AUTH_ID')) {
        redirect('/');
    }
}
function is_admin() {
    $user = auth_info();
    if (!empty($user)) {
        if (strtolower($user['role']) != 'admin') {
            error_page();
        }
    } else {
        error_page();
    }
}
// chuong create 
function upload_image($file = [], $folder = '')
{
    $assets_path = DIR_ROOT . '/public/uploads/';
    $folder = empty($folder) ? '' : $folder.'/' ;
    if (!is_dir($assets_path.$folder))
    {
        mkdir($assets_path.$folder, 0755, true);
    }
    $file_name = $folder . uniqid() . '-' . rand() . date('YmdHis') . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
    if (move_uploaded_file($file['tmp_name'], $assets_path.$file_name))
    {
        return $file_name;
    }
    return false;
}

function option_info($key = '') {
    $sql = "SELECT * FROM options";
    $option = executeQuery($sql, false);
    return $option[$key] ?? $option;
}

function is_maintenance() {
    $option = option_info();
    if (!empty($option)) {
        if ($option['is_maintenance'] == 1) {
            error_page('_maintenance');
        }
    }
}
// chuong create
function priceVND($price)
{
    return number_format($price, 0, '', '.')." ₫";
}

function find_user_by_email($email) {
    $sql = "SELECT * FROM users WHERE email = '$email'";
    return executeQuery($sql, false);
}

function menu_page() {
    $sql = "SELECT * FROM categories WHERE is_menu = 1 ORDER BY category_index ASC;";
    return executeQuery($sql, true) ?? [];
}

function brand_page() {
    $sql = "SELECT * FROM brands";
    return executeQuery($sql, true) ?? [];
}
function product_most_view() {
    $sql = "SELECT * FROM products WHERE product_views > 0 AND product_status = 1 AND is_delete = 0 ORDER BY product_views DESC LIMIT 10";
    return executeQuery($sql,false);
}
function discount_price($price, $percent) {
    $money = $price - ($price * ($percent / 100));
    return priceVND($money);
}

function price_minus_discount($price, $percent) {
    $new_money = $price - ($price * ($percent / 100));
    return priceVND($price - $new_money);
}

?>
