
<div id="copyright" style="background:#2b580c"><!-- #footer navigation Begin -->
    <div class="container"><!-- container Begin -->
        <div class="col-md-3 foot-nav"><!-- col-md-3 Begin -->
            
            <p class=""><a href="index.php">Organocity</a></p>
            
        </div><!-- col-md-3 Finish -->
        <div class="col-md-3 foot-nav"><!-- col-md-3 Begin -->
            
            <p class=""><a href="shop.php">Shop</a></p>
            
        </div><!-- col-md-3 Finish -->
        <div class="col-md-3 foot-nav"><!-- col-md-3 Begin -->
            
            
            <?php
                if(isset($_SESSION['user_id']))
                    { ?>
                        <a href="cart.php">Cart                          
                        </a>
                <?php    }
                    else
                    {
                        ?>
                            <a href="#" data-toggle="modal" data-target="#centralModalSuccess"><!-- btn navbar-btn btn-primary Begin -->
                                Cart                                
                            </a>
                        <?php
                    }
                ?>
        </div><!-- col-md-3 Finish -->
        <div class="col-md-3" style="text-align:center;font-weight:bolder"><!-- col-md-3 Begin -->
            
            <p class=""><a href="login.php">Login</a></p>
            
        </div><!-- col-md-3 Finish -->
    </div><!-- container Finish -->
</div><!-- #footer navigation Finish -->

<div id="footer"><!-- #footer Begin -->
    <div class="container"><!-- container Begin -->
        <div class="row"><!-- row Begin -->
            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
               
               <h4>Pages</h4>
                
                <ul><!-- ul Begin -->
                <?php
                if(isset($_SESSION['user_id']))
                    { ?>
                        <li><a href="cart.php">Shopping Cart                          
                        </a></li>
                <?php    }
                    else
                    {
                        ?>
                            <li><a href="#" data-toggle="modal" data-target="#centralModalSuccess"><!-- btn navbar-btn btn-primary Begin -->
                                Shopping Cart                                
                            </a></li>
                        <?php
                    }
                ?>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <?php if(isset($_SESSION['user_id'])) { ?>
                    <li><a href="customer/my_account.php">My Account</a></li>
                    <?php } ?>
                </ul><!-- ul Finish -->
                
                <hr>
                
                <h4>User Section</h4>
                
                <ul><!-- ul Begin -->
                    <li><a href="login.php">Login</a></li>
                    <li><a href="customer_register.php">Register</a></li>
                </ul><!-- ul Finish -->
                
                <hr class="hidden-md hidden-lg hidden-sm">
                
            </div><!-- col-sm-6 col-md-3 Finish -->
            
            <div class="com-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
                
                <h4>Top Products Categories</h4>
                
                <?php
                    include_once 'includes/dbconnection.inc.php';
                    $dbc = new DB;
                    $parse = oci_parse($dbc->connect(), "SELECT * FROM CATEGORY");
                    oci_execute($parse);
                    while($row = oci_fetch_assoc($parse))
                    {
                        echo '<li><a href="categoryproducts.php?cat_id='.$row['CAT_ID'].'">'. $row['CAT_NAME'] .'</a></li>';
                    }

                ?>
                
                <hr class="hidden-md hidden-lg">
                
            </div><!-- col-sm-6 col-md-3 Finish -->
            
            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
                
                <h4>Find Us</h4>
                
                <p style="color:#35495e;
                text-shadow: 1px 1px 1px #94aa2a;"><!-- p Start -->
                    
                    <strong>Organocity.com</strong>
                    <br/>Thapathali, Nepal
                    <br/>+977-9801234567
                    <br/>Organocity@gmail.com
                    <br/><strong>Team B Sec E </strong>
                    
                </p><!-- p Finish -->
                
                <a href="contact.php">Check Our Contact Page</a>
                
                <hr class="hidden-md hidden-lg">
                
            </div><!-- col-sm-6 col-md-3 Finish -->
            
            <div class="col-sm-6 col-md-3">
                
                <h4>Get The News</h4>
                
                <p style="color:#35495e;
                text-shadow: 1px 1px 1px #94aa2a;">
                    Dont miss our latest update products.
                </p>
                
                <form action="" method="post"><!-- form begin -->
                    <div class="input-group"><!-- input-group begin -->
                        
                        <input type="text" class="form-control" name="email">
                        
                        <span class="input-group-btn"><!-- input-group-btn begin -->
                            
                            <input type="submit" value="subscribe" class="btn btn-default">
                            
                        </span><!-- input-group-btn Finish -->
                        
                    </div><!-- input-group Finish -->
                </form><!-- form Finish -->
                
                <hr>
                
                <h4> Keep In Touch</h4>
                
                <p class="social">
                    <a href="https://www.facebook.com/amit.karn.982/" target="new" class="fa fa-facebook"></a>
                    <a href="https://twitter.com/imamityk98" class="fa fa-twitter"></a>
                    <a href="https://www.instagram.com/theamittt/?hl=en" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-google-plus"></a>
                    <a href="#" class="fa fa-envelope"></a>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14131.254806721035!2d85.3195389!3d27.6921523!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xabfe5f4b310f97de!2sThe%20British%20College%2C%20Kathmandu!5e0!3m2!1sen!2snp!4v1589036952030!5m2!1sen!2snp" width="272" height="112" frameborder="0" style="border:0;margin-top:10px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </p>
                
                
            </div>
        </div><!-- row Finish -->
    </div><!-- container Finish -->

    <hr style="width:85%;">
    <div class="container" style="
    color: #01676b;text-shadow: 0px 0px 20px #f9fd50;"><!-- container Begin -->
        <div class="col-md-12"><!-- col-md-6 Begin -->
            
            <p class="text-center" style="font-weight: 700;">&copy; 2020 ORGANOCITY.COM | ALL RIGHTS RESERVED</p>
            
        </div><!-- col-md-12 Finish -->
    </div><!-- container Finish -->
</div><!-- #footer Finish -->

