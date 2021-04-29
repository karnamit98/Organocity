

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

  <style>
            
        .modify-form .border-md {
            border-width: 2px;
        }

        .modify-form .btn-facebook {
            background: #405D9D;
            border: none;
        }

        .modify-form .btn-facebook:hover, .btn-facebook:focus {
            background: #314879;
        }

        .modify-form .btn-twitter {
            background: #42AEEC;
            border: none;
        }

        .modify-form .btn-twitter:hover, .btn-twitter:focus {
            background: #1799e4;
        }

        .modify-form .form-control:not(select) {
            padding: 1.5rem 0.5rem;
        }

        .modify-form select.form-control {
            height: 52px;
            padding-left: 0.5rem;
        }

        .modify-form .form-control::placeholder {
            color: #ccc;
            font-weight: bold;
            font-size: 0.9rem;
        }
        .modify-form .form-control:focus {
            box-shadow: none;
        }

  </style>

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
            <h1 class="h3 mb-0 text-gray-800 mx-auto">Add Discounts</h1>
          </div>

          
       

          <div class="row">

            

            <div class="col-lg-10 mx-auto">

              <!-- Dropdown Card  -->
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-edit"></i> &nbsp;
                  <?php
                    $pid = $_GET['pid'];
                    $scr = oci_parse($trader->connect(), "SELECT * FROM PRODUCT WHERE PRODUCT_ID = $pid");
                    oci_execute($scr);
                    while($row = oci_fetch_assoc($scr))
                    {
                        echo strtoupper($row['PRODUCT_NAME']);
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
                            $shop_id = $_GET['sid'];
                            $sc = oci_parse($trader->connect(), "SELECT * FROM PRODUCT WHERE SHOP_ID = $shop_id ");
                            oci_execute($sc);
                            $pdid = 0;
                            $discount_count = 0;
                            $product_count = 0;
                            while($row = oci_fetch_assoc($sc))
                            {
                                $product_count++;
                                $discount_exists = false;
                                $tid = $_SESSION['user_id'];
                                $sc1 = oci_parse($trader->connect(), "SELECT * FROM DISCOUNT d, PRODUCT p WHERE p.PRODUCT_ID = d.PRODUCT_ID AND d.USER_ID = $tid");
                                oci_execute($sc1);
                                while($row1 = oci_fetch_assoc($sc1))
                                {
                                    if($row['PRODUCT_ID'] == $row1['PRODUCT_ID'])
                                    {
                                        $discount_exists = true;
                                        $discount_count++;
                                        $pdid = $row['PRODUCT_ID'];
                                    }
                                }
                               // if(!$discount_exists) {
                            ?><a class="dropdown-item" href="addDiscount.php?pid=<?php echo $row['PRODUCT_ID']; ?>&sid=<?php echo $shop_id; ?>"><?php echo $row['PRODUCT_NAME']; ?></a><?php
                                //}
                            }
                            
                            if($product_count == $discount_count)
                            {
                                ?>
                                <a class="dropdown-item" href="updateDiscount.php?pid=<?php echo $pdid; ?>">
                                All of your products have discounts already added! Go to <br/>
                                Modify Discount</a><?php
                            }
                      ?>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body modify-form">
                    <?php  
                        $productid = $_GET['pid'];
                        $scrpt = oci_parse($trader->connect(), "SELECT * FROM PRODUCT WHERE PRODUCT_ID = $productid");
                        oci_execute($scrpt);
                        while($row = oci_fetch_assoc($scrpt))
                        {
                    ?>
                  <form action="productstable.php" enctype="multipart/form-data" method="POST">
                    <div class="row">

                         <div class="col-lg-2 mb-4">
                            
                            <?php
                                $pame = "";
                                $prid = $row['PRODUCT_ID'];
                                $imgqry = oci_parse($trader->connect(), "SELECT * FROM PRODUCT WHERE PRODUCT_ID = $prid");
                                oci_execute($imgqry);
                                while($row1 = oci_fetch_assoc($imgqry))
                                {
                                    $pname = $row1['PRODUCT_NAME'];
                                    echo '<img src="../images/products/'.$row1['PRODUCT_IMAGE1'].'" class="img-responsive" 
                                    alt="Product Image" style="width:150px; border-radius:5px 5px;" />';
                                }
                            ?>

                         </div>

                         <div class="col-lg-10 mb-4">

                            <!-- Product Name -->
                            <div class="input-group col-lg-12 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                                        <i class="fas  fa-tag text-muted"> Product Name: </i>
                                    </span>
                                </div>
                                <input id="productName" type="text" name="pname" value="<?php if(isset($_POST['pname'])){ echo $_POST['pname']; } else {  echo strtoupper($pname); }?>" class="form-control bg-white border-left-0 border-md">
                                <input name="pID" type="hidden" value="<?php echo $prid; ?>" />
                            </div>

                            <!-- Discount Name -->
                            <div class="input-group col-lg-12 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                                        <i class="fas  fa-tag text-muted"> Discount Name: </i>
                                    </span>
                                </div>
                                <input id="discountName" type="text" name="dname" value="<?php if(isset($_POST['dname'])){ echo $_POST['dname']; } ?>" class="form-control bg-white border-left-0 border-md">
                            </div>

                            <!-- Discount Percent -->
                            <div class="input-group col-lg-12 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                                        <i class="fa fa-percent text-muted"> Discount Percent: &nbsp;</i>
                                    </span>
                                </div>
                                <input id="discountPercent" type="text" name="dpercent" value="<?php if(isset($_POST['dpercent'])){ echo $_POST['dpercent']; } ?>" class="form-control bg-white border-left-0 border-md">
                            </div>

                        </div>

                        <!-- Submit Button -->
                        <?php
                        $qery = oci_parse($trader->connect(), "SELECT * FROM DISCOUNT WHERE PRODUCT_ID = $prid");
                        $check = false;
                        oci_execute($qery);
                        while($row4 = oci_fetch_assoc($qery))
                        {
                            $check = true;
                        }

                        if($product_count == $discount_count)
                            {
                            ?><div class="form-group col-lg-12 mx-auto mb-0">
                                <input type="submit" name="addDiscountSubmit" disabled class="btn btn-primary btn-block py-2 font-weight-bold "  value="Add Discount">
                                <center>All of your products have discounts already added! Go to 
                                <a  href="updateDiscount.php?pid=<?php echo $pdid; ?>">
                                <strong>Modify Discount</strong></a></center>
                            </div>
                                <?php
                            }
                            else if($check) {
                                ?><div class="form-group col-lg-12 mx-auto mb-0">
                                <input type="submit" name="addDiscountSubmit" disabled class="btn btn-primary btn-block py-2 font-weight-bold "  value="Add Discount">
                                <center>Discounts on '<?php echo strtoupper($pname); ?>' already exists! <br /> Go to 
                                <a  href="updateDiscount.php?pid=<?php echo $prid; ?>">
                                <strong class="text-success">Modify Discount</strong></a> to update discounts on on '<?php echo strtoupper($pname); ?>'!</center>
                            </div>
                                <?php
                             } 


                            
                            else { ?>
                        <div class="form-group col-lg-12 mx-auto mb-0">
                            <input type="submit" name="addDiscountSubmit" class="btn btn-primary btn-block py-2 font-weight-bold "  value="Add Discount">
                        </div>
                            <?php } ?>
                    </div>
                </form>
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

  <!-- Form -->
  <script>
    $(function () {
        $('input, select').on('focus', function () {
            $(this).parent().find('.input-group-text').css('border-color', '#80bdff');
        });
        $('input, select').on('blur', function () {
            $(this).parent().find('.input-group-text').css('border-color', '#ced4da');
        });
    });
  </script>

</body>

</html>
