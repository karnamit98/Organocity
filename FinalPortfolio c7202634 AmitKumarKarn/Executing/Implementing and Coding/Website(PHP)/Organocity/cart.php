<?php
    include 'includes/check_session.inc.php';
    //session_start();
    include 'includes/dbconnection.inc.php';
    class CART extends DB{
        public $totalItems;
        public $user_id;
        public function setTotalItems()
        {
            $this->user_id = $_SESSION['user_id'];
            $query = oci_parse($this->connect(), "SELECT * FROM PRODUCT_CART WHERE CART_NO = $this->user_id" );
            oci_execute($query);
            
            while($row =  oci_fetch_assoc($query))
            {
                $this->totalItems = $this->totalItems + 1;
            }
        }

        public function getProduct($product_id, $attribute)
        {
            $query = oci_parse($this->connect(), "SELECT * FROM PRODUCT WHERE PRODUCT_ID = $product_id" );
            oci_execute($query);

            while($row = oci_fetch_assoc($query))
            {
                if($attribute == 'name')
                {
                    return $row['PRODUCT_NAME'];
                }
                if($attribute == 'image')
                {
                    return $row['PRODUCT_IMAGE1'];
                }
                if($attribute == 'quantity')
                {
                    return $row['STOCK_AVAILABLE'];
                }
                if($attribute == 'price')
                {
                    //If the product has a discount offer
                    $discount_flag = 0;
                    $discount = 0;
                    $dpid = $row['PRODUCT_ID'];
                    $disqry = oci_parse($this->connect(), "SELECT * FROM DISCOUNT WHERE PRODUCT_ID = $dpid ");
                    oci_execute($disqry);
                    while($row1 = oci_fetch_assoc($disqry))
                    {
                        $discount_flag = 1;
                        $discount = $row1['DISCOUNT_PERCENT'];
                    }
                     
                    if($discount_flag == 0) { 
                        return $row['PRODUCT_PRICE'];
                    } else { 
                        $new_price = $row['PRODUCT_PRICE'] * ($discount/100);
                        return $new_price; 
                    }
                    
                }
            }

        }

        
    }

    $cart = new CART;
    $cart->setTotalItems();

    //IF an item is deleted, then this message is shown
    if(isset($_SESSION['itemdeleted']))
    {
        if($_SESSION['itemdeleted'])
        {
            ?>
                <script> alert("Item Deleted Successfully from the cart!"); </script>
            <?php
            $_SESSION['itemdeleted'] = false;
        }
    }
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

    <style>
        .itemdelete{

        }
        .itemdelete:hover{
            filter: drop-shadow(0 0 5px orange);
        }

    </style>
</head>
<body>

    
   
<?php
    include 'includes/navbar.php';
  ?>

   
<div class="container wow fadeInDown animated" id="slider" style="width:115%  !important;padding:0% !important;position:relative;  !important; left:-7%; top:-20px;"><!-- container Begin -->
       
       
       <div class="col-md-12" style="width:98%"><!-- col-md-12 Begin -->
           
           <div class="carousel slide" id="myCarousel" data-ride="carousel"><!-- carousel slide Begin -->
               
               <ol class="carousel-indicators"><!-- carousel-indicators Begin -->
                   
                   <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                   <li data-target="#myCarousel" data-slide-to="1"></li>
                   <li data-target="#myCarousel" data-slide-to="2"></li>
                   <li data-target="#myCarousel" data-slide-to="3"></li>
                   <li data-target="#myCarousel" data-slide-to="4"></li>
                   
               </ol><!-- carousel-indicators Finish -->
               
               <div class="carousel-inner"><!-- carousel-inner Begin -->
                   
                   <div class="item active">
                       
                       <img src="admin_area/slides_images/slide-11.jpg" alt="Slider Image 1">
                       
                   </div>
                   
                   <div class="item">
                       
                       <img src="admin_area/slides_images/slide-12.jpg" alt="Slider Image 2">
                       
                   </div>
                   
                   <div class="item">
                       
                       <img src="admin_area/slides_images/slide-13.jpg" alt="Slider Image 3">
                       
                   </div>
                   
                   <div class="item">
                       
                       <img src="admin_area/slides_images/slide-14.jpg" alt="Slider Image 4">
                       
                   </div>

                   <div class="item">
                       
                       <img src="admin_area/slides_images/slide-15.jpg" alt="Slider Image 5">
                       
                   </div>
                   
               </div><!-- carousel-inner Finish -->
               
               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->
                   
                   <span class="glyphicon glyphicon-chevron-left"></span>
                   <span class="sr-only">Previous</span>
                   
               </a><!-- left carousel-control Finish -->
               
               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- left carousel-control Begin -->
                   
                   <span class="glyphicon glyphicon-chevron-right"></span>
                   <span class="sr-only">Next</span>
                   
               </a><!-- left carousel-control Finish -->
               
           </div><!-- carousel slide Finish -->
           
       </div><!-- col-md-12 Finish -->
       
   </div><!-- container Finish -->

   <div id="advantages"><!-- #advantages Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="same-height-row"><!-- same-height-row Begin -->
               
               <div class="col-sm-4"><!-- col-sm-4 Begin -->
                   
                   <div class="box same-height wow zoomIn animated"><!-- box same-height Begin -->
                       
                       <div class="icon" style="color:#fd5e53"><!-- icon Begin -->
                           
                           <i class="fa fa-heart"></i>
                           
                       </div><!-- icon Finish -->
                       
                       <h3><a href="#">Special Offer</a></h3>
                       
                       <p>We occasionally offer special deals and discounts on our products!</p>
                       
                   </div><!-- box same-height Finish -->
                   
               </div><!-- col-sm-4 Finish -->
               
               <div class="col-sm-4"><!-- col-sm-4 Begin -->
                   
                   <div class="box same-height wow zoomIn animated"><!-- box same-height Begin -->
                       
                       <div class="icon" style="color:#b0a160"><!-- icon Begin -->
                           
                           <i class="fa fa-tag"></i>
                           
                       </div><!-- icon Finish -->
                       
                       <h3><a href="#">Best Prices</a></h3>
                       
                       <p>We offer you our products at a best prices so that our farmers can get their fair price.</p>
                       
                   </div><!-- box same-height Finish -->
                   
               </div><!-- col-sm-4 Finish -->
               
               <div class="col-sm-4"><!-- col-sm-4 Begin -->
                   
                   <div class="box same-height wow zoomIn animated"><!-- box same-height Begin -->
                       
                       <div class="icon" style="color:#1089ff"><!-- icon Begin -->
                           
                           <i class="fa fa-thumbs-up"></i>
                           
                       </div><!-- icon Finish -->
                       
                       <h3><a href="#">100% Original</a></h3>
                       
                       <p>Our goods are completely free of harmful toxins and are made with only the highest quality ingredients.</p>
                       
                   </div><!-- box same-height Finish -->
                   
               </div><!-- col-sm-4 Finish -->
               
           </div><!-- same-height-row Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- #advantages Finish --><br /><br /><br />

   <div id="hot"><!-- #hot Begin -->
       
       <div class="box"><!-- box Begin -->
   
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Cart
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div id="cart" class="col-md-9"><!-- col-md-9 Begin -->
               
               <div class="box"><!-- box Begin -->
                   
                   <form action="cart.php" method="post" enctype="multipart/form-data"><!-- form Begin -->
                       
                       <h1>Shopping Cart</h1>
                       <p class="text-muted">You currently have <?php if($cart->totalItems > 0){ echo $cart->totalItems; }
                                                                        else { echo "0"; } ?> item(s) in your cart</p>
                       
                       <div class="table-responsive"><!-- table-responsive Begin -->
                           
                           <table class="table"><!-- table Begin -->
                               
                               <thead><!-- thead Begin -->
                                   
                                   <tr><!-- tr Begin -->
                                       
                                   <th colspan="1">Delete</th>
                                    <th colspan="1">Thumbnail</th>
                                   <th colspan="1">Product</th>
                                   <th>Quantity</th>
                                   <th>Unit Price</th>
                                   
                                       <th colspan="1">Sub-Total</th>
                                       
                                   </tr><!-- tr Finish -->
                                   
                               </thead><!-- thead Finish -->
                               
                               <?php
                                    $totalprice = 0;
                                    if(!($cart->totalItems > 0))
                                    {
                               ?>

                               <?php
                                    }
                                    else
                                    {
                                        $query = oci_parse($cart->connect(), "SELECT * FROM PRODUCT_CART WHERE CART_NO = $cart->user_id" );
                                        oci_execute($query);
                                        while($row = oci_fetch_assoc($query))
                                        {
                                        ?>
                                    
                                            <tbody><!-- tbody Begin -->
                                                
                                                <tr><!-- tr Begin -->
                                                    
                                                    <td colspan="1">
                                                        <a href="includes/deleteitem.inc.php?pid=<?php echo $row['PRODUCT_ID'] ?>" 
                                                        style="text-decoration:none;"> &nbsp; &nbsp;<h4><i class="itemdelete fa fa-trash text-danger"></i></h4></a>
                                                    </td>

                                                    <td>
                                                        <img class="img-responsive" src="images/products/<?php echo $cart->getProduct($row['PRODUCT_ID'], 'image'); ?>" alt="Product Image">
                                                    </td>
                                                
                                                    <td>
                                                        <a href="details.php?pid=<?php echo $row['PRODUCT_ID']; ?>">
                                                        <?php 
                                                            echo $cart->getProduct($row['PRODUCT_ID'], 'name'); 
                                                        ?></a>
                                                    </td>
                                                
                                                    <td>
                                                    <?php 
                                                            $quan = $cart->getProduct($row['PRODUCT_ID'], 'quantity');
                                                            if($quan == 0)
                                                                echo '<span class="text-danger">Out Of Stock</danger>';
                                                            else if($quan < $row['QUANTITY'])
                                                                echo '<span class="text-danger">Not enough in Stock</danger>';
                                                            else    
                                                                echo $row['QUANTITY'];
                                                        ?></a>
                                                    </td>
                                                    
                                                    <td> 
                                                        <?php $price = $cart->getProduct($row['PRODUCT_ID'], 'price'); 
                                                            if($quan == 0)
                                                                echo '<span class="text-danger">Rs.'.$price.'</danger>';
                                                            else if($quan < $row['QUANTITY'])
                                                                echo '<span class="text-danger">Rs.'.$price.'</danger>';
                                                            else    
                                                                echo 'Rs.'.$price;
                                                        ?>
                                                    </td>
                                                    
                                                        
                                                    <?php
                                                        $total = ($cart->getProduct($row['PRODUCT_ID'], 'price')) * $row['QUANTITY'];
                                                            if($quan == 0)
                                                                echo '<td><span class="text-danger">Rs. 0</danger></td>';
                                                            else if($quan < $row['QUANTITY'])
                                                                echo '<td><span class="text-danger">Rs. 0</danger></td>';
                                                            else   
                                                                { 
                                                                echo '<td>'.$total.'</td>';
                                                                $totalprice = $totalprice + $total;
                                                                }
                                                        
                                                        ?>

                                                
                                                </tr><!-- tr Finish -->
                                                
                                            </tbody><!-- tbody Finish -->
                                    
                                        <?php
                                        }
                                    }
                                ?>

                               <tfoot><!-- tfoot Begin -->
                                   
                                   <tr><!-- tr Begin -->
                                       
                                   <td></td>
                                       <th colspan="4">Total</th>
                                       <th colspan="2">Rs.<?php echo $totalprice; ?></th>
                                       
                                       
                                   </tr><!-- tr Finish -->
                                   
                               </tfoot><!-- tfoot Finish -->
                               
                           </table><!-- table Finish -->
                           
                       </div><!-- table-responsive Finish -->
                       
                       <div class="box-footer"><!-- box-footer Begin -->
                           
                           <div class="pull-left"><!-- pull-left Begin -->
                               
                               <a href="index.php" class="btn btn-warning" style="border-radius:0 0 ;"><!-- btn btn-default Begin -->
                                   
                                   <i class="fa fa-chevron-left"></i> Continue Shopping
                                   
                               </a><!-- btn btn-default Finish -->
                               
                           </div><!-- pull-left Finish -->
                           
                           <div class="pull-right"><!-- pull-right Begin -->

                                
                               <a type="#"  data-toggle="modal" data-target="#confirmClear" style="border-radius:0 0;" class="btn btn-danger"><!-- btn btn-default Begin -->
                                   
                                   <i class="fa fa-refresh"></i> Clear Cart
                                   
                                </a><!-- btn btn-default Finish -->

                            <?php
                                //If user email is not verified
                        
                        if($vs == 0) {
                            ?>
                            <!--a href = "#"  data-toggle="modal" data-target="#notVerified" style="border-radius:0 0;" class="btn btn-primary">
                                   Proceed Checkout</a-->
                                   <button type="button" disabled style="border-radius:0 0;" class="btn btn-primary">
                                   
                                   Proceed Checkout<i class="fa fa-chevron-right"></i>
                                   
                                </button><br />
                                <span class="text-warning"style="float:right"><i class="fa  fa-exclamation-triangle"></i>
                                <a href="customer/my_account.php" style="text-decoration:none">Verify account</a> to checkout!</strong>
                            <?php
                        } else { ?>
                               
                               <a href="checkout.php" class="btn btn-primary">
                                   
                                   Proceed Checkout<i class="fa fa-chevron-right"></i>
                                   
                               </a> 
                        <?php } ?>
                               
                           </div><!-- pull-right Finish -->
                           
                       </div><!-- box-footer Finish -->
                       
                   </form><!-- form Finish -->
                   
               </div><!-- box Finish -->
               
               <div id="row same-heigh-row"><!-- #row same-heigh-row Begin -->
                   <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Begin -->
                       <div class="box same-height headline"><!-- box same-height headline Begin -->
                           <h3 class="text-center">Products You Maybe Like</h3>
                       </div><!-- box same-height headline Finish -->
                   </div><!-- col-md-3 col-sm-6 Finish -->

                   <?php
                        $query = oci_parse($cart->connect(), "SELECT * FROM PRODUCT ORDER BY PRODUCT_NAME");
                        oci_execute($query);
                        $index = 0;
                        while(($row = oci_fetch_assoc($query)) && $index <= 6)
                        {
                            $index = $index + 1;
                   ?>
                   <div class="col-md-3 col-sm-6 center-responsive"><!-- col-md-3 col-sm-6 center-responsive Begin -->
                       <div class="product same-height"><!-- product same-height Begin -->
                           <a href="details.php?pid=<?php echo $row['PRODUCT_ID']; ?>">
                               <img class="img-responsive" src="images/products/<?php echo $row['PRODUCT_IMAGE1']; ?>" alt="Product 6">
                            </a>
                            
                            <div class="text"><!-- text Begin -->
                                <h3><a href="details.php?pid=<?php echo $row['PRODUCT_ID']; ?>"><?php echo $row['PRODUCT_NAME']; ?></a></h3>
                                
                                <!--If the product has a discount offer-->
                                <?php 
                                        $discount_flag = 0;
                                        $discount = 0;
                                    $dpid = $row['PRODUCT_ID'];
                                        $disqry = oci_parse($db->connect(), "SELECT * FROM DISCOUNT WHERE PRODUCT_ID = $dpid ");
                                        oci_execute($disqry);
                                        while($row1 = oci_fetch_assoc($disqry))
                                        {
                                            ?><!--div class="container  " style="color:#ffd868;padding:5px;position:absolute;top:0px; left:-5px;background:#d63447;width:inherit;height:inherit;;z-index:9999;
                                            filter:drop-shadow(0 0 1.2px #1b262c"> <?php //echo strtoupper($row1['DISCOUNT_NAME'])." ".$row1['DISCOUNT_PERCENT']; ?>%</div-->
                                        <?php
                                        $discount_flag = 1;
                                        $discount = $row1['DISCOUNT_PERCENT'];
                                        }
                                    ?>

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
                  
                   <?php
                    }
                   ?>
                                    
               </div><!-- #row same-heigh-row Finish -->
               
           </div><!-- col-md-9 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
               
               <div id="order-summary" class="box"><!-- box Begin -->
                   
                   <div class="box-header" style="box-shadow: 0 0 0;"><!-- box-header Begin -->
                       
                       <h3>Order Summary</h3>
                       
                   </div><!-- box-header Finish -->
                   
                   <p class="text-muted"><!-- text-muted Begin -->
                       
                       Shipping and additional costs are calculated based on value you have entered
                       
                   </p><!-- text-muted Finish -->
                   
                   <div class="table-responsive"><!-- table-responsive Begin -->
                       
                       <table class="table"><!-- table Begin -->
                           
                           <tbody><!-- tbody Begin -->
                               
                               <tr><!-- tr Begin -->
                                   
                                   <td> Order Sub-Total </td>
                                   <th>Rs. <?php echo $totalprice; ?></th>
                                   
                               </tr><!-- tr Finish -->
                               
                               <tr><!-- tr Begin -->
                                   
                                   <td> Shipping and Handling </td>
                                   <td> Rs.0 </td>
                                   
                               </tr><!-- tr Finish -->
                               
                               <tr><!-- tr Begin -->
                                   
                                   <td> Tax </td>
                                   <th> Rs.0 </th>
                                   
                               </tr><!-- tr Finish -->
                               
                               <tr class="total"><!-- tr Begin -->
                                   
                                   <td> Total </td>
                                   <th>Rs.<?php echo $totalprice; ?></th>
                                   
                               </tr><!-- tr Finish -->
                               
                           </tbody><!-- tbody Finish -->
                           
                       </table><!-- table Finish -->
                       
                   </div><!-- table-responsive Finish -->
                   
               </div><!-- box Finish -->
               
           </div><!-- col-md-3 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
</div>
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    


    <!-- Central Modal Medium Success -->
    <div class="modal fade" id="confirmClear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-notify modal-success" role="document">
        <!--Content-->
        <div class="modal-content">
        <!--Header-->
        <div class="modal-header">
            <p class="  text-center text-danger heading lead"><b>Confirm Clear Cart</b></p>

            <!--button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
            </button-->

            
        </div>

        <!--Body-->
        <div class="modal-body">
        
            <div class="text-center">
            <!--img src="images/cart.PNG" alt="Cart Image" class="img-fluid img-responsive" style="margin: 0 auto" /-->
            <p>Last chance to change your mind!</p>
            </div>
        </di>

        <!--Footer-->
        <div class="modal-footer justify-content-center">
            <a href="clearCart.php?uid=<?php echo $_SESSION['user_id']; ?>" type="button" class="btn btn-danger ">Confirm Delete <i class="far fa-gem ml-1 text-white"></i></a>
            <a type="button" class="btn btn-success waves-effect" data-dismiss="modal">Cancel</a>
        </div>
        </div>
        <!--/.Content-->
    </div>
    </div>
    <!-- Central Modal Medium Success-->


  
                               

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script src="functions/navscroll.js"></script>
    
</body>
</html>