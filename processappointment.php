<?php

require_once('./functions/alert.php'); require_once('./functions/users.php');
session_start();



$error_count = 0;

$date = $_POST['date'] != "" ? $_POST['date']  : $error_count++;
$full_name = $_POST['full_name'] != "" ? $_POST['full_name']  : $error_count++;


$time = $_POST['time'] != "" ? $_POST['time']  : $error_count++;
$nature = $_POST['nature'] != "" ? $_POST['nature']  : $error_count++;

$complaint = $_POST['complaint'] != "" ? $_POST['complaint']  : $error_count++;

$department = $_POST['department'] != "" ? $_POST['department']  : $error_count++;


$_SESSION['date'] = $date;
$_SESSION['time'] = $time;
$_SESSION['nature'] = $nature;
$_SESSION['complaint'] = $complaint;
$_SESSION['department'] = $department;
$_SESSION['full_name'] = $full_name;




if(0 < $error_count) {
    //redirect to Register page with error message
    $session_error = "You have " . $error_count . " empty field";
    if (1 < $error_count ) {
        $session_error .= "s";
    }
    set_alert("error", $session_error . " in your submission. Please review");
    header("Location: book_app.php ");
}

 else {

    $time_to_string = strtotime($time);
    $formatted_time = date('h:i:sa', $time_to_string);
    $all_appointment = scandir('db/appointments/');
    //save appointment with unique id 
    $num_of_appointments = count($all_appointment);
    $Id = ($num_of_appointments - 1);

    $appoint_object = [
        'id' => $Id,
        'nature' => $nature,
        'time' => $formatted_time,
        'date' => $date,
        'department' => $department,
        'complaint' => $complaint,
        "patient_name" =>$full_name
    ];
    // print_r($apointObject);
    // die();


    file_put_contents("db/appointments/" . $Id . ".json", json_encode($appoint_object));

    
    set_alert('message', "You have successfully booked an apointment to the " . $department . " department");
    
        header("location: dashboardpatient.php");
    
}