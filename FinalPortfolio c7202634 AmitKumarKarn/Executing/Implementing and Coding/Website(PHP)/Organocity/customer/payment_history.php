<center><!--  center Begin  -->
    
    <h1>  Payment History </h1>
   
    
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
    
    <table class="table table-bordered table-hover table-striped"><!--  table table-bordered table-hover Begin  -->
        
        <thead><!--  thead Begin  -->
            
            <tr class="thead"><!--  tr Begin  -->
                
                <th> Payment ID</th>
                <th> Amount</th>
                <th> Status </th>
                <th> Paid Through </th>
                <th> Date/Time </th>
                <th> Invoice No </th>
           
            </tr><!--  tr Finish  -->
            
        </thead><!--  thead Finish  -->
        
        <tbody><!--  tbody Begin  -->
            <?php
                $uid = $_SESSION['user_id'];
                $query = oci_parse($user->connect(), "SELECT p.PAYMENT_ID, PAYMENT_AMOUNT, PAYMENT_STATUS, PAYMENT_TYPE, 
                CAST( PAYMENT_DATE_TIME AS TIMESTAMP(0)) PAYMENT_DATE_TIME, o.INVOICE_NO
                 FROM PAYMENT p, ORDERS o WHERE p.PAYMENT_ID = o.PAYMENT_ID AND p.USER_ID = $uid "); 
                oci_execute($query);
                while($row = oci_fetch_assoc($query)) {

            ?>
            <tr>
            <td><?php echo $row['PAYMENT_ID']; ?></td>
            <td>Rs. <?php echo $row['PAYMENT_AMOUNT']; ?></td>
            <td class="text-success"><?php echo $row['PAYMENT_STATUS']; ?></td>
            <td><?php echo $row['PAYMENT_TYPE']; ?></td>
            <td><?php echo $row['PAYMENT_DATE_TIME']; ?></td>
            <td><?php echo $row['INVOICE_NO']; ?></td>
            </tr> 
            <?php } ?>
        </tbody><!--  tbody Finish  -->
        
    </table><!--  table table-bordered table-hover Finish  -->
    
</div><!--  table-responsive Finish  -->