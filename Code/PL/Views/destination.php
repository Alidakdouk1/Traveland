<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Traveland - Destination</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="../Styles/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../Styles/css/animate.css">
    
    <link rel="stylesheet" href="../Styles/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../Styles/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../Styles/css/magnific-popup.css">

    <link rel="stylesheet" href="../Styles/css/aos.css">

    <link rel="stylesheet" href="../Styles/css/ionicons.min.css">

    <link rel="stylesheet" href="../Styles/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../Styles/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="../Styles/css/flaticon.css">
    <link rel="stylesheet" href="../Styles/css/icomoon.css">
    <link rel="stylesheet" href="../Styles/css/style.css">
  </head>
  <body>
	<!-- start nav -->
	<?php include("inc/nav.php") ?>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../Assets/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 mb-5 text-center">
            <h1 class="mb-3 bread">Places to Travel</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Destination <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pb ftco-no-pt">
    	<div class="container">
      
	    	<div class="row">
					<div class="col-md-12">
						<div class="search-wrap-1 ftco-animate p-4">
							<form action="SearchServerSide.php" method="post" class="search-property-1">
		        		<div class="row">
		        			<div class="col-lg align-items-end">
		        				<div class="form-group">
		        					<label for="#">Destination</label>
		          				<div class="form-field">
		          					<div class="icon"><span class="ion-ios-search"></span></div>
				                <input type="text" name="Search" class="form-control" placeholder="Search place">
				              </div>
			              </div>
		        			</div>
		        		
		        			
		        			<div class="col-lg align-self-end">
		        				<div class="form-group">
		        					<div class="form-field">
                                    
				                <input type="submit" name="submit" value="Search" class="form-control btn btn-primary">
				              </div>
			              </div>
		        			</div>
		        		</div>
		        	</form>
		        </div>
					</div>
	    	</div>
	    </div>
    </section>

    <section class="ftco-section" method="post" action="destinationserverside">
    	<div class="container">
    		<div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Best Place to Travel</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
		<?php 
			include('../../BLL/userManager.php');
			$result = getCities();
			$rows = mysqli_fetch_all($result);
		?>
    		<div class="row">
				<?php foreach($rows as $row){ ?>
					
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="project">
    					<div class="img">
		    				<img src="<?= $row[4]?>" class="img-fluid" alt="Colorlib Template">
	    				</div>
	    				<div class="text">

	    					<span>15 Days Tour</span>
	    					<h3><a href='SearchServerSide.php?destination=<?= $row[1]?>'><?= $row[6]?>, <?= $row[1]?></a></h3>
	    					<div class="star d-flex clearfix">
	    						<div class="mr-auto float-left">
		    						<span class="ion-ios-star"></span>
		    						<span class="ion-ios-star"></span>
		    						<span class="ion-ios-star"></span>
		    						<span class="ion-ios-star"></span>
		    						<span class="ion-ios-star"></span>
	    						</div>
	    						<div class="float-right">
	    							<span class="rate"><a href="#">(120)</a></span>
	    						</div>
	    					</div>
	    				</div>
	    				<a href="<?= $row[4]?>" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="icon-expand"></span>
	    				</a>
    				</div>
    			</div>
				<?php } ?>
    		</div>
    	</div>
    </section>
    <footer class="ftco-footer ftco-footer-2 ftco-section">
		<div class="container">
		  <div class="row mb-5">
			<div class="col-md">
			  <div class="ftco-footer-widget mb-4">
				<h2 class="ftco-heading-2">Traveland</h2>
							  <p>Traveland is a guide for everything that thinks or intends to travel. All that needs to be prepared or planned from  beginning to end.</p>
				<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
				  <li class="ftco-animate"><a href="https://twitter.com/TTW_ezine?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><span class="icon-twitter"></span></a></li>
				  <li class="ftco-animate"><a href="https://www.facebook.com/groups/97741620880/"><span class="icon-facebook"></span></a></li>
				  <li class="ftco-animate"><a href="https://www.instagram.com/3.16travel/?hl=en"><span class="icon-instagram"></span></a></li>
				</ul>
			  </div>
			</div>
			
	   
		   
		</div>
	  </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  <script>
      document.addEventListener("DOMContentLoaded", function() {
        var firstNavLink = document.querySelector("#navLinks li:nth-child(2) a");
        if (firstNavLink) {
          firstNavLink.classList.add('active');
        }
      });
    </script>

  <script src="../Scripts/js/jquery.min.js"></script>
  <script src="../Scripts/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../Scripts/js/popper.min.js"></script>
  <script src="../Scripts/js/bootstrap.min.js"></script>
  <script src="../Scripts/js/jquery.easing.1.3.js"></script>
  <script src="../Scripts/js/jquery.waypoints.min.js"></script>
  <script src="../Scripts/js/jquery.stellar.min.js"></script>
  <script src="../Scripts/js/owl.carousel.min.js"></script>
  <script src="../Scripts/js/jquery.magnific-popup.min.js"></script>
  <script src="../Scripts/js/aos.js"></script>
  <script src="../Scripts/js/jquery.animateNumber.min.js"></script>
  <script src="../Scripts/js/bootstrap-datepicker.js"></script>
  <script src="../Scripts/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../Scripts/js/google-map.js"></script>
  <script src="../Scripts/js/main.js"></script>
    
  </body>
</html>