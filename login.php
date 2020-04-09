<?php
include_once('lib/header.php');

?>
    <title> Login to SNGH: Hospital of the Ignorant </title>
</head>

<body>
    <?php
        //Check if Success message is available and print it out
        if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
        echo "<span style = 'color:green'>" . $_SESSION['message'] . "</span>";
        }
        session_destroy();
    ?>
    <div class="header">
        <h2> Login </h2>
    </div>
    <div class="content">
    <p> Kindly login below  </p>
    </div>
    <?php
        include_once('lib/menu.php');
    ?>
    <form method="POST" action="processlogin.php">
        <?php
        //Check if error message is available and print it out
        if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
        echo "<span style = 'color:red'>" . $_SESSION['error'] . "</span>";
        }
        
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
            <button class="btn" type="submit"> Login </button>
        </p>

    </form>

</body>

</html>