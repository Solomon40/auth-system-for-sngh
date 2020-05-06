<?php

//logged in status
function user_is_logged_in(){
    if(isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in'])){
        return true;    
    }
    return false;
    
}



function find_user($email=""){
    $all_users = scandir("db/users/"); //get all available users in database; returns an array
    $count_all_users = count($all_users); //get the total number of users in the array
    
    for($counter = 0; $counter < $count_all_users; $counter++) { //set $counter to check each user
        $current_user = $all_users[$counter]; //set $current_user as result of $counter check

        if($current_user == $email . ".json") {   
           //check user password 
            $user_string = file_get_contents("db/users/" . $current_user);  //get password from filesystem
            $user_object = json_decode($user_string);
            return $user_object;
        }
    }
    return false;
}

function get_details($type = "") {
    
    switch($type){
        case "logged_in":
            echo $_SESSION['logged_in'];
        break;
        case "full_name":
            echo $_SESSION['full_name'];
        break;
        case "email":
            echo $_SESSION['email'];
        break;
        case "role":
            echo $_SESSION['role'];
        break;
        case "dept":
            echo $_SESSION['dept']; 
        break;
        case "department":
            echo $_SESSION['department']; 
        break;

        default:
        echo $_SESSION['logged_in'];
    break;
    }

}

function get_staff(){

    $staff_rows = "";
    $staff_row_num = 0;
    
    $all_users = scandir('db/users/');
    $num = count($all_users);
    for ($i = 2; $i < $num; $i++) {
        
        $user = json_decode(file_get_contents('db/users/' . $all_users[$i]));
        
        if ($user->designation == "Medical Team (MT)") {
            $staff_row_num++;
            $staff_rows .= "
             <tr>
                <th scope='row'>$staff_row_num</th>
                <td>$user->first_name $user->last_name</td>
                 <td>$user->gender</td>
                <td>$user->designation</td>
                <td>$user->department</td>
                <td>$user->date</td>
            </tr>
            ";
        } 
    }
    if ($staff_rows == '') {
        return false;
    }
    return $staff_rows;
}

function get_patients(){
    $patient_rows = "";
    $patient_row_num = 0;

    $all_users = scandir('db/users/');
    $num = count($all_users);
    for ($i = 2; $i < $num; $i++) {
        
        $user = json_decode(file_get_contents('db/users/' . $all_users[$i]));
        if ($user->designation == "Patient") {
            $patient_row_num++;
            $patient_rows .= "
             <tr>
                <th scope='row'>$patient_row_num</th>
                <td>$user->first_name $user->last_name</td>
                  <td>$user->gender</td>
                <td>$user->designation</td>
                <td>$user->department</td>
                <td>$user->date</td>
            </tr>
            ";
        }
    }
    if ($patient_rows == '') {
        return false;
    }
    return $patient_rows;
}