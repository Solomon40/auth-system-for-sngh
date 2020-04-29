<?php
include_once('lib/header.php'); require('functions/alert.php');

?>
    <title> Login | SNGH: Hospital of the Ignorant </title>
</head>

<body>
    
    <?php
        include_once('lib/menu.php');
    ?>
    <div class="container">
    <div class="row no-gutters">
        <div class="col">
            <img src="img/Screenshot (160).png" />
        </div>
        <div class="col-lg">
                <div class="header">
                    <h2> Login </h2>
                </div>
                <div class="content">
                    <?php
                        //Check if Success message is available and print it out
                        message();
                        session_destroy();
                    ?>
                    <p> Kindly login below  </p>
                </div>
            
                <form method="POST" action="processlogin.php">
                    <?php
                    //Check if error message is available and print it out
                    error();
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
                    <div class="input-group">
                    <p>
                        <label> Password </label>
                        <input type="password" name="password" placeholder="Password" /> <br />
                    </p>
                    </div>
                    <p>
                        <button class="btn btn-success" type="submit"> Login </button>
                    </p>
                    <p>
                        New member? <a href ="register.php"> Sign Up </a>
                    </p>
                    <p>
                        <a href ="forgot.php"> Forgot Password </a>
                    </p>

                </form>
        </div>   
    </div>
    </div>
<?php
    include_once('lib/footer.php');
?>

</body>

</html>