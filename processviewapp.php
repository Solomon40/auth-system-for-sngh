<?php 
session_start(); require('functions/get.php');


$department = $_POST['department'] ;


if($department == 'Blood Lab'){
    
    $_SESSION['department'] = $department;
    header("Location: view_app1.php");
}

if($department == 'X-ray Lab'){
    $_SESSION['department'] = $department;
    header("Location: view_app2.php");
}
?>