<?php 
    session_start();
    require_once 'config/config.php';
    if (isset($_SESSION['student_logged_in']) && $_SESSION['student_logged_in'] === TRUE) {
        $id = $_SESSION['student_id'];
        $dbclass = getDbInstance();
        $dbclass->where('s_id', $id);
        $row = $dbclass->get('student_table');
    }

    if (isset($_SESSION['teacher_logged_in']) && $_SESSION['teacher_logged_in'] === TRUE) {
        $id = $_SESSION['teacher_id'];
        $dbclass = getDbInstance();
        $dbclass->where('t_id', $id);
        $row = $dbclass->get('teachers');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // var_dump($_POST); exit;
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $db = getDbInstance();

         if (isset($_SESSION['student_logged_in']) && $_SESSION['student_logged_in'] === TRUE) {
            $studentId = $_SESSION['student_id'];
            $newpassword = array(
                                'password' => $password
                            );
            $db->where('s_id',$studentId);
            $db->update('student_table', $newpassword);
            $_SESSION['success'] = "password updated successfully!";
            header('location:student/studentboard.php');
            
            exit();
        }

        if (isset($_SESSION['teacher_logged_in']) && $_SESSION['teacher_logged_in'] === TRUE) {
            $teacherId = $_SESSION['teacher_id'];
            $newpassword = array(
                                'password' => $password
                            );
            $db->where('t_id',$teacherId);
            $db->update('teachers', $newpassword);
            $_SESSION['success'] = "password updated successfully!";
            header('location:teacher/teacherboard.php');
            
            exit();        }
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

    <header id="header">
                
                <div class="container main-menu">
                    <div class="row align-items-center justify-content-between d-flex">
                      <div id="logo">
                       
                      </div>
                      <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            <?php
                                if (isset($_SESSION['student_logged_in']) && $_SESSION['student_logged_in'] === TRUE) {
                                    $link = 'student/studentboard.php';
                                }else{
                                    $link = 'teacher/teacherboard.php';
                                }
                            ?>
                          <li><a href="<?php echo $link; ?>">Home</a></li>
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
              

<div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="student" role="tabpanel" aria-labelledby="student-tab">  
                                        <div class="register-photo" style="margin-left: 35%; margin-top: 10%;">
                                            <div class="form-container" style="width:50%;">
                                                <form method="post">
                                                    <div class="form-group">
                                                        <input class="form-control" value="<?php echo $row[0]['email']; ?>" name="email" type="email" readonly />
                                                    </div>  

                                                    <div class="form-group">
                                                        <input class="form-control" placeholder="password" name="password" type="password" required/>
                                                    </div>

                                                    <div class="form-group">
                                                        <button class="btn btn-primary btn-block" type="submit" style="background-color: #f8b600; border: none;" name="student"> Change </button>
                                                    </div>  

                                                    <?php if (isset($_SESSION['login_student_error'])){ ?>
                                                        <p><?php echo $_SESSION['login_student_error']; ?></p>
                                                    <?php } ?>

                                                </form> 
                                            </div>  
                                        </div>  
                                </div>

            <script src="js/vendor/jquery-2.2.4.min.js"></script>
            <script src="js/vendor/bootstrap.min.js"></script>          
            <script src="js/main.js"></script>  


        </body>
    </html>