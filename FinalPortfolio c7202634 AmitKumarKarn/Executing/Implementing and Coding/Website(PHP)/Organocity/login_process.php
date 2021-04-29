<?php
    
   $_SESSION['loginerror'] = false;
   $_SESSION['wrongemail'] = $_SESSION['wrongpass'] = $_SESSION['usertypeerror'] = "";

    include_once "includes/dbconnection.inc.php";
    class LOGIN extends DB {

        public $usernameEmail = 0;
        public $user_id;
        public $userfullname;
        public $verification_status;

        public function userLogin($username)
        {   
            if($this->usernameEmail == 1)
            {
                $query1 = oci_parse($this->connect(), "SELECT USER_ID, FULLNAME, VERIFICATION_STATUS FROM USERS WHERE USERNAME = '".$username."'");
                oci_execute($query1);
                while($row1 = oci_fetch_assoc($query1))
                {
                    $this->user_id = $row1['USER_ID'];
                    $this->userfullname = $row1['FULLNAME'];
                    $this->verification_status = $row1['VERIFICATION_STATUS'];
                }
            }
            else if($this->usernameEmail == 2)
            {
                $query2 = oci_parse($this->connect(), "SELECT USER_ID, FULLNAME, VERIFICATION_STATUS FROM USERS WHERE USER_EMAIL = '".$username."'");
                oci_execute($query2);
                while($row2 = oci_fetch_assoc($query2))
                {
                    $this->user_id = $row2['USER_ID'];
                    $this->userfullname = $row2['FULLNAME'];
                    $this->verification_status = $row2['VERIFICATION_STATUS'];
                }
            }
        else{ }
            
        }

        public function validateLogin($username, $password, $user_type)
        {
            $validation = true;
            if($this->validUsername($username))
            {
                $this->usernameEmail = 1;
                $_SESSION['wrongemail'] = "";
                if($this->passwordUsernameMatch($username, $password))
                {
                    $_SESSION['wrongpass'] = "";
                    
                    if($this->validUserType1($username, $user_type))
                    {
                        $_SESSION['usertypeerror'] = "";
                        $_SESSION['loginerror'] = false;
                    }
                    else
                    {
                        $_SESSION['usertypeerror'] = "User couldn't be recognized as a '".$user_type."'!";
                        $_SESSION['loginerror'] = true;
                    }

                }
                else
                {
                    $_SESSION['wrongpass'] = "Wrong Password!";
                    $_SESSION['loginerror'] = true;
                    $this->usernameEmail = 0;
                }
            }
            else if($this->validEmail($username))
            {
                $this->usernameEmail = 2;
                $_SESSION['wrongemail'] = "";
                if($this->passwordEmailMatch($username, $password))
                {
                    $_SESSION['wrongpass'] = "";
                    
                    if($this->validUserType2($username, $user_type))
                    {
                        $_SESSION['usertypeerror'] = "";
                        $_SESSION['loginerror'] = false;
                        $validation = false;
                    }
                    else
                    {
                        $_SESSION['usertypeerror'] = "User couldn't be recognized as a '".$user_type."'!";
                        $_SESSION['loginerror'] = true;
                        $validation = false;
                    }
                }
                else
                {
                    $_SESSION['wrongpass'] = "Wrong Password!";
                    $_SESSION['loginerror'] = true;
                    $this->usernameEmail = 0;
                }
            }
            else
            {
                $validation = false;
                $_SESSION['loginerror'] = true;
                $_SESSION['wrongemail'] = "Username or email invalid!";
            }

            return $validation;
        }

        public function validUsername($username)
        {
            $query = oci_parse($this->connect(), "SELECT * FROM USERS WHERE USERNAME = '".$username."' ");
            oci_execute($query);
            $row = oci_fetch_array($query);
            if($row >= 1)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function validEmail($email)
        {
            $query = oci_parse($this->connect(), "SELECT * FROM USERS WHERE USER_EMAIL = '".$email."' ");
            oci_execute($query);
            $row = oci_fetch_array($query);
            if($row >= 1)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function passwordUsernameMatch($username, $password)
        {
            $query = oci_parse($this->connect(), "SELECT * FROM USERS WHERE USERNAME = '".$username."' AND PASSWORD = '".$password."'");
            oci_execute($query);
            $row = oci_fetch_array($query);
            if($row >= 1)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function passwordEmailMatch($email, $password)
        {
            $query = oci_parse($this->connect(), "SELECT * FROM USERS WHERE  USER_EMAIL = '".$email."' AND PASSWORD = '".$password."'");
            oci_execute($query);
            $row = oci_fetch_array($query);
            if($row >= 1)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function validUserType1($username, $user_type)
        {
            $query = oci_parse($this->connect(), "SELECT * FROM USERS WHERE  USERNAME = '".$username."' AND USER_TYPE = '".$user_type."'");
            oci_execute($query);
            $row = oci_fetch_array($query);
            if($row >= 1)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function validUserType2($email, $user_type)
        {
            $query = oci_parse($this->connect(), "SELECT * FROM USERS WHERE  USER_EMAIL = '".$email."' AND USER_TYPE = '".$user_type."'");
            oci_execute($query);
            $row = oci_fetch_array($query);
            if($row >= 1)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

    }

?>
