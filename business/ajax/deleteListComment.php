<?php
    $list = $_POST['list'];
    $sql = "DELETE FROM comments where comment_id in($list)";
     executeQuery($sql,true)
?>