<?php
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

function gen_token(){

    $token = ""; 
    $alphabets = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
    for($i = 0; $i < 30; $i++){
        //  get random number
        // get elements in alphabet at the index of random number
        // add that to token string
        $index = mt_rand(0, count($alphabets)-1);
        $token .= $alphabets[$index];
    }

    return $token;
}
?>