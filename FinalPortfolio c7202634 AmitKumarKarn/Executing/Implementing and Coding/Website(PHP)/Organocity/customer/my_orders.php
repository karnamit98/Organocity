<center><!--  center Begin  -->
    
    <h1> My Orders </h1>
    
    <p class="lead"> Your orders on one place</p>
    
    <p class="text-muted">
        
        If you have any questions, feel free to <a href="../contact.php">Contact Us</a>. Our Customer Service works <strong>24/7</strong>
        
    </p>
    
</center><!--  center Finish  -->


<hr>
<style>
    .thead th{
        background:#30475e;
        color:#f0f0f0;
    }
</style>


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
                $query = oci_parse($user->connect(), "SELECT INVOICE_NO, ORDER_STATUS, CAST( ORDER_DATE AS TIMESTAMP(0)) ORDER_DATE, 
                c.SLOT_INFO, COLLECTION_DATE, PAYMENT_ID FROM ORDERS o, COLLECTION_SLOT c WHERE o.slot_no = c.slot_no AND USER_ID = $uid");
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
                <?php } ?>
            
        </tbody><!--  tbody Finish  -->
        
    </table><!--  table table-bordered table-hover Finish  -->
    
</div><!--  table-responsive Finish  --> <br /><br />
<h1 class="text-center"> Order Details </h1>

       <?php
        $qry = oci_parse($user->connect(), "SELECT INVOICE_NO, CAST(ORDER_DATE AS TIMESTAMP(0)) ORDER_DATE FROM ORDERS WHERE USER_ID = $uid");
        oci_execute($qry);
        while($row = oci_fetch_assoc($qry))
        {
            $iid = $row['INVOICE_NO'];
            $order_date = $row['ORDER_DATE'];
            ?>
                 <div class="table-responsive"><!--  table-responsive Begin  -->
    <table class="table table-bordered table-hover"><!--  table table-bordered table-hover Begin  -->

    <thead><!--  thead Begin  -->
        <tr>
        <th colspan="1" style="text-align:left;background:#ffebd9;color:#7d5e2a;"><?php echo ucfirst($_SESSION['userfullname']); ?>
        <th colspan="3" style="text-align:left;background:#ffebd9;color:#7d5e2a;"><?php echo $order_date; ?>
        <th colspan="1" style="text-align:right;background:#ffebd9;color:#7d5e2a;">INVOICE NO: <?php echo $row['INVOICE_NO'];  ?></th>
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
            $uid = $_SESSION['user_id'];
            $query = oci_parse($user->connect(), "SELECT * FROM ORDER_DETAILS WHERE  INVOICE_NO = $iid");
            oci_execute($query);    $totalp = 0;
            
            while($row = oci_fetch_assoc($query)) {

        ?>
        <tr><!--  tr Begin  -->
            
            <td> <?php echo $row['PRODUCT_NAME']; ?> </td>
            <td><img class="img-responsive" style="max-width:70px;filter:drop-shadow(0 0 2px #333333 );" 
                            src="../images/products/<?php echo $row['PRODUCT_IMG']; ?>" alt="Product Image" /> </td>
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
            <?php

        }

?>
         
   