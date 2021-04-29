 

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Organocity Trader</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">



</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php include 'includes/sidebar.inc.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <?php include 'includes/topbar.inc.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <?php 
                if(count($trader->getShopId()) == 0)
                   { 
                       echo "No Shops Added Yet!"; 
                
                       ?>
                            <a href="addShop.php" >Add New Shop</a>

                       <?php
                }
                   
            ?>
        
        <?php $scount = 0; foreach($trader->getShopId() as $shopId) { ?>

        <!-- Title -->
          <h2 class="card-title h4 pb-2"><strong>Edit Products' Images of <?php echo ucfirst($trader->getShopName()[$scount]); ?></strong></h2>
          
          <?php if(!($trader->getShopProductsCount($shopId) == 0)) { ?>
          <br /><br />
    
           
                

             <!-- Update Image 1 Card -->
             <div class="card shadow mb-4">
             <!-- Card Header - Dropdown -->
             <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-edit"></i> &nbsp;
                  <?php
                    $pid = $_GET['pid'];
                    $scr = oci_parse($trader->connect(), "SELECT * FROM PRODUCT WHERE PRODUCT_ID = $pid AND SHOP_ID = $shopId");
                    oci_execute($scr);
                    $imgName = "";
                    $pID = 0;
                    while($row = oci_fetch_assoc($scr))
                    {
                        $pID = $row['PRODUCT_ID'];
                        echo strtoupper($row['PRODUCT_NAME']);
                        $imgName = strtoupper($row['PRODUCT_NAME']);;
                    }?>
                  </h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Select Other Product<i class="fas  fa-chevron-circle-down fa-fw text-primary"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Products</div>
                      <div class="dropdown-divider"></div>
                      <?php 
                            $shop_id = $shopId;
                            $sc = oci_parse($trader->connect(), "SELECT * FROM PRODUCT WHERE SHOP_ID = $shop_id ");
                            oci_execute($sc);
                            while($row = oci_fetch_assoc($sc))
                            { 
                        ?><a class="dropdown-item" href="update_product_img.php?pid=<?php echo $row['PRODUCT_ID']; ?>"><?php echo $row['PRODUCT_NAME']; ?></a><?php
                            }
                      ?>
                    </div>
                  </div>
                </div>
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-center">Update <?php echo $imgName; ?>'s Images</h6>
                </div>
                <div class="card-body">
                <div class="row">
                <?php  
                        $productid = $_GET['pid'];
                        $scrpt = oci_parse($trader->connect(), "SELECT * FROM PRODUCT WHERE PRODUCT_ID = $productid AND SHOP_ID = $shopId");
                        oci_execute($scrpt);
                        while($row = oci_fetch_assoc($scrpt))
                        {
                    ?>
                <div class="col-md-4">
              <!-- Update Image 1 Card -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-center"><?php echo $imgName; ?> Image 1</h6>
                </div>
                <div class="card-body">
                <h3 align="center"> <i class="fa fa-image"> Update Image 1</i> </h3>

                <form class="pass-form" action="uploadProductImage.php?img=1&pid=<?php echo $pID; ?>" method="POST" enctype="multipart/form-data"> <!---form begin-->

                    Select image to upload:
                    <input type="file" name="fileToUpload" id="fileToUpload" required>


                    <div class="text-center"> <!--text center begin-->

                    <button text="submit" name="uploadImage" class="btn btn-primary"> <!--btn btn-primary start-->
                
                    <i class="fa fa-image"> </i> Upload Image 1

                    </button> <!--btn btn-primary end-->

                    </div> <!--text center end-->

                </form> <!--Form End-->                
                </div>
              </div>

              </div>
              <div class="col-md-4">

              <!-- Update Image 2 Card -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-center"><?php echo $imgName; ?> Image 2</h6>
                </div>
                <div class="card-body">
                <h3 align="center"> <i class="fa fa-image"> Update Image 2</i> </h3>

                <form class="pass-form" action="uploadProductImage.php?img=2&pid=<?php echo $pID; ?>" method="POST" enctype="multipart/form-data"> <!---form begin-->

                    Select image to upload:
                    <input type="file" name="fileToUpload" id="fileToUpload" required>


                    <div class="text-center"> <!--text center begin-->

                    <button text="submit" name="uploadImage" class="btn btn-primary"> <!--btn btn-primary start-->
                
                    <i class="fa fa-image"> </i> Upload Image 2

                    </button> <!--btn btn-primary end-->

                    </div> <!--text center end-->

                </form> <!--Form End-->                
                </div>
                        
              </div>

              </div>
              <div class="col-md-4">

              <!-- Update Image 3 Card -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-center"><?php echo $imgName; ?> Image 3</h6>
                </div>
                <div class="card-body">
                <h3 align="center"> <i class="fa fa-image"> Update Image 3</i> </h3>

                <form class="pass-form" action="uploadProductImage.php?img=3&pid=<?php echo $pID; ?>" method="POST" enctype="multipart/form-data"> <!---form begin-->

                    Select image to upload:
                    <input type="file" name="fileToUpload" id="fileToUpload" required>


                    <div class="text-center"> <!--text center begin-->

                    <button text="submit" name="uploadImage" class="btn btn-primary"> <!--btn btn-primary start-->
                
                    <i class="fa fa-image"> </i> Upload Image 3

                    </button> <!--btn btn-primary end-->

                    </div> <!--text center end-->

                </form> <!--Form End-->                
                </div>
              </div>
               <?php } ?>
              </div>
              </div></div>
              </div>
              
                        <?php }else{ echo '<span class="text-warning">No Products Added Yet to this Shop!</span>';} $scount++; } ?>
            
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Organocity 2020 </span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
