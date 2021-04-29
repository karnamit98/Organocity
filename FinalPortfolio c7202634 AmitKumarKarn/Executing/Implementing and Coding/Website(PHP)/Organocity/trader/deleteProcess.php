<?php
    include '../includes/check_session.inc.php';
    include_once '../includes/dbconnection.inc.php';
    include_once 'includes/trader.class.php';
        $trader = new TRADER;
        $user_id = $_GET['uid'];

        
        //DELETE ALL THE PRODUCTS IN THE SHOP AS WELL AS THE SHOP ASSOCIATED WITH THE TRADER
        $st1 = oci_parse($trader->connect(), "SELECT * FROM SHOP WHERE TRADER_ID = $user_id");
        oci_execute($st1);
        while($row1 = oci_fetch_assoc($st1))
        {
            $shopID = $row1['SHOP_ID'];
            $st2 = oci_parse($trader->connect(),"SELECT * FROM PRODUCT WHERE SHOP_ID = $shopID");
            oci_execute($st2);
            while($row2 = oci_fetch_assoc($st2))
            {
                $pid = $row2['PRODUCT_ID'];
                $trader->deleteProduct($pid);

            }
        }
        $st2 = oci_parse($trader->connect(), "DELETE FROM SHOP WHERE TRADER_ID = $user_id");
        oci_execute($st2);

        //Retrieve cart number of the user
        echo "uid : ".$user_id;
        $st3 = oci_parse($trader->connect(), "SELECT CART_NO FROM CART WHERE USER_ID = $user_id");
        $deleted2 = oci_execute($st3);
        //Checking if there's any product present in the cart
        $cartStatus = oci_fetch_array($st3);
        if($cartStatus >= 1)
        {
            while($row = oci_fetch_assoc($st3))
            {
                $cart_no = $row['CART_NO'];
                //Delete products from the user's cart
                $query1 = oci_parse($trader->connect(), "DELETE FROM PRODUCT_CART WHERE CART_NO = $cart_no");
                $deleted1 = oci_execute($query1);
            }
        }
        
        //Delete user's cart
        $query = oci_parse($trader->connect(), "DELETE FROM CART WHERE USER_ID = $user_id");
        $deleted = oci_execute($query);
        
        //Delete user's review
        $query2 = oci_parse($trader->connect(), "DELETE FROM REVIEW WHERE USER_ID = $user_id");
        $deleted2 = oci_execute($query2);

        //Delete user's orders
        $query3 = oci_parse($trader->connect(), "DELETE FROM ORDERS WHERE USER_ID = $user_id");
        $deleted3 = oci_execute($query3);

        //Delete user's orders
        $query4 = oci_parse($trader->connect(), "DELETE FROM PAYMENT WHERE USER_ID = $user_id");
        $deleted4 = oci_execute($query4);
        
        //Delete user's temp_checkout
        $query6 = oci_parse($trader->connect(), "DELETE FROM TEMP_CHECKOUT WHERE USER_ID = $user_id");
        $deleted6 = oci_execute($query6);

        //Delete User
        $query5 = oci_parse($trader->connect(), "DELETE FROM USERS WHERE USER_ID = $user_id");
        $deleted5 = oci_execute($query5);

        if($deleted5)
        {
            ?>
                <script>
                    alert("----!!TRADER ACCOUNT DELETED SUCCESSFULLY!!----");
                    window.location = "../logout.php";
                </script>
            <?php
        }
        else
        {
            ?>
                <script>
                    alert("----!!TRADER ACCOUNT COULDN'T BE DELETED!!----");
                    //window.location = "myProfile.php";
                </script>
            <?php
        }
?>