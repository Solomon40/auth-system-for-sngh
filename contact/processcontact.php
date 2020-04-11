<?php 
session_start();


$firstname = $_POST['first_name'];
$lastname = $_POST['last_name'] ;
$email = $_POST['email'];
$gender = $_POST['gender'];
$track = $_POST['track'];

$user_object = [
            'firstname'=>$firstname,
            'lastname'=>$lastname,
            'email'=>$email,
            'gender'=>$gender,
            'track'=>$track
];

file_put_contents($firstname . $lastname . ".json", json_encode($user_object));
        $_SESSION['message'] = "Response recieved, " . $firstname . "!";
        header("Location: index.php ");

?>