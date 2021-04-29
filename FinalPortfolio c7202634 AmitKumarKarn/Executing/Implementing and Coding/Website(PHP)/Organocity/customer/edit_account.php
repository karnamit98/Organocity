
<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST"){   
    if( $user->validateDetails($_SESSION['user_id'], $_REQUEST['username'], $_REQUEST['email'], $_REQUEST['user_contact']))
    {
        $user->updateDetails($_SESSION['user_id'],$_REQUEST['fullname'], $_REQUEST['username'], $_REQUEST['email'], $_REQUEST['user_contact']);
        ?>
            <script>
                alert("User details updated successfully!");
                window.location.href = "my_account.php";
            </script>

        <?php

    }
}
?>

<h1 align="center"><i class="fa fa-edit"> </i>  Edit Your Account </h1><br />

<!-- Default form  -->
<form class="text-center border border-light p-5 edit-form" action="my_account.php?edit_account" method="POST" enctype="multipart/form-data">


    <!-- Name -->
    <input type="text" name="fullname" class="form-control" value="<?php if(isset($_POST['fullname'])){ echo $_POST['fullname']; } else{ echo $user->fullname; } ?>">

    <br />

    <!-- Username -->
    <input type="text" name="username" class="form-control" value="<?php if(isset($_POST['username'])){ echo $_POST['username']; } else{ echo $user->username; } ?>">
    <?php
        if(!empty($_SESSION['duplicateusername']))
        {
            echo '<span class="text-danger">'.$_SESSION['duplicateusername'].'</span>';
        }
    ?>
    <br />

    <!-- Email -->
    <input type="email" name="email" class="form-control" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } else {echo $user->user_email; } ?>">
    <?php
        if(!empty($_SESSION['duplicateemail']))
        {
            echo '<span class="text-danger">'.$_SESSION['duplicateemail'].'</span>';
        }
    ?>
    <br />


    <!-- Contact -->
    <input type="text" name="user_contact" class="form-control" value="<?php if(isset($_POST['contact'])){ echo $_POST['contact']; } else { echo $user->user_contact; } ?>">

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
