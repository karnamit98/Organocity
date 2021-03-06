
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Organocity Trader</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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

        <?php $scount = 0; foreach($trader->getShopId() as $shopId) { ?>
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?php echo $trader->getShopName()[$scount]; ?></h1>
          <p class="mb-4">Shop Location: <?php echo $trader->getShopLocation()[$scount]; ?> </p>
          <?php
             if(!($trader->getShopProductsCount($shopId) == 0)) { ?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Products added to <?php echo $trader->getShopName()[$scount]; ?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>ID</th>
                      <th>Name</th>
                      <th>Image1</th>
                      <th>Price</th>
                      <th>Discount Name</th>
                      <th>Discount Percent</th>
                      <th>Remove Discount</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Image1</th>
                      <th>Price</th>
                      <th>Discount Name</th>
                      <th>Discount Percent</th>
                      <th>Remove Discount</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                    $shop_id = $shopId;
                    $script = oci_parse($trader->connect(), "SELECT * FROM DISCOUNT d, PRODUCT p WHERE d.PRODUCT_ID = p.PRODUCT_ID AND  p.SHOP_ID = $shop_id");
                    oci_execute($script);
                    while($row = oci_fetch_assoc($script))
                    {
                        ?>
                            <tr>
                            <th><?php echo $row['PRODUCT_ID']; ?></th>
                            <th><?php echo $row['PRODUCT_NAME']; ?></th>
                            <th><img class="img-responsive" style="max-width:70px;filter:drop-shadow(0 0 2px #333333 );" 
                            src="../images/products/<?php echo $row['PRODUCT_IMAGE1']; ?>" alt="Product Image"></td></th>
                            <th><?php echo $row['PRODUCT_PRICE']; ?></th>
                            <th><?php echo strtoupper($row['DISCOUNT_NAME']); ?> </th>
                            <th><?php echo $row['DISCOUNT_PERCENT']; ?> %</th>
                             <th><!--form method = "POST" >
                                <a class="dropdown-item delModal" href="#" type="submit" data-toggle="modal" data-target="#deleteProductModal" value="<?php echo $row['PRODUCT_ID']; ?>"
                                name="del<?php //echo $row['PRODUCT_ID']; ?>">
                                    <i class="fas fa-trash text-danger"> Delete </i>
                                </a> </form> -->
                                <form  action="confirmRemove.php?delPID=<?php echo $row['DISCOUNT_ID']; ?>"  method = "POST" enctype="multipart/form-data" >
                                <button class="btn btn-danger" type="submit" name="deleteProductSubmit"> 
                                    <i class=" i fas fa-trash text-light"> Remove </i></button>
                                </form>


                            </th>
                            </tr>
                        <?php                        
                    }
                    // $script2 = oci_parse($trader->connect(), "SELECT * FROM PRODUCT WHERE SHOP_ID = $shop_id");
                    // oci_execute($script2);
                    // while($row = oci_fetch_assoc($script2))
                    // {
                    //     if(array_key_exists("del".$row['PRODUCT_ID'], $_POST))
                    //     {
                    //         $_SESSION['delPID'] = $row['PRODUCT_ID']; echo $_SESSION['delPPID'];
                    //     }
                    // }
                    

                  ?>
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
          <?php } else echo '<span class="text-warning">No Products Added Yet to this Shop!</span>'; $scount++; } ?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Organocity 2020</span>
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
            <span aria-hidden="true">??</span>
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

  <!-- Delete Product Modal-->
  <div class="modal fade" id="deleteDiscountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirm Delete?</h5>
          <a class="close" type="button"  data-dismiss="modal" aria-label="Close" >
            <span aria-hidden="true"  href="deleteProduct.php">??</span>
          </a>
        </div>
        <div class="modal-body">Are you sure you want to remove discount on this product?
        </div>
        <div class="modal-footer">
          <a class="btn btn-success" href="removeDiscount.php">Cancel</a>
          <a class="btn btn-danger" href="productstable.php?delDID=<?php echo $_GET['delDID']; ?>">Confirm Delete</a>
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

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <!-- show confirm modal -->
<script>
      $(document).ready(function(){
        $("#deleteDiscountModal").modal('show');
    });
  </script>

</body>

</html>

