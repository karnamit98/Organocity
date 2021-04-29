

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

        <!-- Title -->
          <h2 class="card-title h4 pb-2"><strong> <i class="fas fa-trash "></i> Delete Account</strong></h2>

          <br /><br />
              
              <!--Delete Account Card -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-center">Delete Account</h6>
                </div>
                <div class="card-body">
                    <center> <!--center begin-->

                    <h1> Do you want to Delete Your Account ? </h1>

                    <a href="#" data-toggle="modal" data-target="#confirmDelete" class="btn btn-danger"><i class="fas fa-trash"></i> Yes, I want to Delete</a>
                    <!--input type="submit" name="Yes" value="Yes, I want to Delete" class="btn btn-danger">
                    <input type="submit" name="No" value="No, I don't want to Delete" class="btn btn-primary"-->
                    <a href="myProfile.php" class="btn btn-success"> No, I don't want to Delete</a>
              
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

  
<!-- Central Modal Medium Success -->
<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-notify modal-success" role="document">
     <!--Content-->
     <div class="modal-content">
       <!--Header-->
       <div class="modal-header">
         <p class="  text-center text-danger heading lead"><b> <i class="fas fa-trash ml-1 text-white"></i> Confirm Delete</b></p>

         <!--button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button-->

        
       </div>

       <!--Body-->
       <div class="modal-body">
       
         <div class="text-center">
         <!--img src="images/cart.PNG" alt="Cart Image" class="img-fluid img-responsive" style="margin: 0 auto" /-->
           <p>
            Deleting your account will result in removal of all the data related to your shop and your products to be deleted.
            Hence ending your business with our online platform.
           Last chance to change your mind!</p>
         </div>
       </di>

       <!--Footer-->
       <div class="modal-footer justify-content-center">
         <a href="deleteProcess.php?uid=<?php echo $_SESSION['user_id']; ?>" type="button" class="btn btn-danger "> <i class="fas fa-trash ml-1 text-white"></i> Confirm Delete</a>
         <a type="button" class="btn btn-success text-light" data-dismiss="modal">Cancel</a>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- Central Modal Medium Success-->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>




