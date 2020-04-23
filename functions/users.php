<?php

//logged in status
function user_is_logged_in(){
    if(isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in'])){
        return true;    
    }
    return false;
    
}

//token
function token_is_set(){
    return token_set_in_sess() || token_set_in_get();
}

function token_set_in_sess(){
    return isset($_SESSION['token']);
}

function token_set_in_get(){
    return isset($_GET['token']);
}