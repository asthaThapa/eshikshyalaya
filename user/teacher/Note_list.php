<?php
session_start();
require_once '../config/config.php';
// require_once 'includes/auth_validate.php'; DONT FORGET TO ADD IN LATER



//Get Input data from query string
$search_string = filter_input(INPUT_GET, 'search_string');
$filter_col = filter_input(INPUT_GET, 'filter_col');
$order_by = filter_input(INPUT_GET, 'order_by');

//Get current page.
$page = filter_input(INPUT_GET, 'page');

//Per page limit for pagination.
$pagelimit = 10;

if (!$page) {
    $page = 1;
}

// If filter types are not selected we show latest created data first
if (!$filter_col) {
    $filter_col = "t_id";
}
if (!$order_by) {
    $order_by = "Asc";
}

//Get DB instance. i.e instance of MYSQLiDB Library
$db =  getDbInstance(); 
$select = array('t_id','fname', 'lname','subject', 'gender','created_at','updated_at');

//Start building query according to input parameters.
// If search string
if ($search_string) 
{
    $db->where('f_name', '%' . $search_string . '%', 'like');
    $db->orwhere('l_name', '%' . $search_string . '%', 'like');
}

//If order by option selected
if ($order_by)
{
    $db->orderBy($filter_col, $order_by);
}

//Set pagination limit
$db->pageLimit = $pagelimit;

//Get result of the query.
$teacher = $db->arraybuilder()->paginate("teachers", $page, $select);
$total_pages = $db->totalPages;

// get columns for order filter
foreach ($teacher as $value) {
    foreach ($value as $col_name => $col_value) {
        $filter_options[$col_name] = $col_name;
    }
    //execute only once
    break;
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
		<title>Note Note_list</title>

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
				              <li><a href="edit.php">Edit</a></li>
				              <li><a href="logout.php">Logout</a></li>
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
								<h1 style="text-align: center">Note List</h1>
				

								 <table class="table table-striped table-bordered 	" style="margin-top: 1rem; ">
        <thead>
            <tr>
                <th class="header">S.N</th>
                <th>Title</th>
                <th>Chapter No.</th>
                 <th>Chapter Name</th>
                <th>Deadline</th>
          
                <th>View Details</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($teacher as $row) : ?>
                <tr>
                    <td><?php echo $row['t_id'] ?></td>
                    <td><?php echo htmlspecialchars($row['fname']." ".$row['lname']); ?></td>
                    <td><?php echo htmlspecialchars($row['gender']) ?></td>
                    <td><?php echo htmlspecialchars($row['subject']) ?> </td>
                    <td><?php echo htmlspecialchars($row['subject']) ?> </td>
                    <td>
                    	<ul class="price-list">
               			<li class="align-items-center">
										
										<a href="#" class="price-btn" style="background-color:  #f8b600"> View </a>
									</li>	
						</ul>			
                </tr>

                        <!-- Delete Confirmation Modal-->
                     <div class="modal fade" id="confirm-delete-<?php echo $row['id'] ?>" role="dialog">
                        <div class="modal-dialog">
                          <form action="delete_teacher.php" method="POST">
                          <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Confirm</h4>
                                </div>
                                <div class="modal-body">
                              
                                        <input type="hidden" name="del_id" id = "del_id" value="<?php echo $row['t_id'] ?>">
                                    
                                  <p>Are you sure you want to delete this teacher?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default pull-left">Yes</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                </div>
                              </div>
                          </form>
                          
                        </div>
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