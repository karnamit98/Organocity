<?php 
    session_start();
   include_once 'register_process.php';  

   $user = new REGISTER();  
   if ($_SERVER["REQUEST_METHOD"] == "POST"){   

        $user->validateRegister($_REQUEST['username'],$_REQUEST['email'],$_REQUEST['contact'],$_REQUEST['password'], $_REQUEST['cpassword']);  

       
        if(!$_SESSION['registrationerror'])
        {
            if(isset($_REQUEST['traderRequest']))
                $_SESSION['trader_request'] = true;
            $register = $user->registerUser($_REQUEST['fullname'],$_REQUEST['username'],$_REQUEST['email'],$_REQUEST['contact'],$_REQUEST['password']);  
            if($register){  
                $_SESSION['registrationerror'] = false;
                $_SESSION['duplicateemail'] = $_SESSION['duplicateusername'] = $_SESSION['invalidcontact'] = 
                $_SESSION['passwordvalidation'] = $_SESSION['differentpassword'] = "";
                
                //header('Location:index.php');
                ?>
                <script>
                    alert("----!!USER REGISTRATION SUCCESSFULL!!----");
                    window.location = "index.php";
                </script>
                
                <?php 
            }
            else
            {
                ?>
                <script>
                    alert("----!!USER REGISTRATION FAILED!!----");
                    window.location = "index.php";
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
            background-image: url(images/bg1.JPG);
                        
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
                       Register
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
                   <div class="box-header"><!-- box-header Begin -->
                       
                       <center><!-- center Begin -->
                           
                           <!--h2> Register a new account </h2-->
                           <img src="images/registernowHXS.PNG" alt="Register Logo" class="hidden-xs">
                           <img src="images/registernowVXS.PNG" alt="Register Logo" class="visible-xs">
                           
                       </center><!-- center Finish -->
                       
                       <form action="customer_register.php" method="POST" enctype="multipart/form-data" style="height:700px;"><!-- form Begin -->
                           
                           <div class="form-row mb-4" style="margin-bottom:10px;"><!-- form-row Begin -->
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="fullname" placeholder="Full Name" required
                                    value = "<?php if(isset($_POST['fullname'])){ echo $_POST['fullname']; } ?>" />
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control"  name="username" placeholder="Username" required
                                    value = "<?php if(isset($_POST['username'])){ echo $_POST['username']; } ?>" />
                                    <?php
                                        if(!empty($_SESSION['duplicateusername']))
                                        {
                                            echo '<span style="color:red;">'
                                            .$_SESSION['duplicateusername'].'</span>';
                                        }
                                    ?>
                                </div>
                           </div><!-- form-row Finish -->

                           <br /><br /><br />
                           
                           <div class="form-row mb-4" style="margin-bottom:10px;"><!-- form-row Begin -->
                                <div class="col-lg-6" >
                                    <input type="email" class="form-control" name="email" placeholder="name@email.com" required
                                    value = "<?php if(isset($_POST['email'])) {echo $_POST['email']; } ?>" >
                                    <?php
                                        if(!empty($_SESSION['duplicateemail']))
                                        {
                                            echo '<span  style="color:red;">'.$_SESSION['duplicateemail'].'</span>';
                                        }
                                    ?>
                                </div>
                                
                                <div class="col-lg-6">
                                    <input type="text" id="phone"
                                     class="form-control" name="contact" placeholder="Your Contact" required
                                    value = "<?php if(isset($_POST['contact'])){ echo $_POST['contact']; } ?>">
                                    <?php
                                        if(!empty($_SESSION['invalidcontact']))
                                        { //[0-9]{3}-[0-9]{3}-[0-9]{4} /^[1-9][0-9]{10}$/  pattern=""
                                            echo '<span  style="color:red;">'
                                            .$_SESSION['invalidcontact'].'</span>';
                                        }
                                    ?>
                                </div>
                               
                           </div><!-- form-row Finish -->
                         
                           <br /><br /><br />

                           <div class="form-row mb-4" style="margin-bottom:10px;"><!-- form-row Begin -->
                                
                                <div class='col-lg-6'>
                                    <!--div class="form-group"-->
                                        <input type="password" class="form-control" name="password" placeholder="Password" required
                                        value = "<?php if(isset($_POST['password'])){ echo $_POST['password']; } ?>"> 
                                        <?php
                                        if(!empty($_SESSION['passwordvalidation']))
                                        {
                                            echo '<span style="color:red;">'
                                            .$_SESSION['passwordvalidation'].'</span>';
                                        }
                                        ?>
                                    <!--/div-->
                                </div>
                                <div class='col-lg-6'>
                                    <!--div class="form-group"-->
                                        <input type="password" class="form-control" name="cpassword" placeholder="Confirm  Password" required
                                        value = "<?php if(isset($_POST['cpassword'])){ echo $_POST['cpassword']; } ?>"> 
                                        <?php
                                        if(!empty($_SESSION['differentpassword']))
                                        {
                                            echo '<span style="color:red;">'
                                            .$_SESSION['differentpassword'].'</span>';
                                        }
                                        ?>
                                    <!--/div-->
                                </div>
                                
                           </div><!-- form-row Finish -->
                           
                           <!--div class="form-row">< form-row Begin >
                               
                               <input type="file" class="form-control form-height-custom" name="c_image" required>
                               
                           </div--><!-- form-row Finish -->
                            
                           <div class="col-lg-12">
                           <div class="form-check" style="margin-bottom:12px;">
                                <input class="form-check-input" type="checkbox" value="" name="traderRequest" id="defaultCheck1" style="height:12px;margin-top:12px;">
                                   Send request to admin to become a vendor for this website!
                                
                            </div>
                            </div>
                           
                            <br /><br /><br />
                           <div class="form-row">
                           <div class="col-lg-12">
                           <div class="text-center"><!-- text-center Begin -->
                                                       
                               <button type="submit" name="register" class="btn btn-primary register-btn">
                               
                               <i class="fa fa-user-md"></i> Register
                               
                               </button>

                               <br /><br />
                               Already Registered? <u> <a href="login.php">Log In</a></u>

                               
                           </div><!-- text-center Finish -->
                           </div>
                           </div>   
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