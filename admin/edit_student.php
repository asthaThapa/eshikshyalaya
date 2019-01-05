<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';

// print_r($_SERVER['REQUEST_METHOD']); exit;
// print_r($_GET); exit;

// Sanitize if you want
$student_id = filter_input(INPUT_GET, 'student_id', FILTER_VALIDATE_INT);
$operation = filter_input(INPUT_GET, 'operation',FILTER_SANITIZE_STRING); 
($operation == 'edit') ? $edit = true : $edit = false;
 $db = getDbInstance();


//Handle update request. As the form's action attribute is set to the same script, but 'POST' method, 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    //Get student id form query string parameter.
    $student_id = filter_input(INPUT_GET, 'student_id', FILTER_SANITIZE_STRING);

    //Get input data
    $data_to_update = filter_input_array(INPUT_POST);
    
    $data_to_update['updated_at'] = date('Y-m-d H:i:s');
    $db = getDbInstance();
    $db->where('roll_no',$student_id);
    $stat = $db->update('student_table', $data_to_update);

    if($stat)
    {
        $_SESSION['success'] = "Students updated successfully!";
        //Redirect to the listing page,
        header('location: students.php');
        //Important! Don't execute the rest put the exit/die. 
        exit();
    }
}

//If edit variable is set, we are performing the update operation.
if($edit)
{
    $db->where('roll_no', $student_id);
    //Get data to pre-populate the form.
    $student = $db->getOne("student_table");
}

?>


<?php
    include_once 'includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <h2 class="page-header">Update Students</h2>
    </div>
    <!-- Flash messages -->
    <?php
        include('./includes/flash_messages.php')
    ?>

    <form class="" action="" method="post" enctype="multipart/form-data" id="contact_form">
        
        <?php
            //Include the common form for add and edit  
            require_once('./forms/student_form.php'); 
        ?>
    </form>
</div>




<?php include_once 'includes/footer.php'; ?>