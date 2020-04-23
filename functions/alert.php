<?php

function message(){
    if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
        echo "<span style = 'color:green'>" . $_SESSION['message'] . "</span>";
    }
    
}

function error(){
    if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
        echo "<span style = 'color:red'>" . $_SESSION['error'] . "</span>";
    }
    
}

function set_alert($type = "", $content = ""){
    switch($type){
        case "message":
            $_SESSION['message'] = $content;
        break;
        case "error":
            $_SESSION['error'] = $content;
        break;
        case "info":
            $_SESSION['info'] = $content;
        break;
        default:
        $_SESSION['message'] = $content;
    break;
    }
}