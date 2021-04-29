<?php 
    session_start();
    include "includes/dbconnection.inc.php";
    $db = new DB;     



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
        body{
            /* The image used */
            background-image: url(images/loginbg.JPG);
                        
                     
            /* Full height */
            height: 100%; 
            
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-position:fixed;
        }
        </style>
</head>
<body>
<?php
    include 'includes/navbar.php';
  ?>
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Search Results
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
   
   <?php 
    
    include("includes/sidebar.php");
    
    ?>
               
           </div><!-- col-md-3 Finish -->
           
           <div class="col-md-9"><!-- col-md-9 Begin -->
            
               <div class="box"><!-- box Begin -->
                   <div class="box-header" style="padding:3%;"><!-- box-header Begin -->
                       
                   <?php
                        $button = $_GET [ 'searchsubmit' ];
                        $search = strtolower($_GET [ 'search' ]); 
                    
                        if( !$button )
                                echo '<span class="text-danger" >You didn\'t submit a keyword!</span>';
                        else 
                        {
                            if( strlen( $search ) <= 1 )
                                    echo '<span class="text-danger" style="">Search term too short!';
                            else {
                                echo '';
                                ?>
                                <form method="GET" action="searchDisplay.php" enctype="multipart/form-data" class="navbar-form"><!-- navbar-form Begin -->
                                    <div class="input-group" style="width:100%;"><!-- input-group Begin -->
                                        <input type="text" class="form-control" placeholder="Search" name="search" value="<?php if(isset($_GET['searchsubmit'])) { echo $_GET['search']; } ?>" >
                                        <span class="input-group-btn"><!-- input-group-btn Begin -->
                                        <button type="submit" name="searchsubmit" value="Search" class="btn btn-primary" style="height:45px !important;"><!-- btn btn-primary Begin -->
                                             <i class="fa fa-search"></i>
                                        </button><!-- btn btn-primary Finish -->
                                        </span><!-- input-group-btn Finish -->
                                    </div><!-- input-group Finish -->
                                </form><!-- navbar-form Finish -->
                                <?php
                                echo '<span class="text-success"  style="">You searched for <b> "'.$search.'"</span> <br/></b> <hr size="1" style="border:0.3px solid #ff9595" >  ';
            
                                $search_exploded = explode ( " ", $search );
                                //Search in product table
                                $x = 0; 
                                $construct = "";
                                foreach( $search_exploded as $search_each ) {
                                    $x++;
                                    if( $x == 1 )
                                            $construct .=" LOWER(PRODUCT_NAME) LIKE '%$search_each%'";
                                    else
                                            $construct .=" OR LOWER(PRODUCT_NAME) LIKE '%$search_each%'";
                                }
                                //Search in category table
                                $x = 0;
                                $constructCat = "";
                                foreach( $search_exploded as $search_each ) {
                                    $x++;
                                    if( $x == 1 )
                                            $constructCat .=" LOWER(CAT_NAME) LIKE '%$search_each%'";
                                    else
                                            $constructCat .=" OR LOWER(CAT_NAME) LIKE '%$search_each%'";
                                }
                                //Search in shop table
                                $x = 0;
                                $constructShop = "";
                                foreach( $search_exploded as $search_each ) {
                                    $x++;
                                    if( $x == 1 )
                                            $constructShop .=" LOWER(SHOP_NAME) LIKE '%$search_each%'";
                                    else
                                            $constructShop .=" OR LOWER(SHOP_NAME) LIKE '%$search_each%'";
                                }
            
                                //Store the products id of products that matches the search text
                                $pids = array();

                                $construct1 = " SELECT * FROM PRODUCT WHERE $construct ";
                                $run = oci_parse($db->connect(), $construct1 );
                                oci_execute($run);
                                $foundnum = 0; 
                                while( $row = oci_fetch_assoc( $run ) ){ $foundnum++; array_push($pids, $row['PRODUCT_ID']); }

                                $construct1Cat = " SELECT p.PRODUCT_ID FROM CATEGORY c INNER JOIN PRODUCT p ON c.CAT_ID = p.CAT_ID WHERE $constructCat";
                                $runCat = oci_parse($db->connect(), $construct1Cat );
                                oci_execute($runCat);
                                $foundnumCat = 0; 
                                while( $row = oci_fetch_assoc( $runCat ) ){ $foundnumCat++; array_push($pids, $row['PRODUCT_ID']); }

                                $construct1Shop = " SELECT p.PRODUCT_ID FROM SHOP s INNER JOIN PRODUCT p ON s.SHOP_ID = p.SHOP_ID WHERE $constructShop ";
                                $runShop = oci_parse($db->connect(), $construct1Shop );
                                oci_execute($runShop);
                                $foundnumShop = 0;
                                while( $row = oci_fetch_assoc( $runShop ) ){ $foundnumShop++; array_push($pids, $row['PRODUCT_ID']); }
            
                                $pidsUnique = array();
                                $pidsUnique = array_unique($pids);      //select only unique product ids
                                
                                if (sizeOf($pidsUnique) == 0 ) {  ?><span class="text-muted"> <?php
                                    echo "Sorry, there are no matching result for <b> $search </b>. </br> </br> 
                                    1. Try more specific words. for example: If you want to search for a meat, then write 
                                    which type of meat like 'pork' or    'chicken'. </br> 
                                    2. Try different words with similar meaning </br> 
                                    3. Please check your spelling";  ?> </span><?php 
                                }
                                else{
                                    
                                    //Search in shop table
                                    $x = 0;
                                    $constructPid = "";
                                    foreach( $pidsUnique as $key => $pid ) {
                                        $x++;
                                        if( $x == 1 )
                                                $constructPid .= " PRODUCT_ID = $pid";
                                        else
                                                $constructPid .= " OR PRODUCT_ID = $pid";
                                                
                                    }
                                   // $y = 1; echo "a".$y++; echo "  b".$y;
                                //}
                                // else {
                                     echo '<span class="text-success" style="position:relative;left:34%;">'.sizeof($pidsUnique).' results found !</span><p> <br /><br />';
                                   
                                     $sql = oci_parse($db->connect(), "SELECT * FROM PRODUCT WHERE $constructPid");
                                     oci_execute($sql); 
                                     echo '<div class="row">';
                                     while( $row = oci_fetch_assoc( $sql ) ) {
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
                                                            ?><!--div class="container  " style="color:#ffd868;padding:5px;position:absolute;top:0px; left:-5px;background:#d63447;width:inherit;height:inherit;;z-index:9999;
                                                            filter:drop-shadow(0 0 1.2px #1b262c"> <?php //echo strtoupper($row1['DISCOUNT_NAME'])." ".$row1['DISCOUNT_PERCENT']; ?>%</div-->
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
                                        <?php 
                                    }
                                    echo "</div>";
                                }
                
                            }
                        }
                    ?>
                       
                   </div><!-- box-header Finish -->
                   
               </div><!-- box Finish -->
               
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