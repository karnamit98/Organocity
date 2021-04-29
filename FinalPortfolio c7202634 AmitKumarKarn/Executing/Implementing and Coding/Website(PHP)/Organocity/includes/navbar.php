
 <!-- Central Modal Medium Success -->
 <div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-notify modal-success" role="document">
     <!--Content-->
     <div class="modal-content">
       <!--Header-->
       <div class="modal-header">
         <p class="  text-center text-danger heading lead"><b>Login Required</b></p>

         <!--button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button-->

        
       </div>

       <!--Body-->
       <div class="modal-body">
       
         <div class="text-center">
         <img src="images/cart.PNG" alt="Cart Image" class="img-fluid img-responsive" style="margin: 0 auto" />
           <p>Users need to log in to their account to access their cart and checkout.</p>
         </div>
       </div>

       <!--Footer-->
       <div class="modal-footer justify-content-center">
         <a href="login.php" type="button" class="btn btn-success">Log In <i class="far fa-gem ml-1 text-white"></i></a>
         <a type="button" class="btn btn-danger waves-effect" data-dismiss="modal">No, thanks</a>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- Central Modal Medium Success-->



<div id="top"><!-- Top Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
           <?php
           $uimg = "";
           //If user email is not verified
               if(isset($_SESSION['user_id']))
                    {
                        include_once 'includes/dbconnection.inc.php';
                        $db = new DB;
                        $vs = 0;
                        $vuid = $_SESSION['user_id'];
                        $st1 = oci_parse($db->connect(), "SELECT * FROM USERS WHERE USER_ID=$vuid");
                        oci_execute($st1);
                        while($row = oci_fetch_assoc($st1))
                        {
                            $vs = $row['VERIFICATION_STATUS'];
                            $uimg = $row['USER_IMAGE'];
                        }
                        if($vs == 0) {
                            echo '<a href="customer/my_account.php" style="color:#f8dc88"> 
                            <img src = "images/acgif2.GIF" alt="Account Not Verified!" style="height: vh;" class="img-responsive"/>
                      </a>';
                      //<i class="fa  fa-exclamation-triangle"></i> USER NOT VERIFIED <i class="fa  fa-exclamation-triangle"></i>
                } } ?>
               <!--a href="#" class="btn btn-success btn-sm">Welcome</a>
               <a href="checkout.php"> Timing 7:00 AM TO 10:00 PM </a-->
               
           </div><!-- col-md-6 offer Finish -->
           
           <div class="col-md-6"><!-- col-md-6 Begin -->
               
               <ul class="menu"><!-- cmenu Begin -->
                <?php
                        $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); 
                    ?>
                   
                   
                        <?php
                            if(!(isset($_SESSION['user_id'])))
                            {
                                if($curPageName == "login.php")
                                    echo '<li><a href="login.php" style="border-bottom:1px solid #fffdbb;color:#fffdbb;"><i class="fa fa-sign-in"></i> Login</a></li>';
                                else
                                    echo '<li><a href="login.php"><i class="fa fa-sign-in"></i>  Login</a></li>';
                            }
                        ?>
                   

                   
                   <li>
                        <?php
                            if(!isset($_SESSION['user_id']))
                            {
                                if($curPageName == "customer_register.php")
                                    echo '<a href="customer_register.php" style="border-bottom:1px solid #fffdbb;color:#fffdbb;"><i class="fa fa-user-plus"></i> Register</a>';
                                else
                                    echo '<a href="customer_register.php"><i class="fa fa-user-plus"></i> Register</a>';
                            }
                            else
                            {
                                if($curPageName == "customer/my_account.php")
                                    echo '<a href="customer/my_account.php" style="border-bottom:1px solid #fffdbb;color:#fffdbb;">
                                    <img src="customer/customer_images/'.$uimg.'" class="img-circle img-responsive" style="float:left;width:20px;height:20px;margin-right:8px !important;" >
                                    '.$_SESSION['userfullname'].'</a>';
                                else
                                    echo '<a href="customer/my_account.php" style="border-left:0px;">
                                    <img src="customer/customer_images/'.$uimg.'" class="img-circle img-responsive" style="float:left;width:20px;height:20px;margin-right:8px !important;" >
                                      '.$_SESSION['userfullname'].'</a>';
                            }
                        ?>
                   </li>
                   <!--li>
                        <?php
                            //if($curPageName == "my_account.php")
                           // echo '<a href="customer/my_account.php" style="border-bottom:1px solid #fffdbb;color:#fffdbb;"><i class="fa fa-user"></i>  My Account</a>';
                           // else
                           // echo '<a href="customer/my_account.php"><i class="fa fa-user"></i>  My Account</a>';
                        ?>
                   </li-->
                   <li>
                        <?php
                            
                            if(isset($_SESSION['user_id']))
                                {
                                    if($curPageName == "cart.php")
                                        echo '<a href="cart.php"  style="border-bottom:1px solid #fffdbb;color:#fffdbb;"> <i class="fa fa-shopping-cart"></i>Shopping Cart</a>';
                                    else
                                        echo '<a href="cart.php"><i class="fa fa-shopping-cart"></i> Shopping Cart</a>';
                                }
                                else
                                {
                                    echo '<a href="#" data-toggle="modal" data-target="#centralModalSuccess"><i class="fa fa-shopping-cart"></i> Shopping Cart</a>';
                                
                                }
                        ?>
                        
                       
                   </li>
                   
                   <li>
                        <?php
                            if($curPageName == "testomonial.php")
                            echo '<a href="customer/testomonial.php" style="border-bottom:1px solid #fffdbb;color:#fffdbb;"><i class="fa fa-asterisk"></i>Testomonial</a>';
                            else
                            echo '<a href="customer/testomonial.php"><i class="fa fa-asterisk"></i> Testomonial</a>';
                        ?>
                   </li>
                   
                   
                        <?php
                            if(isset($_SESSION['user_id']))
                            {
                                echo '<li><a href="logout.php"><i class="fa fa-sign-out"></i>  Logout</a></li>';
                            }
                        ?>
                   
                   
               </ul><!-- menu Finish -->
               
           </div><!-- col-md-6 Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- Top Finish -->
   
   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="navbar-header"><!-- navbar-header Begin -->
               
               <a href="index.php" class="navbar-brand home"><!-- navbar-brand home Begin -->
                   
                   <img src="images/ecom-logo.gif" alt="Organocity Logo" class="hidden-xs">
                   <img src="images/ecom-logo1.gif" alt="Organocity Mobile" class="visible-xs">
                   
               </a><!-- navbar-brand home Finish -->
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
                   <span class="sr-only">Toggle Navigation</span>
                   
                   <i class="fa fa-align-justify"></i>
                   
               </button>
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   
                   <span class="sr-only">Toggle Search</span>
                   
                   <i class="fa fa-search"></i>
                   
               </button>
               
           </div><!-- navbar-header Finish -->
           
           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
               
               <div class="padding-nav"><!-- padding-nav Begin -->
                   
                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->
                       
                        <?php
                        $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); 
                        ?>
                       <li>
                           <?php
                                if($curPageName == "index.php")
                                echo '<a href="index.php" class="active"><i class="fa fa-home"></i>   Home</a>';
                                else
                                echo '<a href="index.php"><i class="fa fa-home"></i>   Home</a>';
                            ?>
                       </li>
                       <li>
                            <?php
                                if($curPageName == "shop.php")
                                echo '<a href="shop.php" class="active"><i class="fa fa-shopping-bag"></i> Shop</a>';
                                else
                                echo '<a href="shop.php"><i class="fa fa-shopping-bag"></i> Shop</a>';
                            ?>
                           
                       </li>
                       
                            <?php
                              //  if($curPageName == "my_account.php")
                              //  echo '<a href="customer/my_account.php" class="active"><i class="fa fa-user"></i> My Account</a>';
                              //  else
                              //  echo '<a href="customer/my_account.php"><i class="fa fa-user"></i> My Account</a>';
                            
                                if(isset($_SESSION['user_id']))
                                {
                                    if($curPageName == "my_account.php")
                                        echo '<li><a href="customer/my_account.php" style="border-bottom:1px solid #fffdbb;color:#fffdbb;"><i class="fa fa-user"></i>   My Account</a></li>';
                                    else
                                        echo '<li><a href="customer/my_account.php"><i class="fa fa-user"></i>  My Account </a></li>';
                                }
                            ?>
                       
                       <li>
                           <?php
                                if((isset($_SESSION['user_id'])))
                                {
                                if($curPageName == "cart.php")
                                    echo '<a href="cart.php" class="active"><i class="fa fa-shopping-cart"></i> Shopping Cart</a>';
                                else
                                    echo '<a href="cart.php"><i class="fa fa-shopping-cart"></i>  Shopping Cart</a>';
                                }
                                else
                                {
                                    echo '<a href="#" data-toggle="modal" data-target="#centralModalSuccess"><i class="fa fa-shopping-cart"></i> Shopping Cart</a>';
                                
                                }
                            ?>
                       </li>
                       <li>
                            <?php
                                if($curPageName == "contact.php")
                                echo '<a href="contact.php" class="active"><i class="fa fa-phone"></i> Contact Us</a>';
                                else
                                echo '<a href="contact.php"><i class="fa fa-phone"></i>  Contact Us</a>';
                            ?>
                       </li>

                       
                   </ul><!-- nav navbar-nav left Finish -->
                   
               </div><!-- padding-nav Finish -->
               
               
               
               
                <?php
                if(isset($_SESSION['user_id']))
                    { ?>
                        <a href="cart.php" class="btn navbar-btn btn-primary right cart-btn"><!-- btn navbar-btn btn-primary Begin -->
        
                            <i class="fa fa-shopping-cart"></i>
                            
                            <span><?php include_once 'includes/dbconnection.inc.php';
                                $db = new DB;
                                $cart_no = $_SESSION['user_id'];
                                $script = oci_parse($db->connect(), "SELECT * FROM PRODUCT_CART WHERE CART_NO = $cart_no");
                                oci_execute($script);
                                $numrows = 0;
                                while($row =  oci_fetch_assoc($script))
                                {
                                    $numrows = $numrows + 1;
                                } 
                                echo $numrows; ?> Items In Your Cart</span>
                            
                        </a><!-- btn navbar-btn btn-primary Finish -->
                <?php    }
                    else
                    {

                        ?>
                            <a href="#" data-toggle="modal" data-target="#centralModalSuccess" class="btn navbar-btn btn-primary right cart-btn"><!-- btn navbar-btn btn-primary Begin -->
        
                                <i class="fa fa-shopping-cart"></i>
                                
                                <span><?php if(isset($_COOKIE['tempCart'])){ echo sizeOf($_COOKIE['tempCart']); }
                                        else { echo "0"; }  ?> Items In Your Cart</span>
                                
                            </a><!-- btn navbar-btn btn-primary Finish -->

                        <?php
                        
                    }
                ?>
               
               <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Begin -->
                   
                   <button class="btn btn-primary navbar-btn nav-search" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn Begin -->
                       
                       <span class="sr-only">Toggle Search</span>
                       
                       <i class="fa fa-search"></i>
                       
                   </button><!-- btn btn-primary navbar-btn Finish -->
                   
               </div><!-- navbar-collapse collapse right Finish -->
               
               <div class="collapse clearfix" id="search"><!-- collapse clearfix Begin -->
                   
                   <form method="GET" action="searchDisplay.php" enctype="multipart/form-data" class="navbar-form"><!-- navbar-form Begin -->
                       
                       <div class="input-group"><!-- input-group Begin -->
                           
                           <input type="text" class="form-control" placeholder="Search" name="search" >
                           
                           <span class="input-group-btn"><!-- input-group-btn Begin -->
                           
                           <button type="submit" name="searchsubmit" value="Search" class="btn btn-primary"><!-- btn btn-primary Begin -->
                               
                               <i class="fa fa-search"></i>
                               
                           </button><!-- btn btn-primary Finish -->
                           
                           </span><!-- input-group-btn Finish -->
                           
                       </div><!-- input-group Finish -->
                       
                   </form><!-- navbar-form Finish -->
                   
               </div><!-- collapse clearfix Finish -->
               
           </div><!-- navbar-collapse collapse Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- navbar navbar-default Finish -->
 