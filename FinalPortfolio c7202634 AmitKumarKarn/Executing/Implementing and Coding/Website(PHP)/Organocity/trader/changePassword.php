 

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
          <h2 class="card-title h4 pb-2"><strong>Edit User Profile</strong></h2>

          <br /><br />
    
          <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){   
                if( $trader->validatePassword($_SESSION['user_id'], $_REQUEST['oldpassword'], $_REQUEST['newpassword'], $_REQUEST['cpassword']))
                {
                    $tader->updatePassword($_SESSION['user_id'],$_REQUEST['newpassword']);
                    ?>
                        <script>
                            alert("Password updated successfully!");
                            window.location.href = "my_account.php";
                        </script>
            
                    <?php
            
                }
            }
            
            ?>
              
              <!-- Change Password Card -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-center">Update Password</h6>
                </div>
                <div class="card-body">
                   




                <h1 align="center"><i class="fas fa-unlock"> Change Password</i></h1>

                <form class="pass-form" action="changePassword.php" method="POST" enctype="multipart/form-data"> <!---form begin-->

                    <!-- Old Password -->
                    <label for="oldpassword" style="float:left;">Old Password: </label>
                    <input type="password" name="oldpassword" class="form-control" placeholder="Old Password" value="<?php if(isset($_POST['oldpassword'])) {echo $_POST['oldpassword']; } ?>" required >
                    <?php
                        if(!empty($_SESSION['wrongpassword']))
                        {
                            echo '<span class="text-danger">'.$_SESSION['wrongpassword'].'</span>';
                        }
                    ?>
                    <br />

                    <!-- New Password -->
                    <label for="newpassword" style="float:left;">New Password: </label>
                    <input type="password" name="newpassword" class="form-control" placeholder="New Password" value="<?php if(isset($_POST['newpassword'])) {echo $_POST['newpassword']; } ?>" required>
                    <?php
                        if(!empty($_SESSION['invalidpassword']))
                        {
                            echo '<span class="text-danger">'.$_SESSION['invalidpassword'].'</span>';
                        }
                    ?>
                    <br />

                    <!-- Confirm Password -->
                    <label for="cpassword" style="float:left;">Confirm Password: </label>
                    <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" value="<?php if(isset($_POST['cpassword'])) {echo $_POST['cpassword']; } ?>" required>
                    <?php
                        if(!empty($_SESSION['passworddifferent']))
                        {
                            echo '<span class="text-danger">'.$_SESSION['passworddifferent'].'</span>';
                        }
                    ?>
                    <br />

                    <div class="form-group "> <!--Form-group Begin-->



                    <div class="text-center"> <!--text center begin-->

                    <button text="submit" name="submit" class="btn btn-primary"> <!--btn btn-primary start-->
                
                    <i class="fa fa-lock"> </i> Change Password

                    </button> <!--btn btn-primary end-->

                    </div> <!--text center end-->

                </form> <!--Form End-->

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
