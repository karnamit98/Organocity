<?php 
    

    $itemid = $_GET['pid'];
    $reapeat = false;
    if(isset($_COOKIE['tempCart']))
    {
        foreach($_COOKIE['tempCart'] as $key => $value)
        {
            if($itemid == $value)
            {
                $repeat = true;
            }
        }
    }
    
    if(!$repeat){
        setCookie("tempCart[$itemid]", $itemid, time()+(60*60), "/");
        $_SESSION['cartadded'] = true;
    }
    
    header ('Location: '. $_SERVER['HTTP_REFERER']);

?>