<?php 
    include '../includes/check_session.inc.php';
    include '../includes/dbconnection.inc.php'; 
    include 'includes/trader.class.php'; 
    $trader = new TRADER;
    $trader_id = $_SESSION['user_id'];
    $trader->fetchCustomerDetails($trader_id);
    $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); 
?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" style="backgund:#e8630a" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
  <div class="sidebar-brand-icon ">
      <img src="organocity.PNG" style="width:100%;height:14vh;" class="img-responsive" />
  </div>
  <!--div class="sidebar-brand-text mx-3">
    Organocity
  </div-->
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<?php
  if($curPageName == "index.php")
  echo '<li class="nav-item active">';
  else
    echo '<li class="nav-item">';
?>
  <a class="nav-link" href="index.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Sales Report -->
<?php
  if($curPageName == "salesReport.php")
  echo '<li class="nav-item active">';
  else
    echo '<li class="nav-item">';
?>
  <a class="nav-link" href="salesReport.php">
  <i class="fas fa-table"></i>
    <span> Sales Report</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">
<!-- Heading -->
<div class="sidebar-heading">
  Profile
</div>

<!-- Nav Item - Pages Collapse Menu -->
<?php
  if($curPageName == "myProfile.php" || $curPageName == "updateProfile.php" || $curPageName == "changePassword.php" || $curPageName == "deleteAccount.php" || $curPageName == "update_img.php")
  echo '<li class="nav-item active">';
  else
    echo '<li class="nav-item">';
?>
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
    <i class="fas fa-user-circle"></i>
    <span>My Profile</span>
  </a>
  <div id="collapse1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Profile Details</h6>
      <a class="collapse-item" href="myProfile.php">Profile</a>
      <a class="collapse-item" href="updateProfile.php">Edit Details</a>
      <a class="collapse-item" href="changePassword.php">Change Password</a>
      <a class="collapse-item" href="update_img.php">Update Profile Picture</a>
      <a class="collapse-item" href="deleteAccount.php">Delete Account</a>
      <a class="collapse-item" href="../logout.php">Logout</a>
    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">



<!-- Heading -->
<div class="sidebar-heading">
  Shop & Produts
</div>
<?php
  if($curPageName == "addShop.php")
  echo '<li class="nav-item active">';
  else
    echo '<li class="nav-item">';
?>
<a class="nav-link" href="addShop.php">
    <i class="fas fa-shopping-bag"></i>
    <span>Add New Shop</span>
  </a>
  </li>
<!-- Nav Item - Manage Products - Pages Collapse Menu -->
<?php
  if($curPageName == "productstable.php" || $curPageName == "addProduct.php" || $curPageName == "modifyProducts.php" || $curPageName == "deleteProduct.php" || $curPageName == "update_product_img.php")
  echo '<li class="nav-item active">';
  else
    echo '<li class="nav-item">';
?>
  <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-folder"></i>
    <span>Manage Shop/Products</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Shops</h6>
      <a class="collapse-item" href="productstable.php">View Products</a>
      <a class="collapse-item" href="addProduct.php">Add New Product</a>
      <?php  $count = 0; $count2 = 0;
        foreach($trader->getShopId() as $sid)
        { echo '<h6 class="collapse-header">'.$trader->getShopName()[$count].'</h6>'; $count++;
          $st1 = oci_parse($trader->connect(), "SELECT * FROM PRODUCT WHERE SHOP_ID = $sid AND ROWNUM = 1");
          oci_execute($st1); 
          while($row = oci_fetch_assoc($st1))
          { $count2++;
        ?>
        <a class="collapse-item" href="modifyProducts.php?pid=<?php echo $row['PRODUCT_ID']; ?>">Update Products</a>
        <a class="collapse-item" href="update_product_img.php?pid=<?php echo $row['PRODUCT_ID']; ?>">Update Product Images</a>
        <?php 
        } } if($count2 == 0) { echo '<span class="collapse-header text-muted">No Products Available!</span>'; }
          ?> 
          
      <!-- Divider -->
      <hr class="sidebar-divider" style="background:silver">
      <a class="collapse-item" href="deleteProduct.php">Delete Product</a>
    </div>
  </div>
</li>

<!-- Nav Item - Manage Discounts - Pages Collapse Menu -->
<?php
  if($curPageName == "addDiscount.php" || $curPageName == "updateDiscount.php" || $curPageName == "removeDiscount.php")
  echo '<li class="nav-item active">';
  else
    echo '<li class="nav-item">';
?>
  <a class="nav-link" href="#" data-toggle="collapse" data-target="#manageDiscount" aria-expanded="true" aria-controls="manageDiscount">
    <i class="fas fa-fw fa-folder"></i>
    <span>Manage Discount</span>
  </a>
  <div id="manageDiscount" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Discounts</h6>
      
      <?php  $count = 0;
        foreach($trader->getShopId() as $sid)
        { echo '<h6 class="collapse-header">'.$trader->getShopName()[$count].'</h6>'; $count++;
        $st1 = oci_parse($trader->connect(), "SELECT * FROM PRODUCT WHERE SHOP_ID = $sid AND ROWNUM = 1");
        oci_execute($st1);  $count2 = 0;
        while($row = oci_fetch_assoc($st1))
        { $count2++;
      ?>
      <a class="collapse-item" href="addDiscount.php?pid=<?php echo $row['PRODUCT_ID']; ?>&sid=<?php echo $sid; ?>">Add Discount</a>
      <a class="collapse-item" href="updateDiscount.php?pid=<?php echo $row['PRODUCT_ID']; ?>&sid=<?php echo $sid; ?>">Update Discount</a>

      <?php }  } if($count2 == 0) { echo '<span class="collapse-header text-muted">No Products Available!</span>'; }?>
            <!-- Divider -->
            <hr class="sidebar-divider" style="background:silver">
      <a class="collapse-item" href="removeDiscount.php">View/Remove Discount</a>
    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Review and Ratings -->
<?php
  if($curPageName == "reviews.php")
  echo '<li class="nav-item active">';
  else
    echo '<li class="nav-item">';
?>
  <a class="nav-link" href="reviews.php">
  <i class="fas fa-star-half-alt"></i>
    <span> Review and Ratings</span></a>
</li>



<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->