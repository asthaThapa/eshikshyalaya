
<?php
	session_start();
	if (isset($_SESSION['teacher_logged_in']) && $_SESSION['teacher_logged_in'] === TRUE) 
	{
?>
<?php
	require_once '../config/config.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if(isset($_POST['assignment_submit']))
		{
			// var_dump($_POST); exit;
			$teacherId = $_SESSION['teacher_id'];
			$chapter_no = trim($_POST['chapter_no']);
			$chapter = trim($_POST['chapter']);
			$title = trim($_POST['title']);
			$summary = trim($_POST['summary']);

			// $data_to_store = filter_input_array(INPUT_POST);
			$data_to_store = array(
				'teacher_id' => $teacherId,
				'chapter_no' => $chapter_no, 
				'chapter' => $chapter, 
				'title' => $title,
				'summary' => $summary
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
					move_uploaded_file($file_tmp, "../uploads/assignments/".$file_name);
					$data_to_store['file_name'] = $file_name;
					$data_to_store['created_at'] = date('Y-m-d H:i:s');

					$db = getDbInstance();
					$last_id = $db->insert('teacher_assignments', $data_to_store);
					if($last_id)
					{
						$_SESSION['success'] = "Assignment created successfully!";
						header("Location:assign_list.php");
					}else{
						header("Location:create_assign.php");
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
				          <li><a href="teacherboard.php">Home</a></li>
				         	 <li class="menu-has-children"><a href="">Notes</a>
				            <ul>
				              <li><a href="create_note.php">Create new</a></li>
				              <li><a href="Note_list.php">View List</a></li>
				            </ul>
				          </li>					   
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
			  
						<div class="container" style="margin-top:50px; margin-bottom: 50px;">
													
							<div class="comment-form col-lg-12">
								<h3 style="margin-top:20px; margin-bottom: 50px;">Create a  new Assignment</h3>
								<form method="POST" enctype="multipart/form-data">
									<div class="form-group form-inline">
									  <div class="form-group col-lg-2 col-md-12 name">
									    <input type="text" class="form-control" id="chapter_no" name="chapter_no" placeholder="Chapter No." onfocus="this.placeholder = ''" onblur="this.placeholder = 'chapter_no'" required="">
									  </div>
									  <div class="form-group col-lg-4	 col-md-12 email">
									    <input type="text" class="form-control" id="chapter" name="chapter" placeholder="Chapter" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Chapter'" required="">
									  </div>	
									  <div class="form-group col-lg-6 col-md-12 email">
									    <input type="text" class="form-control" id="title" name="title" placeholder="Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Title'" required="">
									  </div>																			
									</div>
									<div class="form-group">
										<textarea class="form-control mb-10" rows="5" name="summary" placeholder="Summary of the assignment" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Summary of the assignment'" required=""></textarea>
									</div>

									<div class="input-group mb-3">
									  <div class="input-group-prepend">
									    <span class="input-group-text" id="inputGroupFileAddon01" style="background-color: #f8b600; border: none; color:white;">Upload</span>
									  </div>
									  <div class="custom-file">
									    <input type="file" class="custom-file-input" name="file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
									    <label class="custom-file-label" for="inputGroupFile01">Choose file </label>
									  </div>
									</div>

									<!-- <a href="#" class="primary-btn text-uppercase">Create</a>	 -->
									<button type="submit" class="primary-btn text-uppercase" name="assignment_submit">Create</button>
								</form>
							</div>


						</div>

			<footer class="py-5 bg-dark">
				      <div class="container">
				        <p class="col-lg-8 col-sm-12 footer-text m-0">
									<p style="text-align: center;">E-shikshyalaya@2018</p>
				      </div>
      <!-- /.container -->
   				 </footer><!-- End footer Area -->				

						
			
			<!-- start footer Area -->		
		
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
	} ?>