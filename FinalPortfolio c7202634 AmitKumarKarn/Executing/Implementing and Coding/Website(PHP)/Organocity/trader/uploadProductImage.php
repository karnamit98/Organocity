<?php
include '../includes/dbconnection.inc.php';
include '../includes/check_session.inc.php';
$db = new DB;
$target_dir = "../images/products/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["uploadImage"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) { 
    //echo "File is an image - " . $check["mime"] . ".";
    //echo '<script> alert("File is an image - ' . $check["mime"] . '.");
    //window.location = "my_account.php";</script>';
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    ?><script> alert("File is not an image.");
    window.location = "myProfile.php";</script><?php
    $uploadOk = 0;
  }


// Check if file already exists
if (file_exists($target_file)) { 
  //echo "Sorry, file already exists.";
  ?><script> alert("Sorry, file already exists.");
  window.location = "myProfile.php";</script><?php
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) { 
  //echo "Sorry, your file is too large.";
  ?><script> alert("Sorry, your file is too large.");
  window.location = "myProfile.php";</script><?php
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  ?><script> alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
  window.location = "myProfile.php";</script><?php
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
  ?><script> alert("Sorry, your file was not uploaded.");
  window.location = "myProfile.php";</script><?php
  }
// if everything is ok, try to upload file

 else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded."; ?>
    <script> //alert("The file "<?php //echo basename( $_FILES["fileToUpload"]["name"]); ?>" has been uploaded.");
    //window.location = "my_account.php";</script><?php

    $imgname =  basename( $_FILES["fileToUpload"]["name"]);
    $uid = $_SESSION['user_id'];
    $pid = $_GET['pid'];
    $img = $_GET['img'];
    $query = "";
    if($img == 1)
        $query = "UPDATE PRODUCT SET PRODUCT_IMAGE1 = '$imgname' WHERE PRODUCT_ID = $pid";
    else if($img == 2)
        $query = "UPDATE PRODUCT SET PRODUCT_IMAGE2 = '$imgname' WHERE PRODUCT_ID = $pid";
    else
        $query = "UPDATE PRODUCT SET PRODUCT_IMAGE3 = '$imgname' WHERE PRODUCT_ID = $pid";
    $uquery = oci_parse($db->connect(), $query);
    if(oci_execute($uquery))
    {
        $_SESSION['pimg_uploaded'] = true;
        $_SESSION['pfilename'] = basename( $_FILES["fileToUpload"]["name"]);
        echo '<script>alert("Image was updated successfully");window.location.href="productstable.php";</script>';
    }
    //header('Location: my_account.php');
  } else {
    //echo "Sorry, there was an error uploading your file.";
    ?><script> alert("Sorry, there was an error uploading your file.");
   window.location = "productstable.php";</script><?php
  }
}
}
?>