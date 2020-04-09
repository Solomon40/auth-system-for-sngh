 
    <p>
        <a href="index.php"> Home </a> |
        
        <?php if(!isset($_SESSION['logged_in'])){ //if not logged in, show: ?>
        
        <a href="Login.php"> Login </a> |
        <a href="Register.php"> Register </a> |
        <a href="Forgot.php"> Forgot Password  </a>
        
        <?php } else{ ?> 
        
        <a href="Logout.php"> Logout </a>|
        <a href="reset.php"> Change Password  </a>

        <?php } ?>
    </p>  