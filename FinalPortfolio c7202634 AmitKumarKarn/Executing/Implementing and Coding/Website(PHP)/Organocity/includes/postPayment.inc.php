<?php
    //include_once 'includes/dbconnection.inc.php';

    class POSTPAYMENT extends DB {

        public $payment_id;
        public $invoicenum;

        /** 
        * Insert into payment table after successful transaction through paypal 
        * Returns the payment id that was just inserted to be used in order id later
        */
        function insertPayment()
        {
            $uid = $_SESSION['user_id'];
            $amt = $_SESSION['payment_amount'];
            $script = oci_parse($this->connect(), "INSERT INTO PAYMENT (PAYMENT_STATUS, PAYMENT_TYPE, PAYMENT_DATE_TIME, PAYMENT_AMOUNT, USER_ID)
                                VALUES ('Paid', 'Online/Paypal', CURRENT_TIMESTAMP , $amt, $uid) 
                                returning PAYMENT_ID into :id");
            OCIBindByName($script,":id",$id);
            oci_execute($script);
            //echo "PAYID: $id";
            $this->payment_id = $id;
        }

        /**
        * If in case the user doesn't comes back convantionally from paypal's api to the payment success
        */
        function destroyPaymentSession()
        {
            unset($_SESSION['payment_amount']);
        }

         /**
         * Clear Temp Checkout table for a particular user when he enters the confirm checkout page
         */
        function clearTempCheckout($uid)
        {
            $script = oci_parse($this->connect(), "DELETE FROM TEMP_CHECKOUT WHERE USER_ID = $uid");
            oci_execute($script);
        }

        /**
        * Insert checkout cart data to this temp checkout table while payment is in progress and after payment store it in the original database
        * This will actually take place pre payment
        */
        function insertTempCheckout($temp_id, $product_id, $product_img, $product_name, $unit_price, $product_quantity, $subtotal, $user_id)
        {   //echo "$temp_id, $product_id, '$product_img', '$product_name', $unit_price, $product_quantity, $subtotal, $user_id";
            $script = oci_parse($this->connect(), "INSERT INTO TEMP_CHECKOUT (TEMP_ID, PRODUCT_ID, PRODUCT_IMG, 
                        PRODUCT_NAME, UNIT_PRICE, PRODUCT_QUANTITY, SUB_TOTAL, USER_ID) 
                        VALUES ($temp_id, $product_id, '$product_img', '$product_name', $unit_price, $product_quantity, $subtotal, $user_id)");
            oci_execute($script);
        }

       
        /**
        * Insert data into the orders table
        * Return the recently inserted invoice no
        */
        function insertOrder($user_id)
        {
            $payment_id = $this->payment_id;
            $script = oci_parse($this->connect(), "INSERT INTO ORDERS (ORDER_DATE, USER_ID, 
                        PAYMENT_ID) 
                        VALUES (CURRENT_TIMESTAMP, $user_id, $payment_id)
                        returning INVOICE_NO into :id");
            OCIBindByName($script,":id",$id);
            oci_execute($script);
            $this->invoicenum = $id;
            $_SESSION['invoice_no'] = $id;
        } 


        /**
        * After payment the content in Temp Checkout table is transferred to Order Details 
        * Returns order id that was just inserted to be used in order table details
        */
        function insertOrderDetails($user_id)
        {
            $invoice_no = $this->invoicenum; 
            //fetch order details from temp checkout table of the same user
            $query = oci_parse($this->connect(), "SELECT * FROM TEMP_CHECKOUT WHERE USER_ID = $user_id");
            oci_execute($query);
            while($row = oci_fetch_assoc($query))
            {
                $product_id = $row['PRODUCT_ID'];
                $product_img = $row['PRODUCT_IMG'];
                $product_name = $row['PRODUCT_NAME'];
                $unit_price = $row['UNIT_PRICE'];
                $product_quantity = $row['PRODUCT_QUANTITY'];
                $subtotal = $row['SUB_TOTAL'];
                $script = oci_parse($this->connect(), "INSERT INTO ORDER_DETAILS ( INVOICE_NO, PRODUCT_ID, PRODUCT_IMG,
                PRODUCT_NAME, UNIT_PRICE, PRODUCT_QUANTITY, SUB_TOTAL) 
                VALUES ($invoice_no, $product_id, '$product_img', '$product_name', $unit_price, $product_quantity, $subtotal)");
                oci_execute($script);
                $this->updateProductQuantity($product_id, $product_quantity);

            }

            //Empty the temp table
            $qry = oci_parse($this->connect(), "DELETE FROM TEMP_CHECKOUT WHERE USER_ID = $user_id");
            oci_execute($qry);
        } 

        /**
         * Update the quantity of purchased product in product table
         */
        function updateProductQuantity($product_id, $reduced_quantity)
        {
            $qry = oci_parse($this->connect(), "SELECT STOCK_AVAILABLE FROM PRODUCT WHERE PRODUCT_ID = $product_id");
            oci_execute($qry);
            while($row = oci_fetch_assoc($qry))
            {
                $original_quantity = $row['STOCK_AVAILABLE'];
                $new_quantity = $original_quantity - $reduced_quantity;
                $scrpt = oci_parse($this->connect(), "UPDATE PRODUCT SET STOCK_AVAILABLE = $new_quantity WHERE PRODUCT_ID = $product_id");
                oci_execute($scrpt);
            }
        }


        /**
        * Update order details with collection slot details
        */
        function updateOrder( $slot_no)
        {
            //$invoice_no = $this->invoicenum;
            $invoice_no = $_SESSION['invoice_no'];
            //split the '1a' formatted slot number to number and character and store it in array
            $arr = preg_split('/(?<=[0-9])(?=[a-z]+)/i',$slot_no);                                                                                                                                                             
            $slotnum = $arr[0];
            $slot_date_code = $arr[1];

            //determine the day of collection
            $collectionDay = 0;
            if($slotnum == 1 || $slotnum == 2 || $slotnum == 3)
                $collectionDay = 3;
            else if($slotnum == 4 || $slotnum == 5 || $slotnum == 6)
                $collectionDay = 4;
            else if($slotnum == 7 || $slotnum == 8 || $slotnum == 9)
                $collectionDay = 5;
            else {}

            if($slot_date_code == 'b')
            {
                $daysInterval = $collectionDay - date('w');
                $script = oci_parse($this->connect(), "UPDATE ORDERS SET SLOT_NO = $slotnum, 
                COLLECTION_DATE = trunc(SYSDATE+$daysInterval) WHERE INVOICE_NO = $invoice_no" );
                oci_execute($script);
                $script1 = oci_parse($this->connect(), "UPDATE COLLECTION_SLOT 
                                                        SET THIS_WEEK_ORDERS = THIS_WEEK_ORDERS + 1
                                                         WHERE SLOT_NO = $slotnum");
                oci_execute($script1);
            }
            else if($slot_date_code == 'c')
            {
                $daysInterval = $this->slotDaysInterval($collectionDay);
                $script = oci_parse($this->connect(), "UPDATE ORDERS SET SLOT_NO = $slotnum, 
                    COLLECTION_DATE = trunc(SYSDATE+$daysInterval) WHERE INVOICE_NO = $invoice_no");
                oci_execute($script);
                $script1 = oci_parse($this->connect(), "UPDATE COLLECTION_SLOT 
                                                    SET NEXT_WEEK_ORDERS = NEXT_WEEK_ORDERS + 1
                                                    WHERE SLOT_NO = $slotnum");
                oci_execute($script1);
                
            }
            else{

            }   
        } 

        /**
         * Slot days interval calculations
         */
        function slotDaysInterval($slotDay)
        {
            $currDay = date('w');
            if($slotDay > $currDay)
            {
                $diff = $slotDay - $currDay;
                return ($diff + 7);         //days to collection day
            }
            else if($slotDay < $currDay)
            {
                $diff = $currDay - $slotDay;
                return (7 - $diff);         //days to collection day
            }
            else{
                return 7;
            }
        }

    }


?>