<?php
session_start();

session_unset();
session_destroy();

header("Location: login.php"); 
set_alert("message", "You have just logged out!");
?>   