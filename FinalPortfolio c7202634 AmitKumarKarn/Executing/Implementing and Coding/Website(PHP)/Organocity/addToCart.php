<?php
    include_once 'includes/dbconnection.inc.php';
    session_start();
    $db = new DB;      

    $product_id = $_GET['pid'];
    $cart_no = $_SESSION['user_id'];
    if(isset($_GET['quantity']))
        $quantity = $_GET['quantity'];
    else    
        $quantity = 0;
    

    $script1 = oci_parse($db->connect(), "SELECT * FROM PRODUCT_CART WHERE CART_NO = $cart_no");
    oci_execute($script1);

    
    echo $product_id." a ".$cart_no." b ".$quantity;
    $script2 = oci_parse($db->connect(), "INSERT INTO PRODUCT_CART (PRODUCT_ID, CART_NO, QUANTITY)
                                        VALUES ($product_id, $cart_no, $quantity)");
    oci_execute($script2);

    $_SESSION['cartadded'] = true;
    
    header("Location: ".$_SERVER['HTTP_REFERER']);


?>