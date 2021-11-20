<?php

function admin_render($viewpath, $data = [], $jsFiles = []){

    extract($data);
    $businessView = "./views/admin/" . $viewpath;
    include_once './views/admin/layouts/main.php';
}

function dd(){
    echo "<pre>";
    $args = func_get_args();
    foreach($args as $item){
        var_dump($item);
    }
    
    echo "</pre>";
    die;
}
?>