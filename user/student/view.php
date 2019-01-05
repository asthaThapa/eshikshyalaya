	<?php
session_start();
require_once '../config/config.php';
// require_once 'includes/auth_validate.php'; DONT FORGET TO ADD IN LATER
if(isset($_SESSION['student_id']))
{
	$studentId = $_SESSION['student_id'];
	$db3 = getDbInstance();
	$db3->where('s_id', $studentId);
	$row3 = $db3->get('student_table');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
	$id = $_GET['id'];

	$db =  getDbInstance(); 
	$select = array('t_id');
	$db->where('id', $id);
	$row = $db->get('teacher_assignments');
	// var_dump($row[0]['id']); exit;

	$teacherId = $row[0]['teacher_id'];
	$db2 =  getDbInstance(); 
	$db2->where('id', $teacherId);
	$row2 = $db->get('teachers');

}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if(isset($_POST['submit']))
		{
			// var_dump($_POST); exit;
			$assignment_id = $_POST['assignment_id'];
			$roll_no = $_POST['roll_no'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$message = $_POST['message'];
			

			// $data_to_store = filter_input_array(INPUT_POST);
			$data_to_store = array(
				'assignment_id' => $assignment_id,
				'student_id' => $roll_no, 
				'name' => $name, 
				'email' => $email,
				'message' => $message
			);


			if(isset($_FILES['file'])){
				$errors = array();
				$file_name = $_FILES['file']['name'];
				$file_size = $_FILES['file']['size'];
				$file_tmp = $_FILES['file']['tmp_name'];
				$file_type = $_FILES['file']['type'];
				$file_ext = strtolower(end(explode('.', $_FILES['file']['name'])));

				$extensions = array("jpeg", "jpg", "png", "pdf");

				if (in_array($file_ext, $extensions) == false){
					$errors[] = "extension not allowed, please choose a JPEG or PNG of PDF file.";
				}

				if(empty($errors) == true){
					move_uploaded_file($file_tmp, "../uploads/student_assignments/".$file_name);
					$data_to_store['file_name'] = $file_name;
					$data_to_store['created_at'] = date('Y-m-d H:i:s');

					$db = getDbInstance();
					$last_id = $db->insert('student_assignments', $data_to_store);
					if($last_id)
					{
						$_SESSION['success'] = "Assignment submitted successfully!";
						header("Location:studentboard.php");
					}else{
						header("Location:student/view.php?id=".$id);
					}
				}else{
					print_r($errors); exit;
				}
			}

		}
	}

?>
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
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
		<title>Eshikshyalaya	</title>

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
			<header id="header">
				
				<div class="container main-menu">
					<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li><a href="studentboard.php">Home</a></li>
				          <li><a href="about.html">Notice Board</a></li>
				          <li><a href="packages.html">Events</a></li>
				          <li><a href="hotels.html">Notes</a></li>
				          <li><a href="insurance.html">Assignments</a></li>
				          <li class="menu-has-children"><a href="">Settings</a>
				            <ul>
				              <li><a href="edit.php">Edit</a></li>
				              <li><a href="../logout.php">Logout</a></li>
				            </ul>
				          </li>	
				          			          					          		          
				          
				        </ul>
				      </nav><!-- #nav-menu-container -->					      		  
					</div>
				</div>
			</header><!-- #header -->
			  
			
			<section class="post-content-area single-post-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 posts-list">
							<div class="single-post row">
							
									
								<div class="col-lg-3  col-md-3 meta-details">
									<ul class="tags">
										<li><a href="#">Chapter <?php echo $row[0]['chapter_no']; ?></a></li>
										<li><a href="#"><?php echo $row[0]['chapter']; ?></a></li>
									
									</ul>
									<div class="user-details row">
										<p class="user-name col-lg-12 col-md-12 col-6"><a href="#"><?php echo ucfirst($row2[0]['fname']) . ' ' . $row2[0]['lname']; ?></a> <span class="lnr lnr-user"></span></p>
										<p class="date col-lg-12 col-md-12 col-6"><a href="#"><?php echo date('dS M Y', strtotime($row[0]['created_at'])); ?></a> <span class="lnr lnr-calendar-full"></span></p>
										
																														
									</div>
									<div style="margin:auto;">
										<a href="../uploads/assignments/<?php echo $row[0]['file_name']; ?>" class="primary-btn text-uppercase">Download</a>	
								</div>	
 	
								</div>
								<div class="col-lg-9 col-md-9">
									<h3 class="mt-20 mb-20"><?php echo $row[0]['title']; ?></h3>
									<!-- <p class="excert">
										<h4> Details </h4>
										MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.
									</p> -->
									<div class="quotes">
										<h4> About the Assignment </h4>
										<?php echo $row[0]['summary']; ?>									
									</div>			
														
								</div>

								
													
							<div class="comment-form col-lg-6" style="margin-top: 30px;">
								<h3 style="margin-top:20px; margin-bottom: 50px;">Submit your Assignment</h3>
								<form method="POST" enctype="multipart/form-data">
									<input type="hidden" name="assignment_id" value="<?php echo $id; ?>">
									<div class="form-group form-inline">
									  <div class="form-group col-lg-2 col-md-12 name">
									    <input type="text" class="form-control" id="roll_no" name="roll_no" value="<?php echo $row3[0]['roll_no']; ?>" readonly>
									  </div>
									  <div class="form-group col-lg-4	 col-md-12 email">
									    <input type="email" class="form-control" id="name" name="name" value="<?php echo $row3[0]['fname'] . ' ' . $row3[0]['lname']; ?>" readonly>
									  </div>	
									  <div class="form-group col-lg-6 col-md-12 email">
									    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row3[0]['email']; ?>" name=""readonly>
									  </div>																			
									</div>
									<div class="form-group">
										<textarea class="form-control mb-10" rows="5" name="message" placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required=""></textarea>
									</div>

									<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01" style="background-color: #f8b600; border: none; color:white;">Upload</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile01" name="file" aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01">Choose file </label>
  </div>
</div>

									<button class="primary-btn text-uppercase" type="submit" name="submit">Submit</button>	
								</form>
							</div>


						</div>
						
			
			<!-- start footer Area -->		
		
			<<script src="../js/vendor/jquery-2.2.4.min.js"></script>
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