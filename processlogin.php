<?php
session_start(); require('functions/alert.php');


//To complete Login:
//(1) Collect data
//(2) Verify data: for non-empty fields, for correct email and password, et c
//(3) Proceed to Dashboard 

$error_count = 0;

//Collect user inputs and attempt validation with ternary operator
$email = $_POST['email'] != "" ? $_POST['email'] : $error_count++;
$password = $_POST['password'] != "" ? $_POST['password'] : $error_count++;

//Validate the data
if(!filter_var($email, FILTER_VALIDATE_EMAIL))    {
    set_alert("error", "Invalid email format");
    header("Location: login.php ");
    
}
else{

if(0 < $error_count) { //if field is empty
    //redirect to Login page with error message
    $session_error = "You have " . $error_count . " empty field";
    if (1 < $error_count ) {
        $session_error .= "s";
    }
    set_alert("error", $session_error . " in your submission. Please review");
    header("Location: login.php ");

    //While redirected, hold email input after error message is printed 
    $_SESSION['email'] = $email;
}
else{ //Attempt validating if user (email) exists in database
    $all_users = scandir("db/users/"); //get all available users in database; returns an array
    $count_all_users = count($all_users); //get the total number of users in the array
    
    for($counter = 0; $counter < $count_all_users; $counter++) { //set $counter to check each user
        $current_user = $all_users[$counter]; //set $current_user as result of $counter check

        if($current_user == $email . ".json") {   
           //check user password 
            $user_string = file_get_contents("db/users/" . $current_user);  //get password from filesystem
            $user_object = json_decode($user_string); 
            $password_from_db = $user_object->password;
            
            $password_from_user = password_verify($password, $password_from_db);
            if($password_from_user == $password_from_db){
                //check role
                
                $role = $user_object->designation;
                if($role == 'Patient'){
                    $_SESSION['logged_in'] = "User ID: " . $user_object->id;
                    $_SESSION['full_name'] = " " . $user_object->first_name . " " . $user_object->last_name;
                    $_SESSION['email'] = $email;
                    $_SESSION['role'] = $role;
                    $_SESSION['dept'] = " " . $user_object->department;
                    $_SESSION['date'] = " " . $user_object->date;
                    $_SESSION['time'] = " " . $user_object->time;
                    header("Location: dashboardpatient.php");
                    die();
                }elseif($role == 'Medical Team (MT)') {
                    $_SESSION['logged_in'] = "User ID: " . $user_object->id;
                    $_SESSION['full_name'] = " " . $user_object->first_name . " " . $user_object->last_name;
                    $_SESSION['email'] = $email;
                    $_SESSION['role'] = $role;
                    $_SESSION['dept'] = " " . $user_object->department;
                    $_SESSION['date'] = " " . $user_object->date;
                    $_SESSION['time'] = " " . $user_object->time;
                    header("Location: dashboardmt.php");
                    die();
                }else{
                    //redirect to Medical Director (Super Admin) Dashboard and print ID
                    $_SESSION['logged_in'] = "User ID: " . $user_object->id;
                    $_SESSION['full_name'] = " " .$user_object->first_name . " " . $user_object->last_name;
                    $_SESSION['email'] = $email;
                    $_SESSION['role'] = $role;
                    $_SESSION['dept'] = " " . $user_object->department;
                    $_SESSION['date'] = " " . $user_object->date;
                    $_SESSION['time'] = " " . $user_object->time;
                    header("Location: dashboard.php");
                    die();
                }    
            }
        }

    }  

    set_alert("error", "Invalid email or Password");
    header("Location: login.php ");
}
}
?>