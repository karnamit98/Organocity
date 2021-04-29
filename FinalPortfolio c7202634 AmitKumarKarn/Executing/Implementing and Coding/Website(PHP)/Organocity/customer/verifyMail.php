<?php
    include '../includes/check_session.inc.php';
    include 'includes/dbconnection.inc.php';

    $db = new DB;
    $uid = $_SESSION['user_id'];
    //$vuid = $GET['uid'];
    //retrieve email id
    $query1 = oci_parse($db->connect(), "UPDATE USERS SET VERIFICATION_STATUS = 1 WHERE USER_ID = $uid");
    oci_execute($query1);
        $_SESSION['verification_status'] == 1;
    $email = "";
    $query = oci_parse($db->connect(), "SELECT * FROM USERS WHERE USER_ID = $uid");
    oci_execute($query);
    $email = "";
    while($row = oci_fetch_assoc($query))
    {
        $email = $row['USER_EMAIL'];
    }
    //$email ="amit.karn98@gmail.com";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Organocity</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <style>
        .body {
  font-size: 15px; padding:0;
}

.card-holder {
  /*margin: 2em 0; */
}

.card {
  font-family: -apple-system, BlinkMacSystemFont, 'Open Sans', sans-serif;
  font-size: 3em;
  font-weight: 800;
  width: 64em;
  padding: 0.5em 1em;
  /*border-radius: 0.25em; */
  display: table-cell;
  vertical-align: middle;
  letter-spacing: -1.5px;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.card .subtle {
  color: #000;
  font-size: 0.5em;
  font-weight: 400;
  letter-spacing: 1px;
}

.card i {
  font-size: 3em;
}

.bg-aurora {
    color: #fff;
    background: -webkit-linear-gradient(-70deg, #00bd56 30%, rgba(0, 0, 0, 0) 30%), url('images/vegbg3.JPG');
    background: -o-linear-gradient(-70deg, #00bd56 30%, rgba(0, 0, 0, 0) 30%), url('images/vegbg3.JPG');
    background: -moz-linear-gradient(-70deg, #00bd56 30%, rgba(0, 0, 0, 0) 30%), url('images/vegbg3.JPG');
    background: linear-gradient(-70deg, #00bd56 30%, rgba(0, 0, 0, 0) 30%), url('images/vegbg3.JPG');
  background-size: cover;
  background-position: 50% 21%;
  text-align: right;
  height:100vh;
}
  .jumbotron-custom {
    width:auto;height:auto;background: rgba(99,110,127,0.58);font-weight:100;font-size:0.7em;padding:3.3%;border-radius:6px 6px;
  }
  .backbtn {
    letter-spacing: 2px;font-weight:200;color:#f6d365;border:1.3px solid #f6d365;
  }
  .backbtn:hover {
      background:#f6d365;
      color:#ff502f;
  }

        </style>
</head>
<body>

<div class="card-holder">
  <div class="card bg-aurora">
    <a href="../index.php" style="text-decoration:none;color:#f6e7e6">Organocity.com</a>

    <div class="jumbotron  jumbotron-custom" style="">
    <span style="color:#ffe121">Your email '<?php echo $email; ?>' was successfully verified!</span><br/>Your account has now been activated and you 
    are allowed to buy products through our online store!<br /><br />
    
    <a href="my_account.php" class="btn btn-outline-warning backbtn" style="">Go back to your Account</a>

    </div>

  </div>
</div>
</body>
</html>