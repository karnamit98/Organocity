<?php
    include_once 'includes/dbconnection.inc.php';
        $db = new DB;
        $user_id = $_GET['uid'];
        
        //Retrieve cart number of the user
        $statement = oci_parse($db->connect(), "SELECT CART_NO FROM CART WHERE USER_ID = $user_id");
        $deleted2 = oci_execute($statement);
        //Checking if there's any product present in the cart
        $cartStatus = oci_fetch_array($statement);
        if($cartStatus >= 1)
        {
            while($row = oci_fetch_assoc($statement))
            {
                $cart_no = $row['CART_NO'];
                //Delete products from the user's cart
                $query1 = oci_parse($db->connect(), "DELETE FROM PRODUCT_CART WHERE CART_NO = $cart_no");
                $deleted1 = oci_execute($query1);
            }
        }
        
        //Delete user's cart
        $query = oci_parse($db->connect(), "DELETE FROM CART WHERE USER_ID = $user_id");
        $deleted = oci_execute($query);
        
        //Delete user's review
        $query2 = oci_parse($db->connect(), "DELETE FROM REVIEW WHERE USER_ID = $user_id");
        $deleted2 = oci_execute($query2);

        //Delete user's orders
        $query3 = oci_parse($db->connect(), "DELETE FROM ORDERS WHERE USER_ID = $user_id");
        $deleted3 = oci_execute($query3);

        //Delete user's orders
        $query4 = oci_parse($db->connect(), "DELETE FROM PAYMENT WHERE USER_ID = $user_id");
        $deleted4 = oci_execute($query4);

        
        //Delete User
        $query5 = oci_parse($db->connect(), "DELETE FROM USERS WHERE USER_ID = $user_id");
        $deleted5 = oci_execute($query5);

        if($deleted5)
        {
            ?>
                <script>
                    alert("----!!ACCOUNT DELETED SUCCESSFULLY!!----");
                    window.location = "../logout.php";
                </script>
            <?php
        }
        else
        {
            ?>
                <script>
                    alert("----!!ACCOUNT COULDN'T BE DELETED!!----");
                </script>
            <?php
        }
?>