<?php 
    include_once "includes/dbconnection.inc.php";
    session_start();
    $db = new DB;

    if(isset($_SESSION['cartadded']))
    {
        if($_SESSION['cartadded'])
        {
        ?>
        <script>
            alert("1 Item added to the cart!");
        </script>
        <?php
        $_SESSION['cartadded'] = false;
        }
    } 

    if(isset($_SESSION['reviewPosted']))
    {
        if($_SESSION['reviewPosted'])
        {
        ?>
        <script>
            alert("Thank You for your feedback!");
        </script>
        <?php
        $_SESSION['reviewPosted'] = false;
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
        /*Customer Review*/
        .review-img{ }
        .review-card{ max-width: 540px;margin-top:0; padding:0;margin-right:0;padding-right:10px;}
        .review-card:hover{}
        .review-card .cust-img{width:40px;height:40px;float:right;}
        .review-card a:hover{text-decoration:none; color:#d8345f;}
        /*Card Image Wrap Effect on Hover */
        .card-img-wrap {
        overflow: hidden;
        position: relative;
        }
        .card-img-wrap:after {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(255,255,255,0.1);
        opacity: 0;
        transition: opacity .25s;
        }
        .card-img-wrap img {
        transition: transform .25s;
        width: 100%;
        }
        .card-img-wrap:hover img {
            transform: scale(1.2);
        }
        .card-img-wrap:hover:after {
        opacity: 1;
        }
    </style>

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
           <?php 
                $shop_id = 0;
                $product_id = $_GET['pid'];
                $productquery = oci_parse($db->connect(), "SELECT * FROM PRODUCT WHERE PRODUCT_ID = $product_id");
                oci_execute($productquery);
                while($row = oci_fetch_assoc($productquery))
                {
                    $shop_id = $row['SHOP_ID'];
           ?>
           <div class="col-md-9"><!-- col-md-9 Begin -->
               <div id="productMain" class="row"><!-- row Begin -->
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div id="mainImage"><!-- #mainImage Begin -->
                           <div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- carousel slide Begin -->
                               <ol class="carousel-indicators"><!-- carousel-indicators Begin -->
                                   <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>
                                   <li data-target="#myCarousel" data-slide-to="1"></li>
                                   <li data-target="#myCarousel" data-slide-to="2"></li>
                               </ol><!-- carousel-indicators Finish -->
                               
                               <div class="carousel-inner">
                                   <div class="item active">
                                       <center><img class="img-responsive" src="images/products/<?php echo $row['PRODUCT_IMAGE1']; ?>" alt="<?php echo $row['PRODUCT_NAME']; ?>"></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive" src="images/products/<?php echo $row['PRODUCT_IMAGE2']; ?>" alt="<?php echo $row['PRODUCT_NAME']; ?>"></center>
                                   </div>
                                   <div class="item">
                                       <center><img class="img-responsive" src="images/products/<?php echo $row['PRODUCT_IMAGE2']; ?>" alt="<?php echo $row['PRODUCT_NAME']; ?>"></center>
                                   </div>
                               </div>
                               
                               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->
                                   <span class="glyphicon glyphicon-chevron-left"></span>
                                   <span class="sr-only">Previous</span>
                               </a><!-- left carousel-control Finish -->
                               
                               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- right carousel-control Begin -->
                                   <span class="glyphicon glyphicon-chevron-right"></span>
                                   <span class="sr-only">Previous</span>
                               </a><!-- right carousel-control Finish -->
                               
                           </div><!-- carousel slide Finish -->
                       </div><!-- mainImage Finish -->
                   </div><!-- col-sm-6 Finish -->
                   
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div class="box"><!-- box Begin -->
                       <form action="addToCart.php" 
                       class="form-horizontal" method="GET" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                           
                       <h1 class="text-center"><?php echo strtoupper($row['PRODUCT_NAME']); ?></h1>
                       <h4 class="text-center">
                        <?php
                            $script = oci_parse($db->connect(), "SELECT RATING FROM REVIEW 
                            WHERE  PRODUCT_ID = $product_id");
                            oci_execute($script);
                            $rating = 0;
                            $index = 0;
                            while($row1 = oci_fetch_assoc($script))
                            {
                                $rating = $rating + $row1['RATING'];
                                $index++;
                            }
                            if($rating != 0)
                            {
                                $star = $rating/$index;
                                for($i = $star; $i >= 1; $i--)
                                {
                                    echo '<i class="fa fa-star" style="color:#f0a500"></i>';
                                }
                                for($i = 5-$star; $i >= 1; $i--)
                                {
                                    echo '<i class="fa fa-star" style="color:#cee397"></i>';
                                }
                            }
                            else{
                                for($i = 0; $i < 5; $i++)
                                {
                                    echo '<i class="fa fa-star" style="color:#cee397"></i>';
                                }
                            }
                        ?> 
                       </h4>
                       <table class="table">
                            <tbody>
                                <tr>
                                    
                                    <td>Stock:</td>
                                    <td>
                                        <?php
                                            if($row['STOCK_AVAILABLE'] != 0)
                                            {
                                                echo '<h4 class="text-success">'.$row['STOCK_AVAILABLE'].' in stock</h4>';
                                            }
                                            else
                                            {
                                                echo '<h4 class="text-danger">Out of stock</h4>';
                                            }
                                       ?>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td>Minimum Order:</td>
                                    <td><span class="text-primary">  <?php echo $row['MIN_ORDER'] ?></span></td>
                                </tr>
                                <tr>
                                    <td>Maximum Order:</td>
                                    <td><span class="text-primary">  <?php echo $row['MAX_ORDER'] ?></span></td>
                                </tr>
                                <tr>
                                    <td>Products Quantity</td>
                                    <td>
                                        <select name="quantity" id=""  class="form-control"
                                          <?php if($row['STOCK_AVAILABLE'] == 0) { echo "disabled"; }  ?> ><!-- select Begin -->
                                           <?php
                                                $min_order = $row['MIN_ORDER'];
                                                $max_order = $row['MAX_ORDER'];
                                                $index = $min_order;
                                                while($index <= $max_order)
                                                {
                                                    echo '<option value='.$index.'> '.$index.'</option>';
                                                    $index = $index + 1;
                                                }
                                           ?>
                                        </select><!-- select Finish -->
                                   
                                    </td>
                                </tr>
                                <tr>

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
                                    <td>Price:</td>
                                    <td>
                                    <?php if($discount_flag == 0) { ?>
                                        <h4 class="text-danger"> NRS. <?php echo $row['PRODUCT_PRICE']; ?></h4>
                                    <?php } else { 
                                        $new_price = $row['PRODUCT_PRICE'] * ($discount/100);
                                        
                                        ?>
                                        <h4 class="text-danger"><del class="text-danger">NRS. <?php echo $row['PRODUCT_PRICE']; ?></del>
                                        NRS. <?php echo $new_price; ?>
                                        </h4>
                                        <?php
                                    }?>
                                    <!--h4 class="text-danger"> NRS. <?php //echo $row['PRODUCT_PRICE']; ?></h4></</td-->
                                </tr><br /><br />
                                <tr>    
                                    <input type="hidden" name="pid" value="<?php echo $row['PRODUCT_ID']; ?>" >
                                    <?php 
                                    if(isset($_SESSION['user_id']))
                                    { ?>
                                    <td class="text-center" colspan="2"><p class="text-center buttons">
                                        <button type="submit" class="btn btn-primary i fa fa-shopping-cart" style="width:40% !important;padding:10px !important;"> Add to cart</button></p>
                                    </td>
                                  <?php  }
                                    else{
                                        ?><td class="text-center" colspan="2"><p class="text-center buttons">
                                        <a  href="cartcookie.php?pid=<?php echo $row['PRODUCT_ID']; ?>">
                                            <button type="button" class="btn btn-primary hoverbtn i fa fa-shopping-cart" style="width:40% !important;padding:10px !important;" >
                                                Add to Cart
                                            </button>
                                        </a>
                                        </td>
                                        <?php
                                    }
                                    ?>
                                </tr>
                            </tbody>
                        </table>

                        </form><!-- form-horizontal Finish -->
                           
                       </div><!-- box Finish -->
                       
                       <div class="row" id="thumbs"><!-- row Begin -->
                           
                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                               <a data-target="#myCarousel" data-slide-to="0"  href="#" class="thumb"><!-- thumb Begin -->
                                   <img src="images/products/<?php echo $row['PRODUCT_IMAGE1'] ?>" alt="<?php echo $row['PRODUCT_NAME'] ?>" class="img-responsive">
                               </a><!-- thumb Finish -->
                           </div><!-- col-xs-4 Finish -->
                           
                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                               <a data-target="#myCarousel" data-slide-to="1"  href="#" class="thumb"><!-- thumb Begin -->
                                   <img src="images/products/<?php echo $row['PRODUCT_IMAGE2'] ?>" alt="<?php echo $row['PRODUCT_NAME'] ?>" class="img-responsive">
                               </a><!-- thumb Finish -->
                           </div><!-- col-xs-4 Finish -->
                           
                           <div class="col-xs-4"><!-- col-xs-4 Begin -->
                               <a data-target="#myCarousel" data-slide-to="2"  href="#" class="thumb"><!-- thumb Begin -->
                                   <img src="images/products/<?php echo $row['PRODUCT_IMAGE3'] ?>" alt="<?php echo $row['PRODUCT_NAME'] ?>" class="img-responsive">
                               </a><!-- thumb Finish -->
                           </div><!-- col-xs-4 Finish -->
                           
                       </div><!-- row Finish -->
                       
                   </div><!-- col-sm-6 Finish -->
                   
                    
               </div><!-- row Finish -->
               
               <div class="box" id="details"><!-- box Begin -->
                       
                    <h4>Product Details</h4>
                   
                    <p>
                        <?php echo $row['PRODUCT_DESCRIPTION']; ?>
                    </p>
                   
                     <hr>

                     <h4>Allergy Information</h4>
                   
                    <p>
                        <?php echo $row['ALLERGY_INFORMATION']; ?>
                    </p>
                   
                     <hr>

                    <br />
                     <h3 class="text-center mb-2 text-primary" style="">Reviews and Ratings</h3>
                <hr style="width:5%; border:1.4px solid #1089ff"><br />
            <div class="container">
                <?php
                        $script = oci_parse($db->connect(), "SELECT p.PRODUCT_ID, PRODUCT_IMAGE1, USER_IMAGE, PRODUCT_NAME, FULLNAME, REVIEW_DATE, RATING, REVIEW_DESCRIPTION FROM REVIEW r, PRODUCT p, USERS u 
                        WHERE r.PRODUCT_ID = p.PRODUCT_ID AND r.USER_ID = u.USER_ID AND r.PRODUCT_ID = $product_id");
                        oci_execute($script);
                        $index = 0;
                        while($row = oci_fetch_assoc($script))
                        {   
                            ?>
                            <div class="col-lg-6 card mb-4 review-card" style="border:0px;max-width:40%;">
                                <div class="row no-gutters " style="border:0px;box-shadow:0 0 0;">
                                    <div class="col-md-3">
                                    <div class="card-img-wrap img-circle" style="filter:drop-shadow(0 0 3px #3f3f44);position:relative;top:20px;">
                                        <img src="customer/customer_images/<?php echo $row['USER_IMAGE']; ?>" 
                                        style="width:110px;height:110px;" 
                                        class="card-img img-circle img-responsive review-img" alt="Customer Image">
                                    </div>
                                    </div>
                                    <div class="col-md-8">
                                    <div class="card-body" style="margin:0 !important; padding:0 !important;">
                                        <h3><?php
                                            $star = $row['RATING'];
                                            
                                            for($i = $star; $i >= 1; $i--)
                                            {
                                                echo '<i class="fa fa-star" style="color:#f0a500"></i>';
                                            }
                                            for($i = 5-$star; $i >= 1; $i--)
                                            {
                                                echo '<i class="fa fa-star" style="color:#cee397"></i>';
                                            }
                                        ?></h3>
                                        <p class="card-text"><?php echo $row['REVIEW_DESCRIPTION']; ?></p>
                                        <h5 class="text-muted" >- <?php echo ucfirst($row['FULLNAME']); ?></h5>
                                        <p class="card-text"><small class="text-muted"  style="">Reviewed on: <?php echo $row['REVIEW_DATE']; ?></small></p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                    <?php 
                        } 
                    ?>
                </div>
               </div><!-- box Finish --> 
               <?php } 
               
               if(isset($_SESSION['user_id']))
               {
               ?>            
            <hr />
             <!--Textarea with icon prefix-->
            <form class="form container-fluid" action="includes/postReview.inc.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $product_id; ?>" name="product_id" />
                <h3 class="text-center"><i class="fa fa-pencil prefix text-primary"> Your Feedback</i></h3>
                <textarea required id="form10" class="md-textarea form-control" name="review" rows="2" placeholder="Write your feedback here..."></textarea>
                <span class="text-muted" style="padding:auto !important;">
                    Rate Stars <i class="fa fa-star" style="color:#f0a500"></i> &nbsp;: 
                    
                    <!-- Default inline 1-->
                    <span class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" value="1" id="defaultInline1" name="stars" required>
                    <label class="custom-control-label" for="defaultInline1">1</label>
                    </span>&nbsp;
                        
                    <!-- Default inline 2-->
                    <span class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" value="2" id="defaultInline2" name="stars" required>
                    <label class="custom-control-label" for="defaultInline2">2</label>
                    </span>&nbsp;

                    <!-- Default inline 3-->
                    <span class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" value="3" id="defaultInline3" name="stars" required>
                    <label class="custom-control-label" for="defaultInline3">3</label>
                    </span>&nbsp;

                    <!-- Default inline 1-->
                    <span class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" value="4" id="defaultInline1" name="stars" required>
                    <label class="custom-control-label" for="defaultInline1">4</label>
                    </span>&nbsp;

                    <!-- Default inline 2-->
                    <span class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" value="5" id="defaultInline2" name="stars" required>
                    <label class="custom-control-label" for="defaultInline2">5</label>
                    </span>
                </span><br /><br />
                <button type="submit" class="btn btn-warning i fa fa-comment review-sbtn" style="border-radius:0 0 !important;" >
                    Submit Review
                </button>
            </form>
                <?php
               }
               ?>


               <br /><br /><hr/>
               <div id="row same-heigh-row"><!-- #row same-heigh-row Begin -->
                   <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Begin -->
                       <div class="box same-height headline justify-content-center"  style="background:#323232;color:#ecfbfc;"><!-- box same-height headline Begin -->
                           <h3 class="text-center">Products You Maybe Like</h3>
                       </div><!-- box same-height headline Finish -->
                   </div><!-- col-md-3 col-sm-6 Finish -->
                   

                   <?php
                        //Products from the same shop
                        $query = oci_parse($db->connect(), "SELECT * FROM PRODUCT WHERE SHOP_ID =$shop_id");
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