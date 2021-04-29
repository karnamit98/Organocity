<?php
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
.uimage {
  opacity: 1;
  display: block;
  /*width: 100%;*/
  /*height: auto;*/
  transition: .5s ease;
  backface-visibility: hidden;
}
    .middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
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

        <!-- Title -->
          <h2 class="card-title h4 pb-2"><strong>User Profile</strong></h2>

          <br /><br />
    
          
              
              <!-- Profile Details Card -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-center">Trader Details</h6>
                </div>
                <div class="card-body">
                <div class="row">
              
              <div class="col-xl-4 col-md-6">
              <center class="img-cont"><!--  center  Begin  -->
                <?php  
                    if(!empty($trader->user_image))
                    {
                ?>
                    <img class="img-fluid img-responsive rounded-circle uimage" src="../customer/customer_images/<?php echo $trader->user_image; ?>" alt="<?php echo $trader->fullname; ?>"
                    style="filter:drop-shadow(0 0 3px #1d1919);border:1.5px solid #ea9085;">
                <?php
                    }
                    else{
                        ?>
                        <img class="img-fluid img-responsive rounded-circle uimage" src="../customer/customer_images/defaultuser.PNG" alt="<?php echo $trader->fullname; ?>"
                        style="filter:drop-shadow(0 0 3px #1d1919);border:2px solid #fab95b;">
                        
                    <?php } ?>
                    <div class="middle">
                      <a class="text" href="update_img.php" target="blank">Upload/Change</a>
                    </div>
            </center><!--  center  Finish  -->
              </div>

              <div class="col-xl-8 col-md-6">

                <div class="table-responsive">
              <!--Table-->
              <table class="table">

                  <!--Table body-->
                  <tbody>
                  <tr>
                      <td><strong class="text-muted">Name</strong></td>
                      <td><?php echo $trader->fullname; ?></td>
                  </tr>
                  <tr>
                      <td><strong class="text-muted">Username</strong></td>
                      <td><?php echo $trader->username; ?></td>
                  </tr>
                  <tr>
                      <td><strong class="text-muted">Contact Number</strong></td>
                      <td><?php echo $trader->user_contact; ?></td>
                  </tr>
                  <tr>
                      <td><strong class="text-muted">Email</strong></td>
                      <td><?php echo $trader->user_email; ?></td>
                  </tr>
                  <tr>
                      <td><strong class="text-muted">Shop Name(s)</strong></td>
                      
                      <td><?php $sc = 0; foreach($trader->getShopId() as $sid) { if($sc>0) echo ", "; echo ucfirst($trader->getShopName()[$sc]); $sc++; } ?></td>
                  </tr>
                  </tbody>
                  <!--Table body-->

              </table>
              <!--Table-->

          </div>
          
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
