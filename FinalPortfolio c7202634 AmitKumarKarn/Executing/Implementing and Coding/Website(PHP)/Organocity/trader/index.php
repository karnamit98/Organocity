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
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
           
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Total Income -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Earnings (Till Date)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rs. <?php echo $trader->getDashboardItem("income"); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <!-- Total Shops -->
             <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Shops </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $trader->getDashboardItem("shops"); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-shopping-bag fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            
            <!-- Total  Products-->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Products</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $trader->getDashboardItem("product count"); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-carrot fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!--Products that are out of stoct -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Out of Stock Products</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $trader->getDashboardItem("outofstock"); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-layer-group fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Products Sale ratio compared to other traders' shops -->
          <div class="col-xl-12 col-md-12 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Products' Sale ratio at Organocity</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $trader->getDashboardItem("salesRatio"); ?> %</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $trader->getDashboardItem("salesRatio"); ?>%" aria-valuenow="<?php echo $trader->getDashboardItem("salesRatio", $trader->getshopID()); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-shipping-fast fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

              <!-- Product Sales Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Contribution of Products on Total Sales' Income</h6>
                </div>
                <div class="card-body">

                <strong>Sort By:</strong>
                <form class="form"  action="index.php" enctype="multipart/form-data" method="POST">
                <div class="form-check " style="margin-right:3% !important;">
                  <input class="form-check-input" type="radio" name="sort" id="exampleRadios1" value="1" >
                  <label class="form-check-label" for="exampleRadios1">
                    Albhabetically
                  </label>
                </div>

                <div class="form-check" style="margin-right:3% !important;">
                  <input class="form-check-input" type="radio" name="sort" id="exampleRadios1" value="2" >
                  <label class="form-check-label" for="exampleRadios1">
                  Sales (Low to High)
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="radio" name="sort" id="exampleRadios1" value="3" >
                  <label class="form-check-label" for="exampleRadios1">
                    Sales (High to Low)
                  </label>
                </div>
                <input type="submit" class="btn btn-primary" value="sort" name="sortSubmit"/>
                </form>
                  <hr /><br /> 

                  <?php
                    $tid = $_SESSION['user_id'];
                    //$saleqry = oci_parse($trader->connect(), "SELECT  FROM ORDER_DETAILS o JOIN PRODUCT p ON o.PRODUCT_ID = p.PRODUCT_ID JOIN SHOP s
                      //                                      ON p.SHOP_ID = s.SHOP_ID WHERE s.SHOP_ID = $sid");
                    $query = "SELECT p.PRODUCT_NAME, SUM(o.SUB_TOTAL) SUBTOTAL, SUM(o.PRODUCT_QUANTITY) QUANTITY  FROM ORDER_DETAILS o JOIN PRODUCT p ON o.PRODUCT_ID = p.PRODUCT_ID JOIN SHOP s
                    ON p.SHOP_ID = s.SHOP_ID WHERE s.TRADER_ID = $tid
                    GROUP BY o.SUB_TOTAL, o.PRODUCT_QUANTITY, p.PRODUCT_NAME";
                    if(isset($_POST['sortSubmit']))
                    {
                      $sort = $_POST['sort'];
                      if($sort == 1)
                      {
                        $query = "SELECT p.PRODUCT_NAME, SUM(o.SUB_TOTAL) SUBTOTAL, SUM(o.PRODUCT_QUANTITY) QUANTITY  FROM ORDER_DETAILS o JOIN PRODUCT p ON o.PRODUCT_ID = p.PRODUCT_ID JOIN SHOP s
                        ON p.SHOP_ID = s.SHOP_ID WHERE s.TRADER_ID = $tid
                        GROUP BY o.SUB_TOTAL, o.PRODUCT_QUANTITY, p.PRODUCT_NAME ORDER BY p.PRODUCT_NAME";
                      }
                      else if($sort == 2)
                      {
                        $query = "SELECT p.PRODUCT_NAME, SUM(o.SUB_TOTAL) SUBTOTAL, SUM(o.PRODUCT_QUANTITY) QUANTITY  FROM ORDER_DETAILS o JOIN PRODUCT p ON o.PRODUCT_ID = p.PRODUCT_ID JOIN SHOP s
                        ON p.SHOP_ID = s.SHOP_ID WHERE s.TRADER_ID = $tid
                        GROUP BY o.SUB_TOTAL, o.PRODUCT_QUANTITY, p.PRODUCT_NAME ORDER BY SUBTOTAL ASC";
                      }
                      else 
                      {
                        $query = "SELECT p.PRODUCT_NAME, SUM(o.SUB_TOTAL) SUBTOTAL, SUM(o.PRODUCT_QUANTITY) QUANTITY  FROM ORDER_DETAILS o JOIN PRODUCT p ON o.PRODUCT_ID = p.PRODUCT_ID JOIN SHOP s
                        ON p.SHOP_ID = s.SHOP_ID WHERE s.TRADER_ID = $tid
                        GROUP BY o.SUB_TOTAL, o.PRODUCT_QUANTITY, p.PRODUCT_NAME ORDER BY SUBTOTAL DESC";
                      }
                    }
                    
                    
                    $saleqry = oci_parse($trader->connect(), $query);
                    oci_execute($saleqry);
                    $totalSales = 0;
                    while($row1 = oci_fetch_assoc($saleqry)){ $totalSales += $row1['SUBTOTAL']; }
                    oci_execute($saleqry);
                    while($row2 = oci_fetch_assoc($saleqry)){ 
                        $thisSale = ($row2['SUBTOTAL']/$totalSales) * 100; 
                    
                  ?>
                  <h4 class="small font-weight-bold"><?php echo ucfirst($row2['PRODUCT_NAME']); ?> x <?php echo $row2['QUANTITY']; ?>
                  (Rs.<?php echo $row2['SUBTOTAL']; ?>) <span class="float-right"><?php echo round($thisSale, 2); ?>%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo round($thisSale, 2); ?>%" aria-valuenow="<?php echo round($thisSale, 2); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                 
                    <?php } ?>
                </div>
              </div>


            </div>

            
          </div>

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

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
