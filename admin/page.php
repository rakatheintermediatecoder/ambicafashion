<?php
    $pageid = $_REQUEST['pid'];
    //$gender = $_REQUEST['g'];

    if($pageid == 'upload'){
        include 'page/upload.php';
    } else if($pageid == 'inquery'){
        include './page/inquery.php';
    }
?>