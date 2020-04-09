<?php
session_start();

//To process forgotten password:
//(1) Collect email
//(2) Verify data: for non-empty fields, if email is in database
//(3) Proceed to send reset code, along with token
$error_count = 0;

$email = $_POST['email'] != "" ? $_POST['email'] : $error_count++;

if(0 < $error_count) {
    //redirect to Register page with error message
    
    $_SESSION['error'] = "Email cannot be blank";
    header("Location: forgot.php ");
} else{ //verify if email is in database
    $all_users = scandir("db/users/"); 
    $count_all_users = count($all_users);

    /* Commence token generation
    *
    */
    
    $token = ""; 
    $alphabets = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
    for($i = 0; $i < 30; $i++){
        //  get random number
        // get elements in alphabet at the index of random number
        // add that to token string
        $index = mt_rand(0, count($alphabets)-1);
        $token .= $alphabets[$index];
    }
    /* 
    *
    *Token generation ends here
    */

    for($counter = 0; $counter < $count_all_users; $counter++) {
        $current_user = $all_users[$counter];
    
        if($current_user == $email . ".json") {
        //send email and redirect to password reset page
        $subject = "Password Reset Link";
        $message = "A password reset has been initiated for your account on SNGH: Hospital of the Ignorant from this email address. Please ignore this message if you did not initiate the reset, otherwise visit localhost/sngh/reset.php";
        $headers = "From: no-reply@ymail.com" . "\r\n" .
        "Cc: me@ymail.com"; 

        //store $token in database
        file_put_contents("db/tokens/" . $email . ".json", json_encode(['token'=>$token]));

        //send mail
        $try = mail($email, $token, $subject, $message, $headers);

        if($try){
            //send success message
            $_SESSION['message'] = "A password reset link has been sent to your email " . $email;
            header("Location: reset.php ");
        } else{
            //send error message
            $_SESSION['error'] = "Something went wrong. Password reset link not sent";
            header("Location: forgot.php ");
        }

        die();
        }
        
    }
    $_SESSION['error'] = "Email " . $email . " does not exist";
    header("Location: forgot.php ");

}