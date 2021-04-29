<?php
    include 'includes/dbconnection.inc.php';
    //$_SESSION['updateerror'] = false;
    $_SESSION['duplicateemail'] = $_SESSION['duplicateusername'] = $_SESSION['invalidcontact'] = "";
    $_SESSION['wrongpassword'] =  $_SESSION['invalidpassword'] =  $_SESSION['passworddifferent'] = "";

    class USER extends DB{

        public $username;
        public $user_type;
        public $added_by;
        public $fullname;
        public $user_image;
        public $user_contact;
        public $user_email;
        public $password;
        public $verification_status;
        public $trader_request;

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
                $this->verification_status = $row['VERIFICATION_STATUS'];
                $this->trader_request = $row['TRADER_REQUEST'];

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

    }


?>