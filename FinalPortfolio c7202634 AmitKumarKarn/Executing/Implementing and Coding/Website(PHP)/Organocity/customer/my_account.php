<?php
    include 'includes/check_session.inc.php';
    include 'customer_details.php';
    $user_id = $_SESSION['user_id'];

    $user = new USER;
    $user->fetchCustomerDetails($user_id);

    if(isset($_SESSION['img_uploaded'] ))
    {
        if($_SESSION['img_uploaded'] )
        {
            echo '<script> alert("The file '.$_SESSION['filename'] .' has been uploaded.")</script>';
            unset($_SESSION['img_uploaded']); 
            unset($_SESSION['filename']); 
        }
    } 
     

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Organocity</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <style>
        body{
            /* The image used */
            background-image: url(customer_images/pic.JPG);
                        
            /* Full height */
            height: 100%; 
            
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-position:fixed;

        }
        .edit-form input:hover, .pass-form input:hover{
                box-shadow: 0 0 3px #1089ff;
            
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
                       My Account
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
                   
                   <?php
                   
                   if (isset($_GET['my_orders'])){
                       include("my_orders.php");
                   }
                  
                  else if (isset($_GET['pay_history'])){
                       include("payment_history.php");
                   }
                  
                  else if (isset($_GET['edit_account'])){
                       include("edit_account.php");
                   }
                   
                  else if (isset($_GET['change_pass'])){
                       include("change_pass.php");
                   }

                  else if (isset($_GET['update_img'])){
                    include("update_img.php");
                   }

                  else if (isset($_GET['delete_account'])){
                       include("delete_account.php");
                   }
                   
                   else {
                        ?>

                          
                            <!-- Title -->
                            <h2 class="card-title h4 pb-2"><strong>User Profile</strong></h2>

                            <br /><br />

                            <div class="table-responsive">

                                <!--Table-->
                                <table class="table">

                                    <!--Table body-->
                                    <tbody>
                                    <tr>
                                        <th scope="row"><strong class="text-muted">1</strong></th>
                                        <td><strong class="text-muted">Name</strong></td>
                                        <td><?php echo $user->fullname; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong class="text-muted">2</strong></th>
                                        <td><strong class="text-muted">Username</strong></td>
                                        <td><?php echo $user->username; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong class="text-muted">3</strong></th>
                                        <td><strong class="text-muted">Contact Number</strong></td>
                                        <td><?php echo $user->user_contact; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong class="text-muted">4</strong></th>
                                        <td><strong class="text-muted">Email</strong></td>
                                        <td><?php echo $user->user_email; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><strong class="text-muted">4</strong></th>
                                        <td><strong class="text-muted">User Verification Status</strong></td>
                                        <td><?php 
                                            if($user->verification_status == 0) {
                                                ?>
                                                
                                                <strong class="text-danger">Not Verified</strong> 
                                                <a class="btn btn-primary" href="sendMail.php" >Verify Now</a> 
                                            <?php }
                                            else
                                                echo '<strong class="text-success">Verified</strong>';
                                        ?></td>
                                    </tr>
                                    </tbody>
                                    <!--Table body-->

                                </table>
                                <!--Table-->

                                <?php if($user->trader_request == 1){ ?>
                                <center><span class="text-warning">Your request of promotion to trader has been sent to the 
                                                    admin! </span></center>
                                <?php } ?>
                            </div>
                         
                        
                        <?php
                   }

                   ?>

                   
               </div><!-- box Finish -->
               
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script src="../functions/navscroll.js"></script>
    
    
</body>
</html>