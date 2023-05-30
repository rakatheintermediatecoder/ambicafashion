<?php
    $pageid = $_REQUEST['pid'];
   // $gender = $_REQUEST['g'];

    if($pageid == 'about'){
        include './page/about.php';
    } else if($pageid == 'shop'){
        include './page/shop.php';
    } else if ($pageid == 'contact'){
        include './contact/contact.php';
    }
?>