<?php
    date_default_timezone_set('Asia/Kathmandu');
    $time = date('G');
    $day = date('w');
    //echo $time." and ".$day;

    //For Wednesday
    if($day == 3)
    {
        if($time >= 10  && $time < 13 )
        {
            $script = oci_parse($db->connect(), "UPDATE COLLECTION_SLOT SET 
            NEXT_WEEK_ORDERS = THIS_WEEK_ORDERS, 
            THIS_WEEK_ORDERS = 0 WHERE SLOT_NO = 1");
            oci_execute($script);
        }
        if($time >= 13 && $time < 16)
        {
            $script = oci_parse($db->connect(), "UPDATE COLLECTION_SLOT SET 
            NEXT_WEEK_ORDERS = THIS_WEEK_ORDERS, 
            THIS_WEEK_ORDERS = 0 WHERE SLOT_NO = 2");
            oci_execute($script);
        }

            if($time >= 16 && $time < 19)
            {
            $script = oci_parse($db->connect(), "UPDATE COLLECTION_SLOT SET 
            NEXT_WEEK_ORDERS = THIS_WEEK_ORDERS, 
            THIS_WEEK_ORDERS = 0 WHERE SLOT_NO = 3 ");
            oci_execute($script);
        }
    }

    //For Thrusday
    if($day == 4)
    {
        if($time >= 10  && $time < 13 )
        {
            $script = oci_parse($db->connect(), "UPDATE COLLECTION_SLOT SET 
            NEXT_WEEK_ORDERS = THIS_WEEK_ORDERS, 
            THIS_WEEK_ORDERS = 0 WHERE SLOT_NO = 4");
            oci_execute($script);
        }
        if($time >= 13 && $time < 16)
        {
            $script = oci_parse($db->connect(), "UPDATE COLLECTION_SLOT SET 
            NEXT_WEEK_ORDERS = THIS_WEEK_ORDERS, 
            THIS_WEEK_ORDERS = 0 WHERE SLOT_NO = 5");
            oci_execute($script);
        }

            if($time >= 16 && $time < 19)
            {
            $script = oci_parse($db->connect(), "UPDATE COLLECTION_SLOT SET 
            NEXT_WEEK_ORDERS = THIS_WEEK_ORDERS, 
            THIS_WEEK_ORDERS = 0 WHERE SLOT_NO = 6 ");
            oci_execute($script);
        }
    }


    //For Friday
    if($day == 5)
    {
        if($time >= 10  && $time < 13 )
        {
            $script = oci_parse($db->connect(), "UPDATE COLLECTION_SLOT SET 
            NEXT_WEEK_ORDERS = THIS_WEEK_ORDERS, 
            THIS_WEEK_ORDERS = 0 WHERE SLOT_NO = 7");
            oci_execute($script);
        }
        if($time >= 13 && $time < 16)
        {
            $script = oci_parse($db->connect(), "UPDATE COLLECTION_SLOT SET 
            NEXT_WEEK_ORDERS = THIS_WEEK_ORDERS, 
            THIS_WEEK_ORDERS = 0 WHERE SLOT_NO = 8");
            oci_execute($script);
        }

            if($time >= 16 && $time < 19)
            {
            $script = oci_parse($db->connect(), "UPDATE COLLECTION_SLOT SET 
            NEXT_WEEK_ORDERS = THIS_WEEK_ORDERS, 
            THIS_WEEK_ORDERS = 0 WHERE SLOT_NO = 9 ");
            oci_execute($script);
        }
    }
    


?>