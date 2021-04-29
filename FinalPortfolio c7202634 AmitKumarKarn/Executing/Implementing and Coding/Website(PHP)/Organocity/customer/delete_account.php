
<center> <!--center begin-->

<h1> Do you want to Delete Your Account ? </h1>

<form action="my_account.php" method="post"><!--form begin-->




<a href="#" data-toggle="modal" data-target="#confirmDelete" class="btn btn-danger"><i class="fa fa-shopping-cart"></i>Yes, I want to Delete</a>
<!--input type="submit" name="Yes" value="Yes, I want to Delete" class="btn btn-danger"-->
<input type="submit" name="No" value="No, I don't want to Delete" class="btn btn-primary">

</form><!--form end-->

<!-- Central Modal Medium Success -->
<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-notify modal-success" role="document">
     <!--Content-->
     <div class="modal-content">
       <!--Header-->
       <div class="modal-header">
         <p class="  text-center text-danger heading lead"><b>Confirm Delete</b></p>

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
         <a href="delete_process.php?uid=<?php echo $_SESSION['user_id']; ?>" type="button" class="btn btn-danger ">Confirm Delete <i class="far fa-gem ml-1 text-white"></i></a>
         <a type="button" class="btn btn-success waves-effect" data-dismiss="modal">Cancel</a>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- Central Modal Medium Success-->




</center> <!--center end-->