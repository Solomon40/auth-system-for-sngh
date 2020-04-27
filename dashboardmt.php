<?php 
include_once('lib/header.php'); require('functions/alert.php'); require('functions/users.php');

//Must be Logged In to access Dashboard page
if(!user_is_logged_in()) {
    header("Location: login.php");
    set_alert("error", "You must be Logged In to view the Dashboard!");
}
?>
    <title>Dashboard | SNGH: Hospital of the Ignorant</title>
</head>

<body>
    <?php
        include_once('lib/menu.php');
    ?>
    <div class="header">
        <h3> Dashboard </h3>
    </div>
        
    <div class="content">
        <div class="error success">
            <h3> <?php  echo $_SESSION['logged_in']; ?> </h3>
        </div>
        <p>Welcome back, <?php  echo $_SESSION['full_name']; ?> !</p>
        <br />
        <div class="profile_info">

        Department: <?php echo $_SESSION['dept']; ?> <br />
        Logged In: <?php echo " " . date("h:ia") ?>  on <?php echo " " . date("l") . ", ". date("d-m-Y") . "."?> <br />
        Registered: <?php echo $_SESSION['time'] ?> on <?php echo " " . $_SESSION['date']; ?>
        </div> 

        <h1> <?php  echo $_SESSION['role']; ?> </h1>

    </div>
</body>

</html>