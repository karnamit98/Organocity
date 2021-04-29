
<style>
.uimage {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}
    .middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 32%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.img-cont:hover .uimage {
  opacity: 0.5;
}

.img-cont:hover .middle {
  opacity: 1;
}

.text {
  background-color: #ff7315;
  color: #f4f4f4;
  font-size: 12px;
  padding: 10px 20px;}
  .middle a {
    color:#f4f4f4;
    text-decoration:none !important;
  }
  .middle a:hover {
    color:#f4f4f4;
    background: #3a3535;
    text-decoration:none !important;
  }

</style>
<div class="panel panel-default sidebar-menu"><!--  panel panel-default sidebar-menu Begin  -->
    
    <div class="panel-heading"><!--  panel-heading  Begin  -->
        
        <center class="img-cont"><!--  center  Begin  -->
            <?php 
                if(!empty($user->user_image))
                {
            ?>
                <img class="img-fluid img-responsive uimage" src="customer_images/<?php echo $user->user_image; ?>" alt="<?php echo $user->fullname; ?>">
            <?php
                }
                else{
                    ?>
                    <img class="img-fluid img-responsive uimage" src="customer_images/defaultuser.PNG" alt="<?php echo $user->fullname; ?>">
                    
                <?php } ?>
                <div class="middle">
                    <a class="text" href="my_account.php?update_img" target="blank">Upload/Change</a>
                </div>
        </center><!--  center  Finish  -->
        
        <br/>
        
        <h3 align="center" class="panel-title"><!--  panel-title  Begin  -->
            
            <strong class="text-muted"> <?php echo $user->fullname; ?> </strong>
            
        </h3><!--  panel-title  Finish -->
        
    </div><!--  panel-heading Finish  -->
    
    <div class="panel-body"><!--  panel-body Begin  -->
        
        <ul class="nav-pills nav-stacked nav"><!--  nav-pills nav-stacked nav Begin  -->
            
            <li class="<?php if(isset($_GET['my_orders'])){ echo "active"; } ?>">
                
                <a href="my_account.php?my_orders">
                    
                    <i class="fa fa-list"></i> My Orders
                    
                </a>
                
            </li>
            
            <li class="<?php if(isset($_GET['pay_history'])){ echo "active"; } ?>">
                
                <a href="my_account.php?pay_history">
                    
                    <i class="fa fa-bolt"></i> Payment History
                    
                </a>
                
            </li>
            
            <li class="<?php if(isset($_GET['edit_account'])){ echo "active"; } ?>">
                
                <a href="my_account.php?edit_account">
                    
                    <i class="fa fa-pencil"></i> Edit Account
                    
                </a>
                
            </li>
            
            <li class="<?php if(isset($_GET['change_pass'])){ echo "active"; } ?>">
                
                <a href="my_account.php?change_pass">
                    
                    <i class="fa fa-user"></i> Change Password
                    
                </a>
                
            </li>

            <li class="<?php if(isset($_GET['update_img'])){ echo "active"; } ?>">
                
                <a href="my_account.php?update_img">
                    
                    <i class="fa fa-image"></i> Update Profile Picture
                    
                </a>
                
            </li>
            
            <li class="<?php if(isset($_GET['delete_account'])){ echo "active"; } ?>">
                
                <a href="my_account.php?delete_account">
                    
                    <i class="fa fa-trash-o"></i> Delete Account
                    
                </a>
                
            </li>
            
            <li>
                
                <a href="../logout.php">
                    
                    <i class="fa fa-sign-out"></i> Log Out
                    
                </a>
                
            </li>
            
        </ul><!--  nav-pills nav-stacked nav Begin  -->
        
    </div><!--  panel-body Finish  -->
    
</div><!--  panel panel-default sidebar-menu Finish  -->