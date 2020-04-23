<?php
session_start(); require('functions/alert.php');

//To complete Registration:
//(1) Collect data
//(2) Validate data: for non-empty fields, for non-numeric name and correct email address, et c
//(3) Store in database with unique ID

$error_count = 0;

//Collect the data (through the POST method) and attempt validation with ternary operator
$first_name = $_POST['first_name'] != "" ? $_POST['first_name'] : $error_count++;
$last_name = $_POST['last_name'] != "" ? $_POST['last_name'] : $error_count++;
$email = $_POST['email'] != "" ? $_POST['email'] : $error_count++;
$password = $_POST['password'] != "" ? $_POST['password'] : $error_count++;
$gender = $_POST['gender'] != "" ? $_POST['gender'] : $error_count++;
$designation = $_POST['designation'] != "" ? $_POST['designation'] : $error_count++;
$department = $_POST['department'] != "" ? $_POST['department'] : $error_count++;
$date = $_POST['date'];
$time = $_POST['time'];


//Validate the data

$correct_first_name = is_numeric($first_name);
$correct_last_name = is_numeric($last_name);
strlen($first_name);
strlen($last_name);

if($correct_first_name == 1 || $correct_last_name == 1){
    set_alert("error", "Name can not contain numbers. Please review");
    header("Location: register.php ");
}   
elseif(strlen($first_name) < 2 || strlen($last_name) < 2){
    set_alert("error", "Name can not be less than two characters. Please review");
    header("Location: register.php ");
}  
else{

    if(!filter_var($email, FILTER_VALIDATE_EMAIL))    {
        set_alert("error", "Invalid email format");
        header("Location: register.php ");
    }
    else{

        if(0 < $error_count) {
            //redirect to Register page with error message
            $session_error = "You have " . $error_count . " empty field";
            if (1 < $error_count ) {
                $session_error .= "s";
            }
            set_alert("error", $session_error . " in your submission. Please review");
            header("Location: register.php ");

            //While redirected, hold data inputs after error message is printed 
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;
            $_SESSION['email'] = $email;
            $_SESSION['gender'] = $gender;
            $_SESSION['designation'] = $designation;
            $_SESSION['department'] = $department;
        }
        else{ //proceed to database
        
        //Attempt generating unique ID for each user
        $all_users = scandir("db/users/"); //first collate total users in the database
        $count_all_users = count($all_users); //then count total number of users

        //Prepare objects to be saved in database
        $new_user_id = ($count_all_users-1); //Generate unique ID

        $user_object = [
            'id'=>$new_user_id,
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'email'=>$email,
            'password'=>password_hash($password, PASSWORD_DEFAULT), //encrypt password
            'gender'=>$gender,
            'designation'=>$designation,
            'department'=>$department,
            'date'=>$date,
            'time'=>$time
        ];

        //Check if user (email) already exists before saving in database
        for($counter = 0; $counter < $count_all_users; $counter++) {
            $current_user = $all_users[$counter];

            if($current_user == $email . ".json") {
                set_alert("error", "Your registration failed. User already registered");
                header("Location: register.php ");
                die();
            }
        }


        //Save data in database and redirect to Login page with Success message
        file_put_contents("db/users/" . $email . ".json", json_encode($user_object));
        set_alert("message", "You are successfully registered, " . $first_name . "!");
        header("Location: login.php ");

        }
    }
}
?>