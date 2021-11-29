<?php

function get_connect(){
    $connect = new PDO("mysql:host=127.0.0.1;dbname=poly_mobile;charset=utf8", "root", "");
    return $connect; 
}
//
function executeQuery($sql, $getAll = true){ //getAll  = true thì lấy tất cả dự liệu ra, còn false thì chỉ lấy 1 cái
    $connect = get_connect(); // tạo kết nối với db
    $stmt = $connect->prepare($sql); //chuẩn bị 
    $stmt->execute(); //thực thi
    $data = $stmt->fetchAll(); // lấy tất cả
    if($getAll){ 
        return $data;
    }else{
        if(count($data) > 0){
            return $data[0];
        }
    }
}


?>