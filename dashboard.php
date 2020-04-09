<?php 
include_once('lib/header.php'); 

//Must be Logged In to access Dashboard page
if(!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    $_SESSION['error'] = "You must be Logged In to view the Dashbboard!";
}
?>
    <title>Dashboard SNGH: Hospital of the Ignorant</title>
</head>

<body>
    <div class="header">
        <h3> Dashboard </h3>
    </div>

<p>Welcome back, <?php  echo $_SESSION['full_name']; ?> !</p>
<?php  echo $_SESSION['logged_in']; ?>
Department: <?php echo $_SESSION['dept']; ?> <br />
Logged In: <?php echo " " . date("h:ia") ?>  on <?php echo " " . date("l") . ", ". date("d-m-Y") . "."?>
Registered: <?php echo $_SESSION['time'] ?> on <?php echo " " .$_SESSION['date']; ?>

<h1> <?php  echo $_SESSION['role']; ?> (MD) </h1>


<?php include_once("lib/menu.php") ?>
</body>

</html>