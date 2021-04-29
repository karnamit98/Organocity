<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){   
    if( $user->validatePassword($_SESSION['user_id'], $_REQUEST['oldpassword'], $_REQUEST['newpassword'], $_REQUEST['cpassword']))
    {
        $user->updatePassword($_SESSION['user_id'],$_REQUEST['newpassword']);
        ?>
            <script>
                alert("Password updated successfully!");
                window.location.href = "my_account.php";
            </script>

        <?php

    }
}

?>

<h1 align="center"> <i class="fa fa-unlock"> Change Password</i> </h1>

<form class="pass-form" action="my_account.php?change_pass" method="POST" enctype="multipart/form-data"> <!---form begin-->

    <!-- Old Password -->
    <input type="password" name="oldpassword" class="form-control" placeholder="Old Password" value="<?php if(isset($_POST['oldpassword'])) {echo $_POST['oldpassword']; } ?>" required >
    <?php
        if(!empty($_SESSION['wrongpassword']))
        {
            echo '<span class="text-danger">'.$_SESSION['wrongpassword'].'</span>';
        }
    ?>
    <br />

    <!-- New Password -->
    <input type="password" name="newpassword" class="form-control" placeholder="New Password" value="<?php if(isset($_POST['newpassword'])) {echo $_POST['newpassword']; } ?>" required>
    <?php
        if(!empty($_SESSION['invalidpassword']))
        {
            echo '<span class="text-danger">'.$_SESSION['invalidpassword'].'</span>';
        }
    ?>
    <br />

    <!-- Confirm Password -->
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
 
    <i class="fa fa-user-md"> </i> Update Now

    </button> <!--btn btn-primary end-->

    </div> <!--text center end-->

</form> <!--Form End-->