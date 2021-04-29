<?php
    include '../includes/check_session.inc.php';
    include 'includes/dbconnection.inc.php';

    $db = new DB;
    $uid = $_SESSION['user_id'];
    //retrieve email id
    $query = oci_parse($db->connect(), "SELECT * FROM USERS WHERE USER_ID = $uid");
    oci_execute($query);
    $email = "";
    while($row = oci_fetch_assoc($query))
    {
        $email = $row['USER_EMAIL'];
    }
    $to_email = $email;
    //$to_email = "amit.karn98@gmail.com";
    $subject = 'Account Verification' ;
    $body = '<div class="jumbotron" 
    style="width:auto;height:auto;background: #343434;font-weight:100; text-align:center;padding:3.3%;border-radius:6px 6px;">
    <h2 style="text-align:center; color:#fcfaf1">Account Verification from <strong style="color:#79d70f">Organocity</strong> Online Grocery Store!</h2> 
    <h3 style="color:#ff6337;" >Click on this <a href="localhost/Organocity/customer/verifyMail.php?uid='.$uid.'" 
    style="background:#0779e4;padding:9px;border-radius:3px 3px;text-decoration:none;color:#f4ff61">Verification Link</a>
    to verify your account! </h3>
    </div>';
    //$headers = "From: organocityorg@gmail.com";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <organocityorg@example.com>' . "\r\n";
    $headers .= 'Cc: '.$to_email.'' . "\r\n";


    $sent_status = 0;
    if (mail($to_email, $subject, $body, $headers)) {
        $sent_status = 1; 
    } else {
        $sent_status = 0; 
    }

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
    background: -webkit-linear-gradient(-70deg, #fa7c30 30%, rgba(0, 0, 0, 0) 30%), url('images/vegbg.JPG');
    background: -o-linear-gradient(-70deg, #fa7c30 30%, rgba(0, 0, 0, 0) 30%), url('images/vegbg.JPG');
    background: -moz-linear-gradient(-70deg, #fa7c30 30%, rgba(0, 0, 0, 0) 30%), url('images/vegbg.JPG');
    background: linear-gradient(-70deg, #fa7c30 30%, rgba(0, 0, 0, 0) 30%), url('images/vegbg.JPG');
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
    <?php if($sent_status == 1) { ?>
    <span style="color:#52de97">An email was sent to '<?php echo $email; ?>'!</span><br/>Please confirm the verification process by clicking on the link provided!<br /> 
    If you still haven't got any mail please recheck your mail address that you provided to us!<br /><br />
    <?php } else{ ?>
        <span style="color:#f7be16">The email couldn't sent to '<?php echo $email; ?>'!</span><br/>Please  recheck your mail address that you provided to us!<br /><br />
    <?php } ?>
    <a href="my_account.php" class="btn btn-outline-warning backbtn" style="">Go back to your Account</a>

    </div>

  </div>
</div>
</body>
</html>