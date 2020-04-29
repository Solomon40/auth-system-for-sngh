<?php
    include_once('lib/header.php'); 
    require('functions/alert.php');
    require('functions/users.php');
    //If token is not set, access to page should be restricted
    if(!user_is_logged_in() && !token_is_set()){
        $_SESSION['error'] = "You are not authorized to view the reset page!";
        header("Location: login.php ");
    }
?>

    <title> Reset Password | SNGH: Hospital of the Ignorant </title>

</head>

<body>
    <?php
        include_once('lib/menu.php');
    ?>
    <div class="header">
        <h2> Reset Password </h2>
    </div>
    <div class="content">
    Kindly enter a new password for your account:
    </div>
    <form method="POST" action="processreset.php">
        <?php
        //Check if error/message is available and print it out
        error(); message();
        session_destroy();
        ?>
        <?php  if(!user_is_logged_in()) { ?>
        <input
            <?php 
                //Check for token associated with email
                if(token_set_in_sess() ){
                    echo "value='" . $_SESSION['token'] . "'";
                }
                else{
                    echo "value='" . $_GET['token'] . "'";
                }
            ?>
        type="hidden" name="token"  />
        <?php } ?>
        <div class="input-group">

        <p> 
            <label> Email </label>
            <input 
                <?php //Check for and display email
                if(isset($_SESSION['email']) ){
                    echo "value='" . $_SESSION['email'] . "'";
                }
                else{
                    echo "value='" . $_GET['key'] . "'";
                }
                ?>
            readonly type="text" name="email" placeholder="Email" /> <br />
        </p>
        </div>
        <div class="input-group">

        <p>
            <label> New Password </label>
            <input type="password" name="password" placeholder="Enter New Password" /> <br />
        </p>
        </div>
        <div class="input-group">

        <p>
            <label> Confirm Password </label>
            <input type="password" name="conf_password" placeholder="Confirm New Password" /> <br />
        </p>
        </div>
        <p>
            <button class="btn btn-success" type="submit"> Reset Password </button>
        </p>

    </form>
<?php  
    include_once('lib/footer.php');
?>
</body>

</html>