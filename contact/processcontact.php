<?php 


$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'] ;
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

file_put_contents("contact/" . $firstname . $lastname . ".json", json_encode($user_object));
        $_SESSION['message'] = "Response recieved, " . $firstname . "!";
        header("Location: index.php ");

?>