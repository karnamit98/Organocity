<?php
    include 'includes/check_session.inc.php';
    //session_start();
    include 'includes/dbconnection.inc.php';
    include 'includes/postPayment.inc.php';
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
                if($attribute == 'min_order')
                {
                    return $row['MIN_ORDER'];
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
    $pp = new POSTPAYMENT;
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

    $_SESSION['orderAdded'] = false;      //to be used in payment succes to prevent multiple addition of order details
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
        .main-container {
            margin-bottom:5vh;
            margin-top:5vh;
            box-shadow:0 0 5px #333333;
            border-radius:0 0 ;
            padding-bottom:60px;
        }   
        .main-container th, .main-container td{
            vertical-align:middle !important;
        } 
        .main-container option, .main-container select{
            background:#ffffff;color:#3a3535;border:0 !important;height:45px;
            text-align-last:right;
            padding-right: 29px;
            direction: rtl;
        } 
        .pay-btn {   }
        .pay-btn :hover{
            -webkit-transform: scale(1.05);
            -moz-transform: scale(1.05);
            -ms-transform: scale(1.05);
            -o-transform: scale(1.05);
            transform: scale(1.05) ;
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            -o-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out ;
            filter:drop-shadow(0 0 2.5px #000000);
        }
    </style>
</head>
<body>

    
   
<?php
    include 'includes/navbar.php';
  ?>

        <div class="container main-container">
            <h1 class="text-primary text-center" style="filter:drop-shadow(0 0 0.7px #ffd369 );">Confirm Your Order</h1>
            <hr style="width:10%;border:0.4px solid #b9cced;" />
            <div class="table-responsive">
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                <input type="hidden" name="cmd" value="_cart">
                <input type="hidden" name="upload" value="1">
                <input type="hidden" name="business" value="sellerorganocity@gmail.com">
                <input type="hidden" name="return" value="http://localhost/organocity/paymentsuccess.php">

            <table class="table">
                <thead style="background:#617be3;color:#f9f6f7;filter:drop-shadow(0 0 3px #333333 );">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Thumbnail</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Unit-Price</th>
                    <th scope="col">Sub-Total</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php
                    $script = oci_parse($cart->connect(), "SELECT * FROM PRODUCT_CART WHERE CART_NO = $cart->user_id" );
                    oci_execute($script);
                    $index = 1;
                    $totalprice = 0;
                    $uid = $_SESSION['user_id'];
                    //clear temp checkout table
                    $pp->clearTempCheckout($uid);

                    while($row =  oci_fetch_assoc($script))
                    {   $pname = $cart->getProduct($row['PRODUCT_ID'], 'name');  
                        $img = $cart->getProduct($row['PRODUCT_ID'], 'image');
                        $stock = $cart->getProduct($row['PRODUCT_ID'], 'quantity');
                        $quan = $row['QUANTITY'];
                        $uprice  = $cart->getProduct($row['PRODUCT_ID'], 'price');
                        $subtotal = $quan * $uprice;
                         
                         
                        //If not no stock available or the quantity in the cart is greater than the stock available
                        if(!($stock == 0) || ($quan > $stock))
                        { ?>
                    <tr>
                        <th scope="row"><?php echo $index;  ?></th>
                        <td><img class="img-responsive" style="max-width:70px;filter:drop-shadow(0 0 2px #333333 );" 
                            src="images/products/<?php echo $img; ?>" alt="Product Image"></td>
                        <td><?php echo $pname; ?></td>
                        <td><?php echo $quan; ?></td>
                        <td>Rs. <?php echo $uprice; ?></td>
                        <td>Rs. <?php echo $subtotal; $totalprice = $totalprice + $subtotal; ?></td>
                    </tr>
                    <tr><td><input type="hidden" name="item_name_<?php echo $index; ?>" value="<?php echo $pname." * ".$quan; ?>" /></td>
                    <td><input type="hidden" name="amount_<?php echo $index; ?>" value="<?php echo ($subtotal/120); ?>" /></td></tr>
                    
                    <?php  
                        $pp->insertTempCheckout($index, $row['PRODUCT_ID'], $img, $pname, $uprice, $quan, $subtotal, $uid );
                        
                        $index = $index + 1;  
                        } } 
                        $_SESSION['total_items_checkout'] = $index - 1;
                        $_SESSION['payment_amount'] = $totalprice; 
                    
                    ?>
                </tbody>
                <tfoot><!-- tfoot Begin -->
                    <tr><!-- tr Begin -->
                    <td></td>
                        <th colspan="4"><h3 class="text-danger">Total</h3></th>
                        <th colspan="2"><h3 class="text-danger">Rs.<?php echo $totalprice; ?></h3></th>
                    </tr><!-- tr Finish -->
                </tfoot><!-- tfoot Finish -->

            </table>
            
            </div><hr style="border-color: #7fa998;">

        <center class=" pay-btn" style="position:relative;top:10px !important;">
            <button type="submit" class="btn btn-warning" style="" style="">Pay with <img style="height:60px;" src="images/pplogo.PNG" alt="paypal logo" /></button>
        </center>
        </form>

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