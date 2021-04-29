<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Begin -->
    <div class="panel-heading"><!-- panel-heading Begin -->
        <h3 class="panel-title">Products Categories</h3>
    </div><!-- panel-heading Finish -->
    
    <div class="panel-body"><!-- panel-body Begin -->
        <ul class="nav nav-pills nav-stacked category-menu"><!-- nav nav-pills nav-stacked category-menu Begin -->
            
           
            <?php 
                include_once 'dbconnection.inc.php';
                $db = new DB;
                $query = oci_parse($db->connect(), "SELECT * FROM CATEGORY");
                oci_execute($query);
                while($row = oci_fetch_assoc($query))
                {
                   ?>
                    <li><a href="categoryproducts.php?cat_id=<?php echo $row['CAT_ID'] ?>"><?php echo $row['CAT_NAME']; ?></a></li>
                    <?php   
                }
            ?>
        </ul><!-- nav nav-pills nav-stacked category-menu Finish -->
    </div><!-- panel-body Finish -->
    
</div><!-- panel panel-default sidebar-menu Finish -->


<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Begin -->
    <div class="panel-heading"><!-- panel-heading Begin -->
        <h3 class="panel-title">Shops</h3>
    </div><!-- panel-heading Finish -->
    
    <div class="panel-body"><!-- panel-body Begin -->
        <ul class="nav nav-pills nav-stacked category-menu"><!-- nav nav-pills nav-stacked category-menu Begin -->
            
            <?php 
                $query = oci_parse($db->connect(), "SELECT * FROM SHOP");
                oci_execute($query);
                while($row = oci_fetch_assoc($query))
                {
                   ?>
                    <li><a href="shopproducts.php?shop_id=<?php echo $row['SHOP_ID'] ?>"><?php echo $row['SHOP_NAME']; ?></a></li>
                    <?php   
                }
            ?>
            
        </ul><!-- nav nav-pills nav-stacked category-menu Finish -->
    </div><!-- panel-body Finish -->
    
</div><!-- panel panel-default sidebar-menu Finish -->