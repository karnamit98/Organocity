

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
            

        <?php $scount = 0; foreach($trader->getShopId() as $shopId) { ?>
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 mx-auto">Add Products to <?php echo ucfirst($trader->getShopName()[$scount]); ?></h1>
          </div>

          
       

          <div class="row">

           

            <div class="col-lg-10 mx-auto">

              <!-- Dropdown Card Example -->
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-edit"></i> &nbsp;
                  Add New Product
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
                        ?><a class="dropdown-item" href="modifyProducts.php?pid=<?php echo $row['PRODUCT_ID']; ?>"><?php echo $row['PRODUCT_NAME']; ?></a><?php
                            }
                      ?>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body modify-form">
                    
                  <form action="productstable.php" enctype="multipart/form-data" method="POST">
                    <div class="row">

                         

                        <!-- Shop Name -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-shopping-bag text-muted"> Shop Name: </i>
                                </span>
                            </div>
                            
                            <input name="shopID" value="<?php echo $shopId; ?>" type="hidden" />
                            <input id="shopname" type="text" disabled name="shopname" value="<?php echo $trader->getShopName()[$scount]; ?>" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Product Name -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa  fa-carrot text-muted"> Product Name: </i>
                                </span>
                            </div>
                            <input id="productname" type="text" name="pname" required value="<?php if(isset($_POST['pname'])){ echo $_POST['pname']; }?>" class="form-control bg-white border-left-0 border-md">
                        </div>

                        

                        <!-- Stock Available -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa  fa-layer-group text-muted"> Stock Available: </i>
                                </span>
                            </div>
                            <input id="stockavailable" type="text" name="pstock" required value="<?php if(isset($_POST['pstock'])){ echo $_POST['pstock']; }  ?>" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Product Price -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-dollar-sign text-muted"> Product Price: &nbsp;Rs.</i>
                                </span>
                            </div>
                            <input id="productprice" type="text" name="pprice" required value="<?php if(isset($_POST['pprice'])){ echo $_POST['pprice']; } ?>" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Minimum Order -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa  fa-layer-group text-muted"> Minimum Order: </i>
                                </span>
                            </div>
                            <input id="minorder" type="text" name="pminorder" required value="<?php   if(isset($_POST['pminorder'])){ echo $_POST['pminorder']; } ?>" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Maximum Order -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-layer-group text-muted"> Maximum Order: </i>
                                </span>
                            </div>
                            <input id="maxorder" type="text" name="pmaxorder" required value="<?php   if(isset($_POST['pmaxorder'])){ echo $_POST['pmaxorder']; }?>" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Product Description -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-info text-muted"> Product Description: </i>
                                </span>
                            </div>
                            <input id="productdescription" type="textarea" required name="pdescription" value="<?php   if(isset($_POST['pdescription'])){ echo $_POST['pdescription']; }?>" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Allergy Information-->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-info text-muted"> Allergy Information:  </i>
                                </span>
                            </div>
                            <input id="allergyinfo" type="textarea" required name="pallergy" value="<?php   if(isset($_POST['pallergy'])){ echo $_POST['pallergy']; }  ?>" class="form-control bg-white border-left-0 border-md">
                        </div>

                      
                        <!-- Product Category -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-hamburger text-muted"> Product Category: </i>
                                </span>
                            </div>
                                <select id="category" name="pcategory" required class="form-control custom-select bg-white border-left-0 border-md">
                                <?php
                                $st1 = oci_parse($trader->connect(), "SELECT * FROM CATEGORY");
                                oci_execute($st1);
                                while($row1 = oci_fetch_assoc($st1))
                                {
                                ?>
                                    <option value="<?php echo $row1['CAT_ID']; ?>"><?php echo strtoupper($row1['CAT_NAME']); ?></option>
                                    <?php } ?>
                            </select>
                        </div>

                        <!-- Product Type -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-leaf text-muted"> Product Type: </i>
                                </span>
                            </div>
                                <select id="type" name="ptype" required class="form-control custom-select bg-white border-left-0 border-md">
                                <?php
                                $st3 = oci_parse($trader->connect(), "SELECT * FROM CATEGORY");
                                oci_execute($st3);
                                while($row1 = oci_fetch_assoc($st3))
                                {
                                ?>
                                    <option value="<?php echo strtoupper($row1['CAT_NAME']); ?>"><?php echo strtoupper($row1['CAT_NAME']); ?></option>
                                    <?php } ?>
                            </select>
                        </div>

                        <!-- Product Image 1 -->
                        <div class="input-group col-lg-4 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-image text-muted"> Image 1: </i>
                                </span>
                            </div>
                            <input id="pimage1" type="text" disabled name="primage1" value="<?php   if(isset($_POST['pimage1'])){ echo $_POST['pimage1']; } else {   //echo $row['PRODUCT_IMAGE1']; 
                            echo "default1.PNG"; } ?>" class="form-control bg-white border-left-0 border-md">
                            <input type="hidden" name="pimage1" value="default1.JPG" />
                        </div>

                        <!-- Product Image 2 -->
                        <div class="input-group col-lg-4 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-image text-muted"> Image 2: </i>
                                </span>
                            </div>
                            <input id="pimage2" type="text" disabled name="primage2" value="<?php   if(isset($_POST['pimage2'])){ echo $_POST['pimage2']; } else {   //echo $row['PRODUCT_IMAGE2']; 
                            echo "default1.PNG";  } ?>" class="form-control bg-white border-left-0 border-md">
                            <input type="hidden" name="pimage2" value="default1.JPG" />
                        </div>

                        <!-- Product Image 3 -->
                        <div class="input-group col-lg-4 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-image text-muted"> Image 3: </i>
                                </span>
                            </div>
                            <input id="pimage3" type="text" disabled name="primage3" value="<?php   if(isset($_POST['pimage3'])){ echo $_POST['pimage3']; } else {   //echo $row['PRODUCT_IMAGE2']; 
                            echo "default1.PNG"; } ?>" class="form-control bg-white border-left-0 border-md">
                            <input type="hidden" name="pimage3" value="default1.JPG" />
                        </div>
                        

                        <!-- Submit Button -->
                        <div class="form-group col-lg-12 mx-auto mb-0">
                            <input type="submit" name="addProductSubmit" class="btn btn-primary btn-block py-2 font-weight-bold"  value="Add Product Details">
                        </div>

                    </div>
                </form>
                        
                </div>
              </div>

             
            </div>

          </div>

        <?php $scount++; } ?>
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
