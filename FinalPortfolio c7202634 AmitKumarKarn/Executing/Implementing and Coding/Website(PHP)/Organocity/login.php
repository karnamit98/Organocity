<?php 
    //session_start();
    include "includes/dbconnection.inc.php";
   include 'login_process.php';  
    $db = new DB;

    $login = new LOGIN;

    if ($_SERVER["REQUEST_METHOD"] == "POST"){   

        $login->validateLogin($_REQUEST['username'], $_REQUEST['password'], $_REQUEST['user_type']);
        $user_type = $_REQUEST['user_type'];
        if(!$_SESSION['loginerror'])
        {
            $login->userLogin($_REQUEST['username']);
            if($user_type == "customer")
            {
                //Retrieving cart products from cookies
                $cookieRetrieved = array();
                if(isset($_COOKIE['tempCart'])){
                    if(sizeOf($_COOKIE['tempCart']) >= 1)
                    {
                        $cookieRetrieved = $_COOKIE['tempCart'];
                    }

                        
                    //$_COOKIE['tempCart'] = array();
                    //setcookie("tempCart", NULL, time() - 3600, "/");
                    //unset($_COOKIE['tempCart']);

                    foreach($_COOKIE['tempCart'] as $key => $value)
                    {
                        setcookie("tempCart[$key]", $value, time() - 3600, "/");
                    }

                }
                
                session_start();
                $_SESSION['user_id'] = $login->user_id; 
                $_SESSION['userfullname'] = $login->userfullname;
                $_SESSION['verification_status'] = $login->verification_status;

                //Adding products from cookie if present cart to the database
                if(sizeOf($cookieRetrieved) >= 1)
                {
                    foreach($cookieRetrieved as $key => $value)
                    {   
                        $sameProduct = false;       //Checking if product already exists in the user's cart
                        $min_order = 0;
                        $cart_no = $_SESSION['user_id'];
                        $query = oci_parse($login->connect(), "SELECT PRODUCT_ID FROM PRODUCT_CART WHERE PRODUCT_ID = $value AND CART_NO = $cart_no");
                        oci_execute($query);
                        while($row = oci_fetch_assoc($query))
                        {
                            if($row['PRODUCT_ID'] == $value)
                            {
                                $sameProduct = true;
                            }
                        }
                        if(!$sameProduct)
                        {   
                            $query1 = oci_parse($login->connect(), "SELECT MIN_ORDER FROM PRODUCT WHERE PRODUCT_ID = $value");
                            oci_execute($query1);
                            while($row = oci_fetch_assoc($query1))
                            {
                                $min_order = $row['MIN_ORDER'];
                            }
                            //echo "pid = $value,  cart_no = $cart_no, quantity = $min_order \n";
                            $script = oci_parse($login->connect(), "INSERT INTO PRODUCT_CART (PRODUCT_ID, CART_NO, QUANTITY)
                                                                    VALUES ($value, $cart_no, $min_order)");
                            oci_execute($script);
                        }
                    }
                }


                ?>
                    <script>
                        alert("----!!USER LOGGED IN SUCCESSFULLY!!--");
                        window.location = "index.php";
                    </script>
                <?php
            }
            else if($user_type == "trader")
            {
                session_start();
                $_SESSION['user_id'] = $login->user_id; 
                $_SESSION['userfullname'] = $login->userfullname;
                $_SESSION['verification_status'] = $login->verification_status;
                ?>
                    <script>
                        alert("----!!TRADER LOGGED IN SUCCESSFULLY!!----");
                        window.location = "trader/index.php";
                    </script>
                <?php

            }
            else
            {
                //session_start();
               // $_SESSION['user_id'] = $login->user_id; 
                //$_SESSION['userfullname'] = $login->userfullname;
                //$_SESSION['verification_status'] = $login->verification_status;
                ?>
                    <script>
                        alert("----!!ADMIN LOGGED IN SUCCESSFULLY!!--");
                        window.location = "http://127.0.0.1:8080/apex/f?p=104:LOGIN_DESKTOP:11423630138838:::::";
                    </script>
                <?php

            }
            
        }

    }
    


?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Organocity </title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <style>
        body{
            /* The image used */
            background-image: url(images/loginbg.JPG);
                        
                     
            /* Full height */
            height: 100%; 
            
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-position:fixed;
        }
        </style>
</head>
<body>
<?php
    include 'includes/navbar.php';
  ?>
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Login
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
   
   <?php 
    
    include("includes/sidebar.php");
    
    ?>
               
           </div><!-- col-md-3 Finish -->
           
           <div class="col-md-9"><!-- col-md-9 Begin -->
            
               <div class="box"><!-- box Begin -->
                   <div class="box-header" style="padding-top:0;"><!-- box-header Begin -->
                       
                       <center><!-- center Begin -->
                           
                           <!--h2> Register a new account </h2-->
                           <img src="images/loginlogo2.PNG" alt="Login Logo" class="hidden-xs">
                           <img src="images/loginVXS.PNG" alt="Login Logo" class="visible-xs">
                           
                       </center><!-- center Finish -->
                       
                       <form  style="padding-bottom:1.2em;" action="login.php" method="POST" enctype="multipart/form-data"><!-- form Begin -->
                           
                           <div class="form-row mb-4"><!-- form-row Begin -->
                                <div class="col-lg-12">
                                    <input type="text" class="form-control" name="username" placeholder="Username or Email" required
                                    value = "<?php if(isset($_POST['username'])){ echo $_POST['username']; } ?>">
                                    <?php
                                        if(!empty($_SESSION['wrongemail']))
                                        {
                                            echo '<span class="col-lg-12" style="color:red;position:relative;left:-15px;">'
                                            .$_SESSION['wrongemail'].'</span>';
                                        }
                                    ?>
                                </div>
                           </div><!-- form-row Finish -->

                           <br /><br /><br />
                          
                           <div class="form-row mb-4"><!-- form-row Begin -->
                                
                                <div class='col-lg-12'>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required
                                        value = "<?php if(isset($_POST['password'])){ echo $_POST['password']; } ?>"> 
                                        <?php
                                        if(!empty($_SESSION['wrongpass']))
                                        {
                                            echo '<span class="col-lg-12" style="color:red;position:relative;left:-15px;">'
                                            .$_SESSION['wrongpass'].'</span>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                
                                
                           </div><!-- form-row Finish -->


                           <div class="form-row mb-4"><!-- form-row Begin -->
                                
                                <div class='col-lg-12'>
                                        <select name="user_type" class="form-control" required>
                                            <option value="" selected disabled>User Role</option>
                                            <option value="customer">Customer</option>
                                            <option value="trader">Trader</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                        <?php
                                        if(!empty($_SESSION['usertypeerror']))
                                        {
                                            echo '<span class="col-lg-12" style="color:red;position:relative;left:-15px;">'
                                            .$_SESSION['usertypeerror'].'</span>';
                                        }
                                    ?>
                                </div>
                                
                                
                           </div><!-- form-row Finish -->
                           
                           <br /><br >
                            

                           
                           <!--div class="form-row">< form-row Begin >
                               
                               <input type="file" class="form-control form-height-custom" name="c_image" required>
                               
                           </div--><!-- form-row Finish -->
                           
                            <br/><br /><br /><br />

                           <div class="text-center"><!-- text-center Begin -->
                               
                               <button type="submit" name="Login" class="btn btn-primary register-btn">
                               
                               <i class="fa fa-user-md"></i> Login
                               
                               </button>
                               <br /><br />
                               Not Registered Yet? <u> <a href="customer_register.php">Register Now</a></u>

                           </div><!-- text-center Finish -->
                           
                            

                       </form><!-- form Finish -->
                       
                   </div><!-- box-header Finish -->
                   
               </div><!-- box Finish -->
               
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script src="functions/navscroll.js"></script>
    
    
</body>
</html>