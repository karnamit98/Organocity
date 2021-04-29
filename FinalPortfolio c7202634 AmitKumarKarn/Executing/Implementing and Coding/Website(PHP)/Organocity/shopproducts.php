<?php 
    include_once "includes/dbconnection.inc.php";
    session_start();
    $db = new DB;
    $shop_id = $_GET['shop_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Organocity </title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<?php
    include 'includes/navbar.php';
  ?>
   
   <div id="content"><!-- #content Begin -->
       <div class="container" ><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Shop
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
   
   <?php 
    
    include("includes/sidebar.php");
    
    ?>
               
           </div><!-- col-md-3 Finish -->
           
               <div id="row same-heigh-row"><!-- #row same-heigh-row Begin -->
                   
                   <?php
                        //Products from the same shop
                        $query = oci_parse($db->connect(), "SELECT * FROM PRODUCT WHERE SHOP_ID = $shop_id");
                        oci_execute($query);
                        while($row = oci_fetch_assoc($query))
                        {

                   ?>
                        <div class="col-md-3 col-sm-6 center-responsive"><!-- col-md-3 col-sm-6 center-responsive Begin -->
                            <div class="product same-height"><!-- product same-height Begin -->
                                <a href="details.php?pid=<?php echo $row['PRODUCT_ID']; ?>">
                                    <img class="img-responsive" src="images/products/<?php echo $row['PRODUCT_IMAGE1'];  ?>" alt="<?php echo $row['PRODUCT_NAME']; ?>">
                                    </a>
                                    <!--If the product has a discount offer-->
                                    <?php 
                                        $discount_flag = 0;
                                        $discount = 0;
                                    $dpid = $row['PRODUCT_ID'];
                                        $disqry = oci_parse($db->connect(), "SELECT * FROM DISCOUNT WHERE PRODUCT_ID = $dpid ");
                                        oci_execute($disqry);
                                        while($row1 = oci_fetch_assoc($disqry))
                                        {
                                            ?><div class="container  " style="color:#ffd868;padding:5px;position:absolute;top:0px; left:-5px;background:#d63447;width:inherit;height:inherit;z-index:9999;
                                            filter:drop-shadow(0 0 1.2px #1b262c"> <?php echo strtoupper($row1['DISCOUNT_NAME'])." ".$row1['DISCOUNT_PERCENT']; ?>%</div>
                                        <?php
                                        $discount_flag = 1;
                                        $discount = $row1['DISCOUNT_PERCENT'];
                                        }
                                    ?>
                                    <div class="text"><!-- text Begin -->
                                        <h3><a href="details.php?pid=<?php echo $row['PRODUCT_ID']; ?>"><?php echo $row['PRODUCT_NAME']; ?></a></h3>
                                        
                                        <?php if($discount_flag == 0) { ?>
                                            <p class="price text-danger">NRS.<?php echo $row['PRODUCT_PRICE']; ?></p>
                                    <?php } else { 
                                        $new_price = $row['PRODUCT_PRICE'] * ($discount/100);
                                        
                                        ?>
                                        <p class="price text-danger"><del class="text-danger">NRS. <?php echo $row['PRODUCT_PRICE']; ?></del>
                                        NRS. <?php echo $new_price; ?>
                                        </p>
                                        <?php
                                    }?>
                                        
                                    </div><!-- text Finish -->
                                    
                                </div><!-- product same-height Finish -->
                        </div><!-- col-md-3 col-sm-6 center-responsive Finish -->
                    <?php } ?>  
                   
                   
               </div><!-- #row same-heigh-row Finish -->
               
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script src="functions/navscroll.js"></script>
    
    
</body>
</html>