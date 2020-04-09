<?php
    include_once('lib/header.php');
    //If token is not set, access to page should be restricted
    if(!isset($_GET['token']) && !isset($_SESSION['token'])){
        $_SESSION['error'] = "You are not authorized to view the reset page!";
        header("Location: login.php ");
    }
?>

    <title> Reset Password for SNGH: Hospital of the Ignorant </title>

</head>

<body>
    <h3> Reset Password </h3>

Hello, kindly enter a new password for your account:
    <form method="POST" action="processreset.php">
        <?php
        //Check if error message is available and print it out
        if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
        echo "<span style = 'color:red'>" . $_SESSION['error'] . "</span>";
        }
        session_destroy();
        ?>
        <input 
            <?php
            if(isset($_SESSION['token']) ){
            echo "value='" . $_SESSION['token'] . "'";
            }
            else{
                echo "value='" . $_GET['token'] . "'";
            }
            ?>
        type="hidden" name="token"  />
        <p>
            <label> Email </label>
            <input readonly value=[email] type="text" name="email" placeholder="Email" /> <br />
        </p>
        <p>
            <label> New Password </label>
            <input type="text" name="password" placeholder="Password" /> <br />
        </p>
        <p>
            <button type="submit"> Reset Password </button>
        </p>

    </form>
    <?php
      //  include_once('lib/menu.php');
    ?>
</body>

</html>