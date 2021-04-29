<?php
    session_start();
    include_once 'dbconnection.inc.php';
    $description = filter_var ( $_POST['review'], FILTER_SANITIZE_STRING);
    $user = $_SESSION['user_id'];
    $stars = $_POST['stars'];
    $product_id = $_POST['product_id'];
    $_SESSION['reviewPosted'] = false;
    $m = date("m");
    $d = date("d");
    $y = date("yy");
    //$cdate = TO_DATE("$m / $d /$y", "m/d/yy");

    $db = new DB;
    $query = "INSERT INTO REVIEW (REVIEW_DATE, RATING, REVIEW_DESCRIPTION, PRODUCT_ID, USER_ID) 
                VALUES ( trunc(sysdate), $stars, '$description', $product_id, $user) ";
    $script = oci_parse($db->connect(), "INSERT INTO REVIEW (REVIEW_DATE, RATING, REVIEW_DESCRIPTION, PRODUCT_ID, USER_ID) 
    VALUES ( trunc(sysdate), $stars, '$description', $product_id, $user) " );
    $result = oci_execute($script);
    if($result)
    {
        $_SESSION['reviewPosted'] = true;
    }
    header('Location: '. $_SERVER['HTTP_REFERER']);

?>