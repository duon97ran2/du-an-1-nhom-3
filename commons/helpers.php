<?php

function admin_render($viewpath, $data = []){

    extract($data);
    $businessView = "./views/admin/" . $viewpath;
    include_once './views/admin/layouts/main.php';
}

function dd(){
    echo "<pre>";
    $args = func_get_args();
    foreach($args as $item){
        print_r($item);
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
    return $_GET[$name];
}
function input_post($name) {
    return $_POST[$name];
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
?>