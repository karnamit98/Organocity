 

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
                if( $trader->validateDetails($_SESSION['user_id'], $_REQUEST['username'], $_REQUEST['email'], $_REQUEST['user_contact']))
                {
                    $trader->updateDetails($_SESSION['user_id'],$_REQUEST['fullname'], $_REQUEST['username'], $_REQUEST['email'], $_REQUEST['user_contact']);
                    ?>
                        <script>
                            alert("User details updated successfully!");
                            window.location.href = "myProfile.php";
                        </script>

                    <?php

                }
            }
            ?>
              
              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-center">Edit Details</h6>
                </div>
                <div class="card-body">
                   

                    <h1 align="center"><i class="fa fa-edit"> </i>  Edit Your Account </h1><br />

                    <!-- Default form  -->
                    <form class="text-center border border-light p-5 edit-form" action="updateProfile.php" method="POST" enctype="multipart/form-data">


                        <!-- Name -->
                        <label for="fullname" style="float:left;">FullName: </label>
                        <input type="text" name="fullname" class="form-control" value="<?php if(isset($_POST['fullname'])){ echo $_POST['fullname']; } else{ echo $trader->fullname; } ?>">

                        <br />

                        <!-- Username -->
                        <label for="username" style="float:left;">Username: </label>
                        <input type="text" name="username" class="form-control" value="<?php if(isset($_POST['username'])){ echo $_POST['username']; } else{ echo $trader->username; } ?>">
                        <?php
                            if(!empty($_SESSION['duplicateusername']))
                            {
                                echo '<span class="text-danger">'.$_SESSION['duplicateusername'].'</span>';
                            }
                        ?>
                        <br />

                        <!-- Email -->
                        <label for="email" style="float:left;">Email: </label>
                        <input type="email" name="email" class="form-control" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } else {echo $trader->user_email; } ?>">
                        <?php
                            if(!empty($_SESSION['duplicateemail']))
                            {
                                echo '<span class="text-danger">'.$_SESSION['duplicateemail'].'</span>';
                            }
                        ?>
                        <br />


                        <!-- Contact -->
                        <label for="user_contact" style="float:left;">Contact: </label>
                        <input type="text" name="user_contact" class="form-control" value="<?php if(isset($_POST['contact'])){ echo $_POST['contact']; } else { echo $trader->user_contact; } ?>">

                        <br />

                        <!--Upload Image-->
                        <!--input type="file" name="user_image" value="<?//php echo $user->user_image; ?>" class="col-lg-6 form-control  form-height-custom" required> 
                            
                        <br /><br /-->

                        <div class="text-center"> <!--text center begin-->

                            <button name="update" class="btn btn-primary"> <!--btn btn-primary start-->
                        
                            <i class="fa fa-edit"> </i> Update Now

                            </button> <!--btn btn-primary end-->

                        </div> <!--text center end-->

                    </form>
                    <!--  form  -->

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
