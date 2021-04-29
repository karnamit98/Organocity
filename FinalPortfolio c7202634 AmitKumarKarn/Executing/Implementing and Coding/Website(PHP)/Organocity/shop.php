<?php
    include 'includes/dbconnection.inc.php';
    session_start();
    $db = new DB;

    //Alert message when item is added to the cart
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Organocity</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    
</head>
<body>
<?php
    include 'includes/navbar.php';
  ?>
  <div class="container wow bounceInDown animated" id="slider" style="width:115%  !important;padding:0% !important;position:relative;  !important; left:-7%; top:-20px;"><!-- container Begin -->
        
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
                       
                       <img src="admin_area/slides_images/slide-6.jpg" alt="Slider Image 1">
                       
                   </div>
                   
                   <div class="item">
                       
                       <img src="admin_area/slides_images/slide-7.jpg" alt="Slider Image 2">
                       
                   </div>
                   
                   <div class="item">
                       
                       <img src="admin_area/slides_images/slide-8.jpg" alt="Slider Image 3">
                       
                   </div>
                   
                   <div class="item">
                       
                       <img src="admin_area/slides_images/slide-9.jpg" alt="Slider Image 4">
                       
                   </div>

                   <div class="item">
                       
                       <img src="admin_area/slides_images/slide-10.jpg" alt="Slider Image 5">
                       
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
                       Shop
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
   
            <?php 
                
                include("includes/sidebar.php");
                
                ?>
               
           </div><!-- col-md-3 Finish -->
           
           <div class="col-md-9"><!-- col-md-9 Begin -->

           <strong class=" text-muted " style="float:left;margin-right:2% !important;">Sort By:</strong>
                <form class="form" style="margin-bottom:14px;"  action="shop.php" enctype="multipart/form-data" method="POST">
                <div class="form-check " style="float:left;margin-right:3% !important;">
                  <input class="form-check-input" type="radio" name="sort" id="exampleRadios1" value="1" >
                  <label class="form-check-label text-muted" for="exampleRadios1">
                    Albhabetically
                  </label>
                </div>

                <div class="form-check" style="float:left;margin-right:3% !important;">
                  <input class="form-check-input" type="radio" name="sort" id="exampleRadios1" value="2" >
                  <label class="form-check-label text-muted" for="exampleRadios1">
                  Sales (Low to High)
                </div>

                <div class="form-check" style="float:left;margin-right:4% !important;">
                  <input class="form-check-input" type="radio" name="sort" id="exampleRadios1" value="3" >
                  <label class="form-check-label text-muted" for="exampleRadios1">
                    Sales (High to Low)
                  </label>
                </div>
                <input type="submit" class="btn btn-primary " style="border-radius:10px;" value="sort" name="sortSubmit"/>
                </form>
      
               <div class="row"><!-- row Begin -->

                    <?php
            
                        //select all the available products
                        $productQuery = "SELECT * FROM PRODUCT ";

                    if(isset($_POST['sortSubmit']))
                    {
                      $sort = $_POST['sort'];
                      if($sort == 1)
                      {
                        $productQuery = "SELECT * FROM PRODUCT ORDER BY PRODUCT_NAME";
                      }
                      else if($sort == 2)
                      {
                        $productQuery ="SELECT * FROM PRODUCT ORDER BY PRODUCT_PRICE ASC";
                      }
                      else 
                      {
                        $productQuery = "SELECT * FROM PRODUCT ORDER BY PRODUCT_PRICE DESC";
                      }
                    }
                      $getproducts = oci_parse($db->connect(), $productQuery);
                        oci_execute($getproducts);
                        $wow = 1.5;
                        while($row = oci_fetch_assoc($getproducts))
                        {

                    ?>
                    <div class="col-sm-4 col-sm-6 single shopproducts"><!-- col-sm-4 col-sm-6 single Begin -->
               
                        <div class="product wow zoomIn animated " 
                            data-wow-duration="<?php echo $wow; $wow = $wow + 1; ?>s" ><!-- product Begin -->
                        
                        <a href="details.php?pid=<?php echo $row['PRODUCT_ID']; ?>">
                            
                            <img class="img-fluid img-responsive" src="images/products/<?php echo $row['PRODUCT_IMAGE1']; ?>" alt="Product 1">
                            
                        </a>

                        <div class="overlay">
                       <a href="categoryproducts.php?cat_id=<?php echo $row['CAT_ID']; ?>">
                       <button type="button" class="btn btn-secondary hoverbtn"
                       title="View Similar Products"><i class="fa fa-eye"></i>
                         </button>
                        </a>
                         <a href="details.php?pid=<?php echo $row['PRODUCT_ID']; ?>">
                         <button type="button" class="btn btn-secondary hoverbtn"
                       title="View Details"><i class="fa fa-heart-o"></i>
                         </button>
                         </a>
                         <!--a href="cart.php">
                         <button type="button" class="btn btn-secondary"
                       title="Add to cart"><i class="fa fa-shopping-cart"></i>
                         </button>
                         </a-->
                            
                        <?php
                           if(!isset($_SESSION['user_id']))
                           { ?>
                           <a  href="cartcookie.php?pid=<?php echo $row['PRODUCT_ID']; ?>">
                               
                           <button type="button" class="btn btn-secondary hoverbtn"
                                title="Add to cart"><i class="fa fa-shopping-cart"></i>
                            </button>
                               
                            </a> <?php
                           }
                           else
                           {
                            ?>
                            <a href="addToCart.php?pid=<?php echo $row['PRODUCT_ID']; ?>&quantity=<?php
                            echo $row['MIN_ORDER'];  ?>">
                                
                                <button type="button" class="btn btn-secondary hoverbtn"
                                    title="Add to cart"><i class="fa fa-shopping-cart"></i>
                                </button>
                                
                             </a> <?php
                           }

                        ?>

                   </div>
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
                            
                            <h3>
                                <a href="details.php?pid=<?php echo $row['PRODUCT_ID']; ?>">
                                <?php echo $row['PRODUCT_NAME']; ?>
                                </a>
                            </h3>
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
                            
                            <p class="button">
                                
                                <a href="details.php?pid=<?php echo $row['PRODUCT_ID']; ?>" class="btn btn-warning" style="border-radius:0 0;" >View Details</a>
                                
                                <!--a href="cartcookie.php?pid=<?php echo $row['PRODUCT_ID']; ?>" class="btn btn-primary">
                                    
                                    <i class="fa fa-shopping-cart">
                                        Add To Cart
                                    </i>                                    
                                </a-->
                                <?php
                           if(!isset($_SESSION['user_id']))
                           { ?>
                           <a class="btn btn-primary" href="cartcookie.php?pid=<?php echo $row['PRODUCT_ID']; ?>">
                               
                               <i class="fa fa-shopping-cart">
                                   Add To Cart
                               </i>
                               
                            </a> <?php
                           }
                           else
                           {
                            ?>
                            <a class="btn btn-primary" href="addToCart.php?pid=<?php echo $row['PRODUCT_ID']; ?>&quantity=<?php
                            echo $row['MIN_ORDER'];  ?>">
                                
                                <i class="fa fa-shopping-cart">
                                    Add To Cart
                                </i>
                                
                             </a> <?php
                           }

                        ?>
                                
                            </p>
                       
                            </div><!-- text Finish -->
                   
                        </div><!-- product Finish -->
               
                    </div><!-- col-sm-4 col-sm-6 single Finish -->
           
                <?php } ?>
               </div><!-- row Finish -->
               
               <center>
                   <ul class="pagination">
                       <li><a href="#">First Page</a></li>
                       <li><a href="#">1</a></li>
                       <li><a href="#">2</a></li>
                       <li><a href="#">3</a></li>
                       <li><a href="#">4</a></li>
                       <li><a href="#">5</a></li>
                       <li><a href="#">Last Page</a></li>
                   </ul>
               </center>
               
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
    </div>

   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script src="functions/navscroll.js"></script>
    
    
    <script src="js/wow.min.js"></script>
    <script>
    var wow = new WOW(
    {
        boxClass:     'wow',      // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset:       0,          // distance to the element when triggering the animation (default is 0)
        mobile:       true,       // trigger animations on mobile devices (default is true)
        live:         true,       // act on asynchronously loaded content (default is true)
        callback:     function(box) {
        // the callback is fired every time an animation is started
        // the argument that is passed in is the DOM node being animated
        },
        scrollContainer: null,    // optional scroll container selector, otherwise use window,
        resetAnimation: true,     // reset animation on end (default is true)
    }
    );
    wow.init();

    </script>
</body>
</html>