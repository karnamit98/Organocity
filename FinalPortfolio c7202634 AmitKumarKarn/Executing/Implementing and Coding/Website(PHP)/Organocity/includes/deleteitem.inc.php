<?php
    include 'dbconnection.inc.php';
    session_start();
    $db = new DB;
    $_SESSION['itemdeleted'] = false;
    $product_id = $_GET['pid'];
    $script = oci_parse($db->connect(), "DELETE FROM PRODUCT_CART WHERE PRODUCT_ID = $product_id");

    oci_execute($script);
    $_SESSION['itemdeleted'] = true;
    header('Location: '. $_SERVER['HTTP_REFERER']);

?>