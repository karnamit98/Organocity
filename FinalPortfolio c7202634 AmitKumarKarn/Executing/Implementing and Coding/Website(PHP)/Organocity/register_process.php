<?php
    
   $_SESSION['registrationerror'] = false;
   $_SESSION['duplicateemail'] = $_SESSION['duplicateusername'] = $_SESSION['invalidcontact'] = 
   $_SESSION['passwordvalidation'] = $_SESSION['differentpassword'] = "";

    include_once "includes/dbconnection.inc.php";
    class REGISTER extends DB {

        public function registerUser($fullname, $username,  $email, $contact, $pass) {
           
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $statement = oci_parse($this->connect(), "INSERT INTO 
                                    USERS (username, user_type, fullname, USER_IMAGE, user_contact, user_email, password, VERIFICATION_STATUS, trader_request)
                                    VALUES ('$username','customer','$fullname', 'defaultuser.PNG', '$contact','$email', '$pass', 0, 0)
                                    returning USER_ID into :id");
            OCIBindByName($statement,":id",$uid);
            $result = oci_execute($statement);

            //Create a cart for the customer
            //$user_id = $row['USER_ID'];
            $query = oci_parse($this->connect(), "INSERT INTO CART (CART_NO, USER_ID) 
                                                        VALUES ($uid, $uid)");
            oci_execute($query);    

            if($_SESSION['trader_request'])
            {
                $tquery = oci_parse($this->connect(), "UPDATE USERS SET TRADER_REQUEST = 1 WHERE USER_ID = $uid");
                oci_execute($tquery);
                $_SESSION['trader_request'] = false;
                unset($_SESSION['trader_request']);
            }
            
            return $result;
        }

        public function checkEmail($email) {
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $statement = oci_parse($this->connect(), "SELECT * FROM USERS WHERE user_email = '".$email."'");
            oci_execute($statement);
            $rows = oci_fetch_array($statement);
            if($rows >= 1)
                return false;
            else
                return true;
        }

        public function checkUsername($username) {
            $username = filter_var($username, FILTER_SANITIZE_EMAIL);
            $statement = oci_parse($this->connect(), "SELECT * FROM USERS WHERE username = '".$username."'");
            oci_execute($statement);
            $rows = oci_fetch_array($statement);
            if($rows >= 1)
                return false;
            else
                return true;
        }

        public function validatePassword($password) {
            // Validate password strength
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);

            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
               $_SESSION['passwordvalidation'] = "Password must contain at least 8 characters, 1 uppercase letter, 
               1 number and special character!";
               return false;
            }else{
                return true;
            }
        }

        public function validateRegister($username, $email, $contact, $password, $cpassword)
        {
            if(!$this->checkEmail($email))
            {
                $_SESSION['registrationerror'] = true;
                $_SESSION['duplicateemail'] = "Email already exists!";
            }
            if(!$this->checkUsername($username))
            {
                $_SESSION['registrationerror'] = true;
                $_SESSION['duplicateusername'] = "Username already exists!";
            }
            if(!$this->validatePassword($password))
            {
                $_SESSION['registrationerror'] = true;
            }
            if($password != $cpassword)
            {
                $_SESSION['registrationerror'] = true;
                $_SESSION['differentpassword'] = "Passwords do not match!";
            }
            //if(!filter_var($contact, FILTER_SANITIZE_NUMBER_INT))
            if(!is_numeric($contact))
            {
                $_SESSION['registrationerror'] = true;
                $_SESSION['invalidcontact'] = "Invalid Contact!";
            }
        }
    }

?>