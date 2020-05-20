<?php
include_once('lib/header.php'); require('functions/alert.php'); require('functions/token.php');


//To process forgotten password:
//(1) Collect email
//(2) Verify data: for non-empty fields, if email is in database
//(3) Proceed to send reset code, along with token
$error_count = 0;

$email = $_POST['email'] != "" ? $_POST['email'] : $error_count++;

if(0 < $error_count) {
    //redirect to Register page with error message
    
    set_alert("error", "Email cannot be blank");
    header("Location: forgot.php ");
} else{ //verify if email is in database
    $all_users = scandir("db/users/"); 
    $count_all_users = count($all_users);


    for($counter = 0; $counter < $count_all_users; $counter++) {
        $current_user = $all_users[$counter];
    
        if($current_user == $email . ".json") {
        //send email and redirect to password reset page
        $link = "<a href='localhost/sngh/reset.php?token=" . gen_token() . "&key=" .$email . "> Reset Link </a>"; 

        $subject = "Password Reset Link";
        $message = "A password reset has been initiated for your account on SNGH: Hospital of the Ignorant from this email address. Please ignore this message if you did not initiate the reset, otherwise visit " . $link . "to reset your password." ;
        $headers = "From: no-reply@ymail.com" . "\r\n" .
        "Cc: me@ymail.com"; 

        //store $token in database
        file_put_contents("db/tokens/" . $email . ".json", json_encode(['token'=>gen_token()]));
        

        //send mail
        $try = mail($email,$subject,$message,$headers);
       

        if($try){
            //display success message
            set_alert("message", "A password reset link has been sent to your email " . $email);
            header("Location: login.php ");
        } else{
            //display error message
            set_alert("error", "Something went wrong. Password reset link not sent");
            header("Location: forgot.php ");
        }

        die();
        }
        
    }
    set_alert("error", "Email " . $email . " is not registered");
    header("Location: forgot.php ");

}