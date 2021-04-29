<?php

  //set_default_time_zone('Asia/Kathmandu');
   include 'includes/dbconnection.inc.php';

  $db = new DB;

  // $script1 = oci_parse($db->connect(), " DELETE FROM TEMP WHERE TEMP_ID = 5");
  // oci_execute($script1);

  // $script = oci_parse($db->connect(), " INSERT INTO TEMP (TEMP_ID, CUR_DATE) VALUES (5, CURRENT_TIMESTAMP)");
  // oci_execute($script);
  
  
  // $sc = oci_parse($db->connect(), "SELECT TEMP_ID, CAST( CUR_DATE AS TIMESTAMP(0)) CUR_DATE FROM TEMP" );
  //   oci_execute($sc);
  //   echo "<table><tr><th>TEMP_ID</th>       <th>DATE/TIME</th></tr>";
  //   while($row = oci_fetch_assoc($sc))
  //   {
  //       echo "<tr><td>".$row['TEMP_ID']."</td><td>".$row['CUR_DATE']."</td></tr>";
  //   }

  // $script = oci_parse($db->connect(), "INSERT INTO TEMP (TEMP_ID, TDATE) VALUES (6, trunc(SYSDATE+7))");
  // oci_execute($script);

    //    $to_email = "amit.kar8@gmail.com";
    //   $subject = "Simple Email Test via PHP"
    //   $body = "Hi, This is test email send by PHP Script";
    //   $headers = "From: organocityorg@gmail.com";

    //   if (mail($to_email, $subject, $body, $headers)) {
    //       echo "Email successfully sent to $to_email...";
    //   } else {
    //       echo "Email sending failed...";
    //   }


    // date_default_timezone_set('Indian/Chagos');
    // echo date("w");
    // echo "day: ".date("w")." hour: ".date("G");

    // $subject = 'Account Verification' ;
    // $body = '<div class="jumbotron" 
    // style="width:auto;height:auto;background: #343434;font-weight:100; text-align:center;padding:3.3%;border-radius:6px 6px;">
    // <h2 style="text-align:center; color:#fcfaf1">Account Verification from <strong style="color:#79d70f">Organocity</strong> Online Grocery Store!</h2> 
    // <h4 style="color:#ff6337;" >Click on this <a href="localhost/Organocity/customer/sendMail.php" 
    // style="background:#0779e4;padding:9px;border-radius:3px 3px;text-decoration:none;color:#f4ff61">Verification Link</a>
    // to verify your account! </h4>
    // </div>';
    // include 'includes/check_session.inc.php';
    // include 'includes/dbconnection.inc.php';
    //                     $db = new DB;
    //                     $collection_info = $collection_date = "";
    //                     //$vuid = $_SESSION['user_id'];
    //     //                 $st = oci_parse($db->connect(), "SELECT * FROM USERS");
    //     //                 oci_execute($st);
    //     //                 while($row = oci_fetch_assoc($st));
    //     //                 {  
    //     //                     echo $row['USER_ID'];
    //     //                 }
    //     //                 echo "\n";
    //     //                 //$sid = $trader->getShopID();
    //     // $st1 = oci_parse($db->connect(), "SELECT * FROM USERS WHERE USER_ID=10");
    //     // oci_execute($st1);
    //     // while($row = oci_fetch_assoc($st1))
    //     // {
    //     //   echo "NAME: ".$row['FULLNAME']." and VERIFICATION STATUS:".$row['VERIFICATION_STATUS'];
    //     // }

    //     $body = '<center><style> td{padding:5px;border:1px solid #363636} th{padding:6px;font-weight:100;} </style> 
        
    //     <h4 class="text-center" style="text-align:center;color:#465881">You Payment was <span style="color:#21bf73">received successfully! </span><br/>
    //                       Here is your invoice and order details! </h4>';
    //     $body .= '<div class="table-responsive">
    
    //     <table class="table table-bordered table-hover" style="padding:5px;">
            
    //         <thead style="background:#3f3f44;color:#f7f7f7;">
                
    //             <tr class="thead"><!--  tr Begin  -->
                    
    //                 <th> Invoice NO </th>
    //                 <th> Order Date/Time </th>
    //                 <th> Collection Slot </th>
    //                 <th> Collection Date </th>
    //                 <th> Payment ID</th>
    //                 <th> Paid / Unpaid </th>
                    
    //             </tr>
                
    //         </thead>
            
    //         <tbody>';
    //                 //$uid = $_SESSION['user_id'];
    //                 $inid = $_SESSION['invoice_no'];
    //                 $qry = oci_parse($db->connect(), "SELECT INVOICE_NO, ORDER_STATUS, CAST( ORDER_DATE AS TIMESTAMP(0)) ORDER_DATE, 
    //                 c.SLOT_INFO, COLLECTION_DATE, PAYMENT_ID FROM ORDERS o, COLLECTION_SLOT c WHERE o.slot_no = c.slot_no AND INVOICE_NO = $inid");
    //                 //$query = oci_parse($user->connect(), "SELECT * FROM ORDERS WHERE USER_ID = $uid");
    //                 oci_execute($qry);
    //                 while($row = oci_fetch_assoc($qry)) {
                      
    //                   $body .=  '
    //             <tr>
                    
    //                 <td> '.$row['INVOICE_NO'].' </td>
    //                 <td>  '.$row['ORDER_DATE'].' </td>
    //                 <td>'.$row['SLOT_INFO'].' </td>
    //                 <td> '.$row['COLLECTION_DATE'].' </td>
    //                 <td>'.$row['PAYMENT_ID'].' </td>
    //                 <td class="text-success"> Paid </td>
                    
            
    //             </tr>';
    //             $collection_info = $row['SLOT_INFO']; $collection_date = $row['COLLECTION_DATE'];
                    
    //                  } 
    //                  $body .=  '
    //         </tbody>
            
    //     </table>
        
    // </div> <br /><br />
    // <h3 class="text-center" style="text-align:center;color:#424874"> Order Details </h3>';
    
    //         $qry = oci_parse($db->connect(), "SELECT INVOICE_NO, CAST(ORDER_DATE AS TIMESTAMP(0)) ORDER_DATE FROM ORDERS WHERE INVOICE_NO = $inid");
    //         oci_execute($qry);
    //         while($row = oci_fetch_assoc($qry))
    //         {
    //             $iid = $row['INVOICE_NO'];
    //             $order_date = $row['ORDER_DATE'];
    //             $body .=  '.
    //                  <div class="table-responsive">
    //     <table class="table table-bordered table-hover" style="padding:5px;">
    
    //     <thead style="background:#3f3f44;color:#f7f7f7;">
    //         <tr>
    //         <th colspan="1" style="text-align:left;background:#ffebd9;color:#7d5e2a;">'.ucfirst($_SESSION['userfullname']).'
    //         <th colspan="3" style="text-align:left;background:#ffebd9;color:#7d5e2a;">'.$order_date.'
    //         <th colspan="1" style="text-align:right;background:#ffebd9;color:#7d5e2a;">INVOICE NO: '. $row['INVOICE_NO'].'</th>
    //         </tr>
    //         <tr class="thead">
                
    //             <th colspan="2"> Product Name </th>
    //             <th> Unit Price </th>
    //             <th> Product Quantity </th>
    //             <th> Sub-Total </th>
                
    //         </tr>
            
    //     </thead>
    
    //     <tbody>';
    //             $uid = $_SESSION['user_id'];
    //             $query = oci_parse($db->connect(), "SELECT * FROM ORDER_DETAILS WHERE  INVOICE_NO = $iid");
    //             oci_execute($query);    $totalp = 0;
                
    //             while($row = oci_fetch_assoc($query)) {
    //               $body .=  '
    //         <tr>
                
    //             <td colspan="2"> '.$row['PRODUCT_NAME'].'</td>
    //             <td>Rs. '. $row['UNIT_PRICE'].' </td>
    //             <td> '.$row['PRODUCT_QUANTITY'] .'</td>
    //             <td>Rs. '.$row['SUB_TOTAL']; $totalp = $totalp + $row['SUB_TOTAL']; echo ' </td>
                
    //         </tr>';
    //             }
    //             $body .=  '
    //         <tr>
    //         <th colspan="4" style="color:#ff1e56;font-weight:400;text-align:left">Total</th>
    //         <th colspan="1" style="color:#ff1e56;font-weight:400;text-align:right">Rs. '.$totalp.'</th>
    //         </tr>
    //     </tbody>
    //     </table>
    //     </div> <br />
    //     <h4 class="text-center" style="text-align:center;font-weight:cener;color:#2b2b28">Please come at our collection centre on
    //     <span style="color:#745c97"> '.$collection_info.','.$collection_date.' </span> ! 
    //     <br />Thank you for shopping with us!<br> - <a href="localhost/Organocity/index.php" style="color:#21bf73;textdecoration:none">Organocity.com</a>
    //     </h4></center>';
    //           }

    // date_default_timezone_set('Asia/Kathmandu');
    // $time = date('G');
    // $day = date('w');
    // echo $time." and ".$day;

    // if($day == 2)
    // {
    //   if($time >= 5  && $time <= 7 )
    //     $script = oci_parse($db->connect(), "UPDATE COLLECTION_SLOT SET THIS_WEEK_ORDERS = 5 WHERE SLOT_NO = 1");
    //     oci_execute($script);
    // }

    ?>
             
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    // echo $subject;
    // echo "\n\n".$body;
   // echo //$body;
   
  ?>
  <form action="">
    <select required>
      <option value="">a</a>
      <option value="b">b</option>
    </select>
    <input type = "submit" value="submit">
  </form>


</body>
</html>