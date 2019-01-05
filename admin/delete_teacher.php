<?php 
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';
$del_id = filter_input(INPUT_POST, 'del_id');
if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{

	if($_SESSION['admin_type']!='super'){
		$_SESSION['failure'] = "You don't have permission to perform this action";
    	header('location: students.php');
        exit;

	}
    $teacher_id = $del_id;

    $db = getDbInstance();
    $db->where('t_id', $teacher_id);
    $status = $db->delete('teachers');
    
    if ($status) 
    {
        $_SESSION['info'] = "Teachers deleted successfully!";
        header('location: teachers.php');
        exit;
    }
    else
    {
    	$_SESSION['failure'] = "Faliure to delete teacher!";
    	header('location: teacher.php');
        exit;

    }
    
}