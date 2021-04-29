<?php
    include 'includes/dbconnection.inc.php';
    $db = new DB;

    $cart_no = $_GET['uid'];
    $script = oci_parse($db->connect(), "DELETE FROM PRODUCT_CART WHERE CART_NO = $cart_no");
    oci_execute($script);
    header('Location: cart.php');
?>