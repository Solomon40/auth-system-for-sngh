<?php
    include_once('lib/header.php');
?>

    <title> Reset Password for SNGH: Hospital for the Ignorant </title>

</head>

<body>
    <h3> Forgot Password </h3>

Hey there, kindly enter the email associated with your account:
    <form method="POST" action="processforgot.php">
        <?php
        //Check if error message is available and print it out
        if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
        echo "<span style = 'color:red'>" . $_SESSION['error'] . "</span>";
        }
        session_destroy();
        ?>
       
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
        <p>
            <button type="submit"> Send Reset Code </button>
        </p>

    </form>
    <?php
      //  include_once('lib/menu.php');
    ?>
</body>

</html>