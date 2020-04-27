<?php
    include_once('lib/header.php'); require('functions/alert.php'); require('functions/users.php');
?>

    <title> Forgot Password | SNGH: Hospital for the Ignorant </title>

</head>

<body>
    <?php
        include_once('lib/menu.php');
    ?>
    <div class="header">
        <h3> Forgot Password </h3>
    </div>
    <div class="content">
    Hey there, kindly enter the email associated with your account:
    </div>
    <div class="menu">
        <a href="index.php"> Home </a> |
        <a href="Register.php"> Register </a> |
        <a href="Login.php"> Login </a>
    </div>
    <form method="POST" action="processforgot.php">
        <?php
            //Check if error/message is available and print it out
            error(); message();
            session_destroy(); 
        ?>
        <div class="input-group">   
            <p>
                <label> Email </label>
                <input 
                    <?php
                    //Check if Email is available after error message (ie if initially inputed by user) and hold it in 
                    if(isset($_SESSION['email'])){
                        echo "value=" . $_SESSION['email'];
                    }
                    ?>
                type="text" name="email" placeholder="Email" /> <br />
            </p>
        </div>
        <p>
            <button class="btn" type="submit"> Send Reset Code </button>
        </p>

        </form> 
        
    
</body>

</html>