<?php 
session_start();

/*To complete Reset:
*(1) Collect data
*(2) Verify data: for non-empty fields
*(3) Check that email is registered in tokens folder
*(4) Check that content of registered token (in that folder)  is the same as $token (received)
*(5) Update user data (with new password) in database
*/ 
$error_count = 0;
//(1)
$token = $_POST['token'] != "" ? $_POST['token'] : $error_count++;
$email = $_POST['email'] != "" ? $_POST['email'] : $error_count++;
$password = $_POST['password'] != "" ? $_POST['password'] : $error_count++;

//(2)
if(0 < $error_count) {
    //redirect to Reset page with error message
    $session_error = "You have " . $error_count . " error";
    if (1 < $error_count ) {
        $session_error .= "s";
    }
    $_SESSION['error'] = $session_error . " in your submission. Please review";
    header("Location: reset.php ");
    
    $_SESSION['token'] = $token;
    $_SESSION['email'] = $email;
} 
else{//(3)
    $all_users_tokens = scandir("db/tokens/"); 
    $count_all_users_tokens = count($all_users_tokens);

    for($counter = 0; $counter < $count_all_users_tokens; $counter++) {
        $current_token_file = $all_users_tokens[$counter];
    
            if($current_token_file == $email . ".json") { //(4)
                $user_token = file_get_contents("db/tokens/" . $current_token_file); 
                $token_object = json_decode($user_token); 
                $token_from_db = $token_object->token;
                
                if($token_from_db = $token){ //(5)
                    $all_users = scandir("db/users/"); 
                    $count_all_users = count($all_users);
                    
                    for($counter = 0; $counter < $count_all_users; $counter++) { 
                        $current_user = $all_users[$counter];

                        if($current_user == $email . ".json") {   
                        
                            $user_string = file_get_contents("db/users/" . $current_user);  //get password from filesystem
                            $user_object = json_decode($user_string); 
                            $user_object->password = password_hash($password, PASSWORD_DEFAULT); //password updated
                            
                            unlink("db/users/" . $current_user); //user data deleted

                            file_put_contents("db/users/" . $email . ".json", json_encode($user_object)); //user data updated
                             //send success email
                            $subject = "Password Reset Successful";
                            $message = "Your account on SNGH: Hospital of the Ignorant has been updated. Your password was successfully changed. If you did not initiate the password change, please visit localhost/sngh/reset.php and reset your password immediately!";
                            $headers = "From: no-reply@ymail.com" . "\r\n" .
                            "Cc: me@ymail.com"; 

                            $try = mail($email, $subject, $message, $headers); 

                            if($try){
                                //send success message
                                $_SESSION['message'] = "Password reset successful. You can now login";
                                header("Location: login.php ");
                            } else{
                                //send error message
                                $_SESSION['error'] = "Something went wrong. Password reset link not sent";
                                header("Location: reset.php ");
                            }
                            die();
                        }
                    }    
                    
                }
            }
    }
    $_SESSION['error'] = "Password reset failed. Token or email is expired or invalid";
    header("Location: login.php ");    
}
?>