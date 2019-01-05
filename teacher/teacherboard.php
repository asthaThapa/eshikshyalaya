<?php 
session_start();
if (isset($_SESSION['teacher_logged_in']) && $_SESSION['teacher_logged_in'] === TRUE) {
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
		<title>Teacher Dashboard</title>

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
				        <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li><a href="teacherboard.php">Home</a></li>
				         	 <li class="menu-has-children"><a href="">Notes</a>
				            <ul>
				              <li><a href="create_note.php">Create new</a></li>
				              <li><a href="Note_list.php">View List</a></li>
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

			<section class="other-issue-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-9">
		                   
		                </div>
		            </div>					
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<div class="single-other-issue">
								<div class="thumb">
									<img class="img-fluid" src="../img/create_assign.jpg" alt="Create assignment">					
								</div>
								<a href="create_assign.php">
									<h4>Create Assignment</h4>
								</a>
							
									
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-other-issue">
								<div class="thumb">
									<img class="img-fluid" src="../img/view_assign.jpg" alt="view assignment">					
								</div>
								<a href="assign_list.php">
									<h4>View Assignment List</h4>
								</a>
								
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-other-issue">
								<div class="thumb">
									<img class="img-fluid" src="../img/student_list.jpg" alt="">					
								</div>
								<a href="student_list.php">
									<h4>View Student List</h4>
								</a>
								
							</div>
						</div>
							<div class="col-lg-4 col-md-6">
							<div class="single-other-issue">
								<div class="thumb">
									<img class="img-fluid" src="../img/note.jpg" alt="">					
								</div>
								<a href="create_note.php">
									<h4>Create new note</h4>
								</a>
								
							</div>
						</div>	

						<div class="col-lg-4 col-md-6">
							<div class="single-other-issue">
								<div class="thumb">
									<img class="img-fluid" src="../img/bg-login.jpg" alt="">					
								</div>
								<a href="Note_list.php">
									<h4>View Note list</h4>
								</a>
								
							</div>
						</div>																	
					</div>
				</div>	
			</section>
			<!-- End other-issue Area -->

			<!-- End destinations Area -->
			    <footer class="py-5 bg-dark">
				      <div class="container">
				        <p class="col-lg-8 col-sm-12 footer-text m-0">
									<p style="text-align: center;">E-shikshyalaya@2018</p>
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
		echo '<p>You must be logged in as teacher to view this page.</p>';
	}
	?>