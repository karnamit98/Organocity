<?php
    // include 'includes/check_session.inc.php';
     //include 'includes/dbconnection.inc.php';
       // $db = new DB;
        $collection_info = $collection_date = "";
 
         $body = '<center><style> td{padding:5px;border:1px solid #363636} th{padding:6px;font-weight:100;} </style> 
         
         <h4 class="text-center" style="text-align:center;color:#465881">You Payment was <span style="color:#21bf73">received successfully! </span><br/>
                           Here is your invoice and order details! </h4>';
         $body .= '<div class="table-responsive">
     
         <table class="table table-bordered table-hover" style="padding:5px;">
             
             <thead style="background:#3f3f44;color:#f7f7f7;">
                 
                 <tr class="thead"><!--  tr Begin  -->
                     
                     <th> Invoice NO </th>
                     <th> Order Date/Time </th>
                     <th> Collection Slot </th>
                     <th> Collection Date </th>
                     <th> Payment ID</th>
                     <th> Paid / Unpaid </th>
                     
                 </tr>
                 
             </thead>
             
             <tbody>';
                     //$uid = $_SESSION['user_id'];
                     $inid = $_SESSION['invoice_no'];
                     $qry = oci_parse($db1->connect(), "SELECT INVOICE_NO, ORDER_STATUS, CAST( ORDER_DATE AS TIMESTAMP(0)) ORDER_DATE, 
                     c.SLOT_INFO, COLLECTION_DATE, PAYMENT_ID FROM ORDERS o, COLLECTION_SLOT c WHERE o.slot_no = c.slot_no AND INVOICE_NO = $inid");
                     //$query = oci_parse($user->connect(), "SELECT * FROM ORDERS WHERE USER_ID = $uid");
                     oci_execute($qry);
                     while($row = oci_fetch_assoc($qry)) {
                       
                       $body .=  '
                 <tr>
                     
                     <td> '.$row['INVOICE_NO'].' </td>
                     <td>  '.$row['ORDER_DATE'].' </td>
                     <td>'.$row['SLOT_INFO'].' </td>
                     <td> '.$row['COLLECTION_DATE'].' </td>
                     <td>'.$row['PAYMENT_ID'].' </td>
                     <td class="text-success"> Paid </td>
                     
             
                 </tr>';
                 $collection_info = $row['SLOT_INFO']; $collection_date = $row['COLLECTION_DATE'];
                     
                      } 
                      $body .=  '
             </tbody>
             
         </table>
         
     </div> <br /><br />
     <h3 class="text-center" style="text-align:center;color:#424874"> Order Details </h3>';
     
             $qry = oci_parse($db1->connect(), "SELECT INVOICE_NO, CAST(ORDER_DATE AS TIMESTAMP(0)) ORDER_DATE FROM ORDERS WHERE INVOICE_NO = $inid");
             oci_execute($qry);
             while($row = oci_fetch_assoc($qry))
             {
                 $iid = $row['INVOICE_NO'];
                 $order_date = $row['ORDER_DATE'];
                 $body .=  '.
                      <div class="table-responsive">
         <table class="table table-bordered table-hover" style="padding:5px;">
     
         <thead style="background:#3f3f44;color:#f7f7f7;">
             <tr>
             <th colspan="1" style="text-align:left;background:#ffebd9;color:#7d5e2a;">'.ucfirst($_SESSION['userfullname']).'
             <th colspan="3" style="text-align:left;background:#ffebd9;color:#7d5e2a;">'.$order_date.'
             <th colspan="1" style="text-align:right;background:#ffebd9;color:#7d5e2a;">INVOICE NO: '. $row['INVOICE_NO'].'</th>
             </tr>
             <tr class="thead">
                 
                 <th colspan="2"> Product Name </th>
                 <th> Unit Price </th>
                 <th> Product Quantity </th>
                 <th> Sub-Total </th>
                 
             </tr>
             
         </thead>
     
         <tbody>';
                 $uid = $_SESSION['user_id'];
                 $query = oci_parse($db1->connect(), "SELECT * FROM ORDER_DETAILS WHERE  INVOICE_NO = $iid");
                 oci_execute($query);    $totalp = 0;
                 
                 while($row = oci_fetch_assoc($query)) {
                   $body .=  '
             <tr>
                 
                 <td colspan="2"> '.$row['PRODUCT_NAME'].'</td>
                 <td>Rs. '. $row['UNIT_PRICE'].' </td>
                 <td> '.$row['PRODUCT_QUANTITY'] .'</td>
                 <td>Rs. '.$row['SUB_TOTAL']; $totalp = $totalp + $row['SUB_TOTAL']; echo ' </td>
                 
             </tr>';
                 }
                 $body .=  '
             <tr>
             <th colspan="4" style="color:#ff1e56;font-weight:400;text-align:left">Total</th>
             <th colspan="1" style="color:#ff1e56;font-weight:400;text-align:right">Rs. '.$totalp.'</th>
             </tr>
         </tbody>
         </table>
         </div> <br />
         <h4 class="text-center" style="text-align:center;font-weight:cener;color:#2b2b28">Please come at our collection centre on
         <span style="color:#745c97"> '.$collection_info.','.$collection_date.' </span> ! 
         <br />Thank you for shopping with us!<br> - <a href="localhost/Organocity/index.php" style="color:#21bf73;textdecoration:none">Organocity.com</a>
         </h4></center>';
    }


    $uid = $_SESSION['user_id'];
    //retrieve email id
    $query = oci_parse($db1->connect(), "SELECT * FROM USERS WHERE USER_ID = $uid");
    oci_execute($query);
    $email = "";
    while($row = oci_fetch_assoc($query))
    {
        $email = $row['USER_EMAIL'];
    }
    $to_email = $email;
    //$to_email = "amit.karn98@gmail.com";
    $subject = 'Order Placed at Organocity.com Online Grocery Store!' ;
     //$headers = "From: organocityorg@gmail.com";
     $headers = "MIME-Version: 1.0" . "\r\n";
     $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
     $headers .= 'From: <organocityorg@example.com>' . "\r\n";
     $headers .= 'Cc: '.$to_email.'' . "\r\n";
 
 
     $sent_status = 0;
     if (mail($to_email, $subject, $body, $headers)) {
         ?>
        <script>alert("An email was sent to you with the details of the order!");</script>
         <?php
     } else {
         ?>
            <script>alert("An email was sent to you with the details of the order!");</script>

         <?php
     }
?>