<?php

//print_r($_POST);

//Collect the data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$designation = $_POST['designation'];
$department = $_POST['department'];

//Validate the data
$error_array = [];

if($first_name == "") {
    $error_array = "first name cannot be blank";
print_r($error_array);
}


if($last_name == "") {
    $error_array = "Last name cannot be blank";
    print_r($error_array);
}

if($email == "") {
    $error_array = "Email cannot be blank";
    print_r($error_array);
}


if($password == "") {
    $error_array = "Password cannot be blank";
    print_r($error_array);
}


if($gender == "") {
    $error_array = "Gender cannot be blank";
    print_r($error_array);
}


if($designation == "") {
    $error_array = "Designation cannot be blank";
    print_r($error_array);
}


if($department == "") {
    $error_array = "Department cannot be blank";
    print_r($error_array);
}



?>