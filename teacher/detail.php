<?php
session_start();
require_once '../config/config.php';

$pagelimit = 10;

if (!$page) {
    $page = 1;
}

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
	$assignment_id = $_GET['id'];

	$db1 =  getDbInstance();
	$db1->where('id', $assignment_id);
	$row = $db1->get('teacher_assignments');

	$db =  getDbInstance();

	$select = array('id','assignment_id','student_id', 'name', 'email', 'message','file_name','created_at');
	$db->where('assignment_id', $assignment_id);
	//Set pagination limit
	$db->pageLimit = $pagelimit;

	//Get result of the query.
	$studentassignments = $db->arraybuilder()->paginate("student_assignments", $page, $select);
	$total_pages = $db->totalPages;

}

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
		<title>Student List</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			
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
				              <li><a href="../edit.php">Edit</a></li>
				              <li><a href="../logout.php">Logout</a></li>
				            </ul>
				          </li>	
				          			          					          		          
				          
				        </ul>
				      </nav><!-- #nav-menu-container -->					      		  
					</div>
				</div>
			</header><!-- #header -->
			
			  
	
		    
			<!-- Start price Area -->
			<section class="price-area section-gap">
				<div class="container">
		         					
					<div class="row">
						<div class="table1">
							<div class="single-price">
								<h1 style="text-align: center">Assignment Submission List</h1>
							<h3><b>Summary:</b></h3>
							<p><?php echo $row[0]['summary']; ?></p>

								 <table class="table table-striped table-bordered 	" style="margin-top: 1rem; ">


	

       <thead>
            <tr>
                <th class="header">Sn.</th>
                <th>Roll no</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>File</th>
                <th>Submitted At</th>
                <!-- <th>Actions</th> -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($studentassignments as $row) : ?>
                <tr>
	                <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['student_id'] ?></td>
	                <td><?php echo htmlspecialchars($row['name']); ?></td>
	                <td><?php echo htmlspecialchars($row['email']) ?></td>
	                <td><?php echo htmlspecialchars($row['message']) ?> </td>
	                <td><a href="../uploads/student_assignments/<?php echo $row['file_name']?>">Download</a></td>
	                <td><?php echo date('dS M', strtotime($row['created_at'])); ?></td>
	                <?php /* ?>
	                <td>
					<a href="edit_student.php?student_id=<?php echo $row['roll_no'] ?>&operation=edit" class="btn btn-primary" style="margin-right: 8px;"><span class="glyphicon glyphicon-edit"></span>

                    <a href="profile.php?student_id=<?php echo $row['roll_no'] ?>&operation=edit" class="btn btn-primary" style="margin-right: 8px;"><span class="glyphicon glyphicon-user"></span>

					<a href=""  class="btn btn-danger delete_btn" data-toggle="modal" data-target="#confirm-delete-<?php echo $row['roll_no'] ?>" style="margin-right: 8px;"><span class="glyphicon glyphicon-trash"></span></td>
					<?php */ ?>
				</tr>

  					</div>
            <?php endforeach; ?>      
        </tbody>
    </table>

							</div>
						</div>
					
															
					</div>
				</div>

				
			</section>
			<!-- End price Area -->


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