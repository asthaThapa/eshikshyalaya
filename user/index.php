<?php 
	session_start();
	require_once 'config/config.php';
	// var_dump($_SESSION); exit;
	// if the user is already logged in
	if (isset($_SESSION['student_logged_in']) && $_SESSION['student_logged_in'] === TRUE) {
		// die('student logged in');
    	header('Location:student/studentboard.php');
	}

	if (isset($_SESSION['teacher_logged_in']) && $_SESSION['teacher_logged_in'] === TRUE) {
    	header('Location:teacher/teacherboard.php');
	}

	//get db instance
	$db = getDbInstance();

	//check for request method
	//if post it means form submission
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if (isset($_POST['student'])) {
        	$username = filter_var($_POST['email']);
        	$password = filter_var($_POST['password']);

        	$db->where  ('email', $username);
        	$db->where ('password', $password);
        	$row = $db->get('student_table');
        	$student_id = $row[0]['s_id'];
        	if ($db->count >= 1)
        	{
        		//allow to login
        		$_SESSION['student_logged_in'] = TRUE;
        		$_SESSION['student_id'] = $student_id;
        		header('Location:student/studentboard.php');
        		exit;
        	}else{
        		//redirect to main page with error
        		header('Location:index.php');
        		exit;
        	}
	    }

	    if (isset($_POST['teacher'])) {

	    	$username = filter_var($_POST['email']);
        	$password = filter_var($_POST['password']);

        	$db->where  ('email', $username);
        	$db->where ('password', $password);
        	$row = $db->get('teachers');
        	// var_dump($row[0]['t_id']); exit;
        	$teacher_id = $row[0]['t_id'];
        	
        	if ($db->count >= 1)
        	{
        		//allow to login
        		$_SESSION['teacher_logged_in'] = TRUE;
        		$_SESSION['teacher_id'] = $teacher_id;
    			header('Location:teacher/teacherboard.php');
        		exit;
        	}else{
        		//redirect to main page with error
        		header('Location:index.php');
        		exit;
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
			
		<!-- Author Meta -->
		<meta name="author" content="astha">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Eshikshyalaya</title>

			<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/main.css">
			<link rel="stylesheet" href="css/login/loginform.css">

			
	</head>


	<body>	

		<section class="banner-area relative">
			<div class="overlay overlay-bg"></div><!-- 	for dark overlay		 -->	
				<div class="container">
					<div class="row fullscreen align-items-center justify-content-between">
						<div class="col-lg-6 col-md-6 banner-left">
							<h1 class="text-white">Eshikshyalaya</h1>

								<p class="text-white" style="letter-spacing: 0.5px;">
									An online platform for Student Assignment Management System
								</p>

								<a href="aboutus.html" class="primary-btn text-uppercase">About Us</a>
						</div> <!-- end of title -->

						<div class="col-lg-5 col-md-6 banner-right">

							<ul class="nav nav-tabs" id="myTab" role="tablist">
								  <li class="nav-item">
								    <a class="nav-link active" id="student-tab" data-toggle="tab" href="#student" role="tab" aria-controls="student" aria-selected="true">Student</a>
								  </li>

								  <li class="nav-item">
								    <a class="nav-link" id="teacher-tab" data-toggle="tab" href="#teacher" role="tab" aria-controls="teacher" aria-selected="false">Teacher</a>
								  </li>
								 	
								</ul>


							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="student" role="tabpanel" aria-labelledby="student-tab">	
										<div class="register-photo">
											<div class="form-container">
												<form method="post" name="teacher_login">
													<div class="form-group">
														<input class="form-control" placeholder="email" name="email" type="email" required/>
													</div>	

													<div class="form-group">
														<input class="form-control" placeholder="password" name="password" type="password" required/>
													</div>

													<div class="form-group">
														<button class="btn btn-primary btn-block" type="submit" style="background-color: #f8b600; border: none;" name="student"> Login </button>
													</div>	

													<a class="forgot" href="#" > Forgot your password? </a>	
												</form>	
											</div>	
										</div>	
								</div>


								<div class="tab-pane fade" id="teacher" role="tabpanel" aria-labelledby="teacher-tab">
									<div class="register-photo">
											<div class="form-container">
												<form method="post">
													<div class="form-group">
														<input class="form-control" placeholder="email" name="email" type="email" required/>
													</div>	

													<div class="form-group">
														<input class="form-control" placeholder="password" name="password" type="password" required/>
													</div>

													<div class="form-group">
														<button class="btn btn-primary btn-block" type="submit" style="background-color: #f8b600; border: none;" name="teacher"> Login </button>
													</div>	

													<a class="forgot" href="#"> Forgot your password? </a>	
												</form>	
											</div>	
										</div>

								</div>	

							</div> <!-- end of student form and container -->			
											
						</div>
					</div> <!-- end of form panel -->


						</div>
				</div>  <!-- end of container -->
								
		</section>
			

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script src="js/main.js"></script>	


		</body>
	</html>