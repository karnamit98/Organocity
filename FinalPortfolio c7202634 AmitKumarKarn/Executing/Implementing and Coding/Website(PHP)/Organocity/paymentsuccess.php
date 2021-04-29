<?php
    include 'includes/check_session.inc.php';
    include 'includes/dbconnection.inc.php';
    include 'slotSelection.php';
    include 'includes/postPayment.inc.php';
    //echo $_SESSION['userfullname'];
    $pp = new POSTPAYMENT; //$_SESSION['payment_amount'] = 5000;

    $uid = $_SESSION['user_id'];

    if(isset($_SESSION['orderAdded']))
    {
        if(!$_SESSION['orderAdded'])
        {   
         $pp->insertPayment();
         $pp->insertOrder($uid);
         $pp->insertOrderDetails($uid);
         $_SESSION['orderAdded'] = true;
        }
    }
    
    
    //$pp->destroyPaymentSession();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Success</title>
    <link rel="stylesheet" href="styles/successstyle.css" type="text/css">
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <style>
        body{
            
    /*background:url(images/banner1.JPG);*/
        }
        </style>
</head>
<body>

<div class="container-fluid" id=" header" style="background:#379601;color:#effffb;">
            <h2 class="text-center">ORGANOCITY</h2>
        </div>
        <div class="container main-cont" style="width:80%">
        <div id="shipStat"><br />
            <h2 class="text-center">Order has been Placed!</h2>
            <hr>
        </div>
        <?php 
            if(isset($_POST['slotsubmit']))
            {
                $slotnum = $_POST['slotselect'];
                $pp->updateOrder($slotnum);
                ?>
                <p class="init text-center" style="text-align:center;">
                    Your collection slot was booked successfully!<br/>
                    Go to your  
                    <a href="customer/my_account.php" 
                    style="color:#f8f8f8 !important;padding:3px;background:#414141;" >
                    user profile </a> &nbsp;for more details on that!
                </P>
                <?php
            }
        ?><style>.init a:hover{ 
            text-decoration:none;
            background:#ea5e5e !important;
            color:#f8f8f8 !important;
           box-shadow:0 2px 3px #3a3535;
        }</style>
        <br>
        <div id="message ">
            <p class="init">
                Hi, <b><?php echo ucfirst($_SESSION['userfullname']); ?></b><br><br>
                Your order has been placed.<br />
                <br>
                
            </p>
            <?php
    if(!isset($_POST['slotsubmit']))
    {
    ?>
    <p class="init">
    Please choose the collection slot from where you would like the recieve your purchases.<br>
        </p>
    <h4 class="responsive" style="">Collection Slots Available: </h4>
    <form class="form" action="paymentsuccess.php" method="POST" enctype="multipart/form-data">

    <select class="form-control" name="slotselect" required style="border-radius:0 0;width:60%;float:left;">
    <?php

    $slot = new SLOT;
    $statement = oci_parse($slot->connect(), "SELECT * FROM COLLECTION_SLOT");
    oci_execute($statement);
    while($row = oci_fetch_assoc($statement))
    {
        $slotStatus = $slot->getAvailabilityStatus($row['SLOT_NO']);
        $sno = $row['SLOT_NO'];

        if($slotStatus == 1)
        {
            $slotOrders = $slot->fetchSlotOrders($sno, 1);
            $slotDate = $slot->displaySlotDate($row['SLOT_NO'], $slotStatus);
            
            ?>
            <option value = "<?php echo $row['SLOT_NO'].'a'; ?>" disabled >
            <?php echo $row['SLOT_INFO'].' '.$slotDate; ?> NOT AVAILABLE </option>
            <?php 
        }

        else if($slotStatus == 2)
        {
            $slotOrders = $slot->fetchSlotOrders($sno, 1);
            $slotDate = $slot->displaySlotDate($row['SLOT_NO'], $slotStatus);
            if($slotOrders == 20)
            {
                ?>
                    <option value="" disabled  style="margin-right:6px;color:red;text:justify">
                <?php echo $row['SLOT_INFO'].' '.$slotDate; ?> MAXIMUM ORDER LIMIT REACHED! </option>
                <?php
            }
            else {
            ?>
            <option value = "<?php echo $row['SLOT_NO'].'b'; ?>" >
            <?php echo $row['SLOT_INFO'].' '.$slotDate; ?></option>
            <?php
               // $slotOrders = $slot->incrementSlotOrders($row['SLOT_NO'], 1);
            }
        }

        else if($slotStatus == 3)
        {  
            $slotOrders = $slot->fetchSlotOrders($sno, 2);
            $slotDate = $slot->displaySlotDate($row['SLOT_NO'], $slotStatus);
            $nextweek = date("m/d/yy", strtotime("+8 days"));
            echo $nextweek;
            if($slotOrders == 20)
            {
                ?>
                    <option value="" disabled  style="margin-right:6px;color:red;">
                <?php echo $row['SLOT_INFO'].' '.$slotDate; ?>MAXIMUM ORDER LIMIT REACHED! </option>
                <?php
            }
            else {
            ?>
            <option value = "<?php echo $row['SLOT_NO'].'c'; ?>" >
            <?php echo $row['SLOT_INFO'].' | '.$slotDate; ?></option>
            <?php
                 //$slotOrders = $slot->incrementSlotOrders($row['SLOT_NO'], 2);
            }
        }
        else{ ?><option>INVALID</option><?php }
        
    } 
    ?></select>
    <input type="submit" class="btn btn-success slotbtn" style="padding:auto;" name="slotsubmit" />
    </form>
    <?php
        }
        

    ?>

    </div><br />
    <p class="text-justify">
        Thank You for shopping with Organocity. We hope that you had a wonderful experience.<br> Keep visiting us for 
        different offers and discounts throught the year. If you have any questions, <br>do not hesitate to ask. See
        you next time. 

        <br><Br><br>
        <b>Team Organocity</b> 
        <img src="images/ecom-logo.gif" alt="Organocity Logo" class="hidden-xs" align="right">
        <img src="images/ecom-logo1.gif" alt="Organocity Mobile" class="visible-xs" align="right" >
                   
    </p>
    </div><br><br>
    
    
    </div>
    <style>.helpbtn:hover{ 
            text-decoration:none;
            background:#ea5e5e !important;
            color:#f8f8f8 !important;
           box-shadow:0 2px 3px #3a3535;
        }</style>

    <?php
        if(isset($_POST['slotsubmit'])) {
            $db1 = new DB;
            //send order report in mail
            include_once 'includes/sendReportMail.inc.php';
    ?>
    <div class="container"> <!-- container -->
        <h1 class="text-center"> Order Details </h1>
        <div class="table-responsive"><!--  table-responsive Begin  -->
        
        <table class="table table-bordered table-hover"><!--  table table-bordered table-hover Begin  -->
            
            <thead><!--  thead Begin  -->
                
                <tr class="thead"><!--  tr Begin  -->
                    
                    <th> Invoice NO </th>
                    <!--th> Status </th-->
                    <th> Order Date/Time </th>
                    <th> Collection Slot </th>
                    <th> Collection Date </th>
                    <th> Payment ID</th>
                    <th> Paid / Unpaid </th>
                    
                </tr><!--  tr Finish  -->
                
            </thead><!--  thead Finish  -->
            
            <tbody><!--  tbody Begin  -->
                <?php
                    $uid = $_SESSION['user_id'];
                    $inid = $_SESSION['invoice_no'];
                    $query = oci_parse($db1->connect(), "SELECT INVOICE_NO, ORDER_STATUS, CAST( ORDER_DATE AS TIMESTAMP(0)) ORDER_DATE, 
                    c.SLOT_INFO, COLLECTION_DATE, PAYMENT_ID FROM ORDERS o, COLLECTION_SLOT c WHERE o.slot_no = c.slot_no AND INVOICE_NO = $inid");
                    //$query = oci_parse($user->connect(), "SELECT * FROM ORDERS WHERE USER_ID = $uid");
                    oci_execute($query);
                    while($row = oci_fetch_assoc($query)) {

                ?>
                <tr><!--  tr Begin  -->
                    
                    <td> <?php echo $row['INVOICE_NO']; ?> </td>
                    <!--td> <?php //echo $row['ORDER_STATUS']; ?> </td-->
                    <td> <?php echo $row['ORDER_DATE']; ?> </td>
                    <td> <?php echo $row['SLOT_INFO']; ?> </td>
                    <td> <?php echo $row['COLLECTION_DATE']; ?> </td>
                    <td> <?php echo $row['PAYMENT_ID']; ?> </td>
                    <td class="text-success"> Paid </td>
                    
                    
                </tr><!--  tr Finish  -->
                    <?php $order_date = $row['ORDER_DATE']; } ?>
                
            </tbody><!--  tbody Finish  -->
            
        </table><!--  table table-bordered table-hover Finish  -->
        
        </div><!--  table-responsive Finish  --> <br /><br />
        
        <div class="table-responsive"><!--  table-responsive Begin  -->
        <table class="table table-bordered table-hover"><!--  table table-bordered table-hover Begin  -->

        <thead><!--  thead Begin  -->
        <tr>
        <th colspan="1" style="text-align:left;background:#ffebd9;color:#7d5e2a;"><?php echo ucfirst($_SESSION['userfullname']); ?>
        <th colspan="3" style="text-align:left;background:#ffebd9;color:#7d5e2a;"><?php echo $order_date; ?>
        <th colspan="1" style="text-align:right;background:#ffebd9;color:#7d5e2a;">INVOICE NO: <?php echo $_SESSION['invoice_no'];  ?></th>
        </tr>
        <tr class="thead"><!--  tr Begin  -->
            
            <th> Product Name </th>
            <th> Thumbnail </th>
            <th> Unit Price </th>
            <th> Product Quantity </th>
            <th> Sub-Total </th>
            
        </tr><!--  tr Finish  -->
        
        </thead><!--  thead Finish  -->

        <tbody><!--  tbody Begin  -->
        <?php
            $iid = $_SESSION['invoice_no'];
            $uid = $_SESSION['user_id']; 
            $query = oci_parse($db1->connect(), "SELECT * FROM ORDER_DETAILS WHERE  INVOICE_NO = $iid");
            oci_execute($query);    $totalp = 0;
            
            while($row = oci_fetch_assoc($query)) {

        ?>
        <tr><!--  tr Begin  -->
            
            <td> <?php echo $row['PRODUCT_NAME']; ?> </td>
            <td><img class="img-responsive" style="max-width:70px;filter:drop-shadow(0 0 2px #333333 );" 
                            src="images/products/<?php echo $row['PRODUCT_IMG']; ?>" alt="Product Image" /> </td>
            <td>Rs. <?php echo $row['UNIT_PRICE']; ?> </td>
            <td> <?php echo $row['PRODUCT_QUANTITY']; ?> </td>
            <td>Rs. <?php echo $row['SUB_TOTAL']; $totalp = $totalp + $row['SUB_TOTAL']; ?> </td>
            
        </tr><!--  tr Finish  -->
            <?php } ?>
        <tr>
        <th colspan="4">Total</th>
        <th colspan="1">Rs. <?php echo $totalp; ?></th>
        </tr>
        </tbody><!--  tbody Finish  -->
        </table><!--  table table-bordered table-hover Finish  -->
        </div><!--  table-responsive Finish  --><br /><br />
    </div> <!-- container -->
    <?php
    //unset($_POST['slotsubmit']);  ?>
    <center>
    <div class="questions"><?php  //if(isset($_POST['slotsubmit'])) { unset($_POST['slotsubmit']); ?>
    <b>Questions?</b> Contact Us through these :
     <a href="contacts.php" class="btn  helpbtn" style="border-radius:0 0;height:25px;color:#f8f8f8 !important;padding:3px;background:#414141;">HELP LINK</a> <?php } ?>
    </div>
    </center>
        <br /><br />

</body>
</html>