<?php
     //$_SESSION['updateerror'] = false;
     $_SESSION['duplicateemail'] = $_SESSION['duplicateusername'] = $_SESSION['invalidcontact'] = "";
     $_SESSION['wrongpassword'] =  $_SESSION['invalidpassword'] =  $_SESSION['passworddifferent'] = "";
 
    class TRADER extends DB {

        public $username;
        public $user_type;
        public $added_by;
        public $fullname;
        public $user_image;
        public $user_contact;
        public $user_email;
        public $password;
        public $shop_id = array();
        public $shop_name = array();
        public $shop_location = array();

        public function __construct()
        { 
            $trader_id = $_SESSION['user_id'];
            $statement = oci_parse($this->connect(), "SELECT * FROM USERS u, SHOP s WHERE u.USER_ID = s.TRADER_ID AND u.USER_ID = $trader_id");
            oci_execute($statement);

            
            while ($row = oci_fetch_assoc($statement)) {
                $this->username = $row['USERNAME'];
                $this->user_type = ucfirst($row['USER_TYPE']);
                $this->added_by = $row['ADDED_BY'];
                $this->fullname = ucfirst($row['FULLNAME']);
                $this->user_image = $row['USER_IMAGE'];
                $this->user_contact = $row['USER_CONTACT'];
                $this->user_email = $row['USER_EMAIL'];
                $this->password = $row['PASSWORD'];
            }

            $st2 = oci_parse($this->connect(), "SELECT * FROM SHOP WHERE TRADER_ID = $trader_id");
            oci_execute($st2);
            while($row1 = oci_fetch_assoc($st2))
            {
                array_push($this->shop_id, $row1['SHOP_ID']);
                array_push($this->shop_name, $row1['SHOP_NAME']);
                array_push($this->shop_location, $row1['SHOP_LOCATION']);
            }


       }

        /**
         * Returns username
         */
        function getUsername()
        {
            return $this->username;
        }

        /**
         * Returns fullname
         */
        function getFullname()
        {
            return $this->fullname;
        }

        /**
         * Returns Email
         */
        function getEmail()
        {
            return $this->user_email;
        }

        /**
         * Returns shop_id
         */
        function getShopId()
        {
            return $this->shop_id;
        }

        /**
         * Returns shop_name
         */
        function getShopName()
        {
            return $this->shop_name;
        }

        /**
         * Returns shop_location
         */
        function getShopLocation()
        {
            return $this->shop_location;
        }

        /**
         * Returns cat_id
         */
        // function getCatId()
        // {
        //     return $this->cat_id;
        // }

        /**
         * Returns trader image
         */
        function getImage()
        {
            return $this->user_image;
        }

        /**
         * Add New Shop
         */
        function addShop($sname, $sloc, $tid)
        {
            $query = oci_parse($this->connect(), "INSERT INTO SHOP (SHOP_NAME, SHOP_LOCATION, TRADER_ID) 
                                            VALUES ('$sname', '$sloc', $tid)  ");
            if(oci_execute($query))
                return true;
        }

        function getShopProductsCount($sid)
        {  
            $temps = oci_parse($this->connect(), "SELECT * FROM PRODUCT WHERE SHOP_ID = $sid");
            oci_execute($temps); $pCount = 0;
            while($row1 = oci_fetch_assoc($temps))
            {
                $pCount++;
            }
            return $pCount;
        }
        /**
         * Update product details
         */
        public function updateProduct($productid,$pname,$pprice, $pstock, $ptype, $pminorder,
        $pmaxorder,  $pdescription, $pallergy,  $category)
        { 
            $updateQuery = oci_parse($this->connect(), "UPDATE PRODUCT 
                                            SET PRODUCT_NAME = '$pname', PRODUCT_PRICE = $pprice, STOCK_AVAILABLE = $pstock,
                                            PRODUCT_TYPE = '$ptype', MIN_ORDER = $pminorder, MAX_ORDER = $pmaxorder, PRODUCT_DESCRIPTION = '$pdescription',
                                            ALLERGY_INFORMATION = '$pallergy', CAT_ID = $category
                                            WHERE PRODUCT_ID = $productid");
            if(oci_execute($updateQuery))
                return true;
            else
                return false;
        }

        /**
         * Add new product
         */
        public function addProduct($shopID, $pname,$pprice, $pstock, $ptype, $pminorder,
          $pmaxorder,  $pdescription, $pallergy,  $pcategory, $pimage1,  $pimage2,  $pimage3)
        {
            $addQuery = oci_parse($this->connect(), "INSERT INTO PRODUCT (PRODUCT_NAME, PRODUCT_PRICE, STOCK_AVAILABLE, PRODUCT_TYPE, MIN_ORDER,
                MAX_ORDER, PRODUCT_DESCRIPTION, ALLERGY_INFORMATION, CAT_ID, PRODUCT_IMAGE1, PRODUCT_IMAGE2, PRODUCT_IMAGE3, SHOP_ID )
            VALUES ('$pname',  $pprice,  $pstock, '$ptype',  $pminorder,  $pmaxorder, '$pdescription',
            '$pallergy',$pcategory, '$pimage1',  '$pimage2','$pimage3', $shopID) " );
            
            if(oci_execute($addQuery))
            return true;
            else
            return false;
        }

        /**
         * Delete a product
         */
        public function deleteProduct($delPID)
        {
            $delQuery1 = oci_parse($this->connect(), "DELETE FROM ORDER_DETAILS WHERE PRODUCT_ID = $delPID");
            $delQuery2 = oci_parse($this->connect(), "DELETE FROM REVIEW WHERE PRODUCT_ID = $delPID");
            $delQuery3 = oci_parse($this->connect(), "DELETE FROM PRODUCT_CART WHERE PRODUCT_ID = $delPID");
            $delQuery4 = oci_parse($this->connect(), "DELETE FROM DISCOUNT WHERE PRODUCT_ID = $delPID");
            $delQuery5 = oci_parse($this->connect(), "DELETE FROM PRODUCT WHERE PRODUCT_ID = $delPID");
            $deleted1 = false;
            $deleted2 = false;
            $deleted3 = false;
            $deleted4 = false;
            $deleted5 = false;
            if(oci_execute($delQuery1))
                $deleted1 = true;
            else
                $deleted1 = false;
            if(oci_execute($delQuery2))
                $deleted2 = true;
            else
                $deleted2 = false;
            if(oci_execute($delQuery3))
                $deleted3 = true;
            else
                $deleted3 = false;
            if(oci_execute($delQuery4))
                $deleted4 = true;
            else
                $deleted4 = false;
            if(oci_execute($delQuery5))
                $deleted5 = true;
            else
                $deleted5 = false;
            
            if($deleted1 && $deleted2 && $deleted3 && $deleted4 && $deleted5)
                return true;
            else
                return false;
            
        }



        //public $username;
        //public $user_type;
        //public $added_by;
       // public $fullname;
       // public $user_image;
        //public $user_contact;
        //public $user_email;
       // public $password;

        public function fetchCustomerDetails($user_id)
        {
            $statement = oci_parse($this->connect(), "SELECT * FROM USERS WHERE user_id = $user_id");
            oci_execute($statement);

            
            while ($row = oci_fetch_assoc($statement)) {
                $this->username = $row['USERNAME'];
                $this->user_type = ucfirst($row['USER_TYPE']);
                $this->added_by = $row['ADDED_BY'];
                $this->fullname = ucfirst($row['FULLNAME']);
                $this->user_image = $row['USER_IMAGE'];
                $this->user_contact = $row['USER_CONTACT'];
                $this->user_email = $row['USER_EMAIL'];
                $this->password = $row['PASSWORD'];

            }       

        }

        public function validateDetails($user_id, $username, $email, $contact)
        {
            $validation = true;
            if(!$this->checkEmail($user_id, $email))
            {
                $validation = false;
                $_SESSION['duplicateemail'] = "Email already exists!";
            }
            if(!$this->checkUsername($user_id, $username))
            {
                $validation = false;
                $_SESSION['duplicateusername'] = "Username already exists!";
            }
            if(!filter_var($contact, FILTER_SANITIZE_NUMBER_INT))
            {
                $validation = fasle;
                $_SESSION['invalidcontact'] = "Invalid Contact!";
            }
            return $validation;

        }

        public function updateDetails($user_id, $fullname, $username, $email, $contact)
        {
            $_SESSION['duplicateemail'] = $_SESSION['duplicateusername'] = $_SESSION['invalidcontact'] = "";
            $statement = oci_parse($this->connect(), "UPDATE USERS SET FULLNAME = '$fullname', USERNAME = '$username' ,
                                            USER_EMAIL = '$email', USER_CONTACT = '$contact' 
                                            WHERE USER_ID =  $user_id");
            oci_execute($statement);
        }


        public function checkEmail($user_id, $email) {
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $statement = oci_parse($this->connect(), "SELECT * FROM USERS WHERE USER_EMAIL = '".$email."' AND USER_ID != $user_id");
            oci_execute($statement);
            $rows = oci_fetch_array($statement);
            if($rows >= 1)
            {
                return false;
            
            }
            else
                return true;
        }

        public function checkUsername($user_id, $username) {
            $username = filter_var($username, FILTER_SANITIZE_EMAIL);
            $statement = oci_parse($this->connect(), "SELECT * FROM USERS WHERE USERNAME = '".$username."' AND USER_ID != $user_id");
            oci_execute($statement);
            $rows = oci_fetch_array($statement);
            if($rows >= 1)
                return false;
            else
                return true;
        }


        public function validatePassword($user_id, $old_password, $new_password, $cpassword) {
            $validation = true;
            if(!($old_password == $this->password))
            {
                $validation = false;
                $_SESSION['wrongpassword'] = "Wrong Password!";
            }
            else
                $_SESSION['wrongpassword'] = "";
            if(!($new_password == $cpassword)) 
            {
                $validation = false;
                $_SESSION['passworddifferent'] = "Passwords do not match!";
            }
            else
                $_SESSION['passworddifferent'] = "";
            if(!($this->checkPassword($new_password)))
            {
                $validation = false;
            }
            return $validation;
        }

        public function checkPassword($password) {
            // Validate password strength
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);

            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
               $_SESSION['invalidpassword'] = "Password must contain at least 8 characters, 1 uppercase letter, 
               1 number and special character!";
               return false;
            }else{
                $_SESSION['invalidpassword'] = "";
                return true;
            }
        }

        public function updatePassword($user_id, $password) {

            $statement = oci_parse($this->connect(), "UPDATE USERS SET PASSWORD = '".$password."' WHERE USER_ID = $user_id");
            oci_execute($statement);

        }

        public function deleteAccount($user_id)
        {
            $query = oci_parse($this->connect(), "DELETE FROM USERS WHERE USER_ID = $user_id");
            $deleted = oci_execute($query);
            if($deleted)
            {
                ?>
                    <script>
                        alert("----!!ACCOUNT DELETED SUCCESSFULLY!!----");
                        window.location = "my_account.php";
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
        }

    
        /**
         * Update discount details
         */
        public function updateDiscount($productid, $dname, $dpercent)
        {
            $updateQuery = oci_parse($this->connect(), "UPDATE DISCOUNT SET DISCOUNT_NAME = '$dname', DISCOUNT_PERCENT = $dpercent 
                                                        WHERE PRODUCT_ID = $productid ");
            if(oci_execute($updateQuery))
                return true;
            else
                return false;
        }

        /**
         * Add new discount to a product
         */
        public function addDiscount($productid, $dname, $dpercent)
        {
            $tid = $_SESSION['user_id'];
            $addQuery = oci_parse($this->connect(), "INSERT INTO DISCOUNT (DISCOUNT_NAME, DISCOUNT_PERCENT, USER_ID, PRODUCT_ID)
            VALUES ('$dname', $dpercent, $tid, $productid) " );
            
            if(oci_execute($addQuery))
            return true;
            else
            return false;
        }

        /**
         * Delete discount 
         */
        public function removeDiscount($did)
        {
            $tid = $_SESSION['user_id'];
            $delQuery = oci_parse($this->connect(), "DELETE FROM DISCOUNT WHERE DISCOUNT_ID = $did " );
            
            if(oci_execute($delQuery))
            return true;
            else
            return false;
        }

        /**
         * Returns total income of the trader
         */
        public function getDashboardItem($item)
        {
            $tid = $_SESSION['user_id'];
            $saleqry = oci_parse($this->connect(), "SELECT * FROM ORDER_DETAILS o JOIN PRODUCT p ON o.PRODUCT_ID = p.PRODUCT_ID JOIN SHOP s
                                                    ON p.SHOP_ID = s.SHOP_ID WHERE s.TRADER_ID = $tid");
            oci_execute($saleqry);
            $totalSales = 0;
            while($row1 = oci_fetch_assoc($saleqry)){ $totalSales += $row1['SUB_TOTAL']; }
            if($item == "income")
                return $totalSales;

            $qry = oci_parse($this->connect(), "SELECT * FROM PRODUCT, SHOP s WHERE  s.TRADER_ID = $tid");
            oci_execute($qry);
            $prdcount = 0;
            while($row = oci_fetch_assoc($qry)){
                $prdcount++;
            }
            if($item == "product count")
                return $prdcount;

            $qry1 = oci_parse($this->connect(), "SELECT * FROM PRODUCT, SHOP s WHERE  s.TRADER_ID = $tid");
            oci_execute($qry1);
            $outOfStock = 0;
            while($row1 = oci_fetch_assoc($qry1)){
                if($row1['STOCK_AVAILABLE'] < $row['MIN_ORDER'])
                    $outOfStock++;
            }
            if($item == "outofstock")
                return $outOfStock;

            if($item == "shops")
            {
                $cnt = 0;
                $q = oci_parse($this->connect(), "SELECT * FROM SHOP WHERE TRADER_ID = $tid");
                oci_execute($q);
                while($r = oci_fetch_assoc($q))
                {
                    $cnt++;
                }
                return $cnt;

            }

            $saleqry1 = oci_parse($this->connect(), "SELECT * FROM ORDER_DETAILS o JOIN PRODUCT p ON o.PRODUCT_ID = p.PRODUCT_ID JOIN SHOP s
                ON p.SHOP_ID = s.SHOP_ID WHERE  s.TRADER_ID = $tid");
            oci_execute($saleqry1);
            $totalShopSales1 = 0;
            while($row2 = oci_fetch_assoc($saleqry1)){ $totalShopSales1 += $row2['SUB_TOTAL']; }
            $saleqry2 = oci_parse($this->connect(), "SELECT * FROM ORDER_DETAILS");
            oci_execute($saleqry2); 
            $totalSales2 = 0;
            while($row3 = oci_fetch_assoc($saleqry2)){ $totalSales2 += $row3['SUB_TOTAL']; }
            if($item == "salesRatio")
                if($totalShopSales1 == 0 || $totalSales2 == 0)
                    return 0;
                else
                return round((($totalShopSales1/$totalSales2) * 100), 2);

        }

    }

?>