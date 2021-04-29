<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Organocity </title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />
    <link rel="stylesheet" href="styles/style.css">
</head>
<body >
   
    <?php
        include 'includes/navbar.php';
        ?>
   
   <div class="container animated bounce" id="testomonial"><!-- container Begin -->
       
   <video margin="25px" width="1200px" height="auto"  controls autoplay poster="cover.jpg" >
  <source src="video.mp4" type="video/mp4" > </video>

   </div><!-- container Finish -->
   
   <div id="advantages"><!-- #advantages Begin -->
        
<div class="container" style=" background-image: url(customer_images/pic.jpg); width:100%  !important;padding:10% !important;position:relative; height:80vh  !important; right:-%;">
  <h1 style="color:white; text-transform: uppercase;font-size: 60px;margin: 0px;letter-spacing: 5px;  animation: fadeInDown; animation-duration: 2s; "> Deal Of The Day </h1>
  <br>
  <p style=" animation: fadeInDown; animation-duration: 2s; color:white; font-size: 15px;">Far far away, behind the word mountains, far from the countries Vokalia <br> and Consonantia </p>

    <?php
        

    ?>

  <h2 style=" color:white;margin: 0;
    font-size: 40px;
    font-weight: 500;
    font-style: italic;  animation: fadeInDown; animation-duration: 2s;"> Spinach <h2>
    <p style="color:white; font-size: 20px;  animation: fadeInDown; animation-duration: 2s">$10 now $5 only</p>

  <div class="count  animated fadeInDown" style=" color:white; margin: 40px 0;">
    <div class="countd" style="color:white; display: inline-block; width: 80px; height: 80px;border: 2px solid;margin: 0 30px;font-size: 12px;border-radius: 50%; overflow: hidden;
">
      <span id="days" style=" color:white; display: block;font-size: 26px;margin-top: 14px;">00</span>
      DAYS
    </div>
    
    <div class="countd" style=" color:white; display: inline-block; width: 80px; height: 80px;border: 2px solid;margin: 0 30px;font-size: 12px;border-radius: 50%; overflow: hidden;">
      <span id="hours" style=" color:white; display: block;font-size: 26px;margin-top: 14px;">00</span>
      HOURS
    </div>

    <div class="countd" style="color:white;  display: inline-block; width: 80px; height: 80px;border: 2px solid;margin: 0 30px;font-size: 12px;border-radius: 50%; overflow: hidden;">
      <span id="minutes" style="color:white; display: block;font-size: 26px;margin-top: 14px;">00</span>
      MINUTES
    </div>

    <div class="countd" style=" color:white; display: inline-block; width: 80px; height: 80px;border: 2px solid;margin: 0 30px;font-size: 12px;border-radius: 50%; overflow: hidden;">
      <span id="seconds" style="color:white; display: block;font-size: 26px;margin-top: 14px;">00</span>
      SECONDS
    </div>

  </div>
</div>



<script type="text/javascript">

 var count = new Date("june 25, 2020 00:00:00").getTime();
 var x = setInterval(function(){
   var now = new Date().getTime();
   var d = count - now;

   var days = Math.floor(d/(1000*60*60*24));
   var hours = Math.floor((d%(1000*60*60*24))/(1000*60*60));
   var minutes = Math.floor((d%(1000*60*60))/(1000*60));
   var seconds = Math.floor((d%(1000*60))/1000);

   document.getElementById("days").innerHTML = days;
   document.getElementById("hours").innerHTML = hours;
   document.getElementById("minutes").innerHTML = minutes;
   document.getElementById("seconds").innerHTML = seconds;


if(d <= 0){
  clearInterval(x);
}

 },1000);

</script>


       
   </div><!-- #advantages Finish -->



   <h2>Testimonials</h2>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Carousel indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>   
	<!-- Wrapper for carousel items -->
	<div class="carousel-inner">		
		<div class="item carousel-item active" style="background:#ffffff">
			<div class="img-box"><img src="customer_images/yogesh.jpg" alt=""></div>
			<p class="testimonial">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem animi ratione et, quas tempore soluta quos cum incidunt illo deleniti! Dolore dolores quisquam at nisi nostrum iusto iure sapiente obcaecati.</p>
			<p class="overview"><b>Yogesh Shrestha</b> Front Inn Specialist <a href="#">The British college</a></p>
			<div class="star-rating">
				<ul class="list-inline">
					<li class="list-inline-item"><i class="fa fa-star"></i></li>
					<li class="list-inline-item"><i class="fa fa-star"></i></li>
					<li class="list-inline-item"><i class="fa fa-star"></i></li>
					<li class="list-inline-item"><i class="fa fa-star"></i></li>
					<li class="list-inline-item"><i class="fa fa-star-o"></i></li>
				</ul>
			</div>
		</div>
		<div class="item carousel-item" style="background:#ffffff">
			<div class="img-box"><img src="customer_images/amit.jpg" alt=""></div>
			<p class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Vestibulum idac nisl bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
			<p class="overview"><b>Amit Karn</b> Coding Specialist <a href="#">The British College</a></p>
			<div class="star-rating">
				<ul class="list-inline">
					<li class="list-inline-item"><i class="fa fa-star"></i></li>
					<li class="list-inline-item"><i class="fa fa-star"></i></li>
					<li class="list-inline-item"><i class="fa fa-star"></i></li>
					<li class="list-inline-item"><i class="fa fa-star"></i></li>
					<li class="list-inline-item"><i class="fa fa-star-o"></i></li>
				</ul>
			</div>
		</div>
		<div class="item carousel-item" style="background:#ffffff">
			<div class="img-box"><img src="customer_images/saurav.jpg" alt=""></div>
			<p class="testimonial">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel porro doloribus cupiditate reprehenderit consequuntur modi aperiam. Doloribus exercitationem impedit quam quos, distinctio iusto consequatur reiciendis quisquam, possimus, suscipit beatae omnis!</p>
			<p class="overview"><b>Saurav Shrestha</b>Back End Specialist <a href="#">The British College</a></p>
			<div class="star-rating">
				<ul class="list-inline">
					<li class="list-inline-item"><i class="fa fa-star"></i></li>
					<li class="list-inline-item"><i class="fa fa-star"></i></li>
					<li class="list-inline-item"><i class="fa fa-star"></i></li>
					<li class="list-inline-item"><i class="fa fa-star"></i></li>
					<li class="list-inline-item"><i class="fa fa-star-half-o"></i></li>
				</ul>
			</div>
		</div>		
	</div>
	<!-- Carousel controls -->
	<a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
		<i class="fa fa-angle-left"></i>
	</a>
	<a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
		<i class="fa fa-angle-right"></i>
	</a>
</div>

   

   
   <div id="hot"><!-- #hot Begin -->
       
       <div class="box"><!-- box Begin -->
           
           <div class="container"><!-- container Begin -->
               
               <div class="col-md-12"><!-- col-md-12 Begin -->
                   
                   <h2>
                       OUR LOCATION
                   </h2>
                   
               </div><!-- col-md-12 Finish -->
               
           </div><!-- container Finish -->
           
       </div><!-- box Finish -->
       
   </div><!-- #hot Finish -->
   



   <div id="location"><!-- #footer Begin -->
    <div class="container"><!-- container Begin -->
        <div class="row"><!-- row Begin -->

        
   <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14131.254806721035!2d85.3195389!3d27.6921523!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xabfe5f4b310f97de!2sThe%20British%20College%2C%20Kathmandu!5e0!3m2!1sen!2snp!4v1589036184384!5m2!1sen!2snp" width="1156" height="550" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
   

   </div><!-- #footer Begin -->
   </div ><!-- container Begin -->
   </div><!-- row Begin -->


   
   
   
<br /><br />
   
   


    
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script src="../functions/navscroll.js"></script>

    
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