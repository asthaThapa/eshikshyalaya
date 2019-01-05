<?php 
session_start();
if (isset($_SESSION['student_logged_in']) && $_SESSION['student_logged_in'] === TRUE) {
?>

<!DOCTYPE html>
	
	<html>
	
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Dashboard</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="../css/linearicons.css">
			<link rel="stylesheet" href="../css/font-awesome.min.css">
			<link rel="stylesheet" href="../css/bootstrap.css">
			<link rel="stylesheet" href="../css/magnific-popup.css">
			<link rel="stylesheet" href="../css/jquery-ui.css">				
			<link rel="stylesheet" href="../css/nice-select.css">							
			<link rel="stylesheet" href="../css/animate.min.css">
			<link rel="stylesheet" href="../css/owl.carousel.css">				
			<link rel="stylesheet" href="../css/main.css">
			
		</head>
		<body>	
			
			  
			<!-- start banner Area -->
		<!-- 	<section class="about-banner relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Welcome			
							</h1>	
							<p class="text-white link-nav"><a href="index.html">Home </a></p>
						</div>	
					</div>
				</div>

			</section> -->
			<!-- End banner Area -->	


			<header id="header">
				
				<div class="container main-menu">
					<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li><a href="studentboard.php">Home</a></li>
				          <li><a href="notelist.php">Notes</a></li>
				          
				          <li class="menu-has-children"><a href="">Assignments</a>
				            <ul>
				              <li><a href="bf.php">Business Finance</a></li>
				              <li><a href="hrm.php">Human resource management</a></li>
				              <li><a href="ben.php">Business Environment</a></li>
				              <li><a href="se.php">Software Engineering</a></li>
				              <li><a href="cscl.php">Cyber Law</a></li>
				            </ul>
				          </li>	
				           <li class="menu-has-children"><a href="">Settings</a>
				            <ul>
				              <li><a href="../edit.php">Edit</a></li>
				              <li><a href="../logout.php">Logout</a></li>
				            </ul>
				          </li>	
				          			          					          		          
				          
				        </ul>
				      </nav><!-- #nav-menu-container -->					      		  
					</div>
				</div>
			</header><!-- #header -->
			  
			<!-- Start destinations Area -->
			<section class="destinations-area section-gap">

				<div class="container">
		      						
					<div class="row">
						<div class="col-lg-4">
							<div class="single-destinations">
								<div class="thumb">
									<img src="../img/sub/c.jpg" alt="Business finance">
								</div>
								<div class="details">
									<h4 class="d-flex justify-content-between">
										<span>Business Finance</span>                              	
										
									</h4>
																			
										<li class="d-flex justify-content-between align-items-center">
								
											<span>View Assignment List</span>
											<a href="subject.php?subject=Finance" class="price-btn">Go</a>
										</li>													
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-destinations">
								<div class="thumb">
									<img src="../img/sub/d.jpg" alt="Business finance">
								</div>
								<div class="details">
									<h4 class="d-flex justify-content-between">
										<span>Human Resource Management</span>                              	
										
									</h4>
									
										</li>												
										<li class="d-flex justify-content-between align-items-center">
											
											<span>View Assignment List</span>
											<a href="subject.php?HRM" class="price-btn">Go</a>
										</li>													
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-destinations">
								<div class="thumb">
									<img src="../img/sub/e.jpg" alt="Business finance">
								</div>
								<div class="details">
									<h4 class="d-flex justify-content-between">
										<span>Business Environment </span>                              	
										
									</h4>
																		
										<li class="d-flex justify-content-between align-items-center">
											<span>View Assignment List</span>
											<a href="subject.php?subject=Business Environment" class="price-btn">Go</a>
										</li>													
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-destinations">
								<div class="thumb">
									<img src="../img/sub/event-3.jpg" alt="Business finance">
								</div>
								<div class="details">
									<h4 class="d-flex justify-content-between">
										<span> Software Engineering</span>                              	
										
									</h4>
																			
										<li class="d-flex justify-content-between align-items-center">
											<span>View Assignment List</span>
											<a href="subject.php?subject=Software engineering" class="price-btn">Go</a>
										</li>													
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-destinations">
								<div class="thumb">
									<img src="../img/sub/event-2.jpg" alt="Business finance">
								</div>
								<div class="details">
									<h4 class="d-flex justify-content-between">
										<span>Cyber Law</span>                              	
									</h4>
																			
										<li class="d-flex justify-content-between align-items-center">
											<span>View Assignment List</span>
											<a href="subject.php?subject=Cyber Law" class="price-btn">Go</a>
										</li>													
									</ul>
								</div>
							</div>
						</div>


						
					</div>
				</div>	
			</section>
			<!-- End destinations Area -->
			    <footer class="py-5 bg-dark">
				      <div class="container">
				        <p class="col-lg-8 col-sm-12 footer-text m-0">
									Copyright &copy;<script>document.write(new Date().getFullYear());</script>Eshikshyalaya</a>
				      </div>
      <!-- /.container -->
   				 </footer><!-- End footer Area -->	

			<script src="../js/vendor/jquery-2.2.4.min.js"></script>
			<script src="../js/popper.min.js"></script>
			<script src="../js/vendor/bootstrap.min.js"></script>			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>		
 			<script src="../js/jquery-ui.js"></script>					
  			<script src="../js/easing.min.js"></script>			
			<script src="../js/hoverIntent.js"></script>
			<script src="../js/superfish.min.js"></script>	
			<script src="../js/jquery.ajaxchimp.min.js"></script>
			<script src="../js/jquery.magnific-popup.min.js"></script>						
			<script src="../js/jquery.nice-select.min.js"></script>					
			<script src="../js/owl.carousel.min.js"></script>							
			<script src="../js/mail-script.js"></script>	
			<script src="../js/main.js"></script>	
			

		</body>
	</html>

	<?php }else{
		echo '<p>You must be logged in as student to view this page.</p>';
	}
	?>