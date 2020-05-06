<?php include_once('lib/header.php'); require('functions/alert.php'); require('functions/users.php'); require('functions/token.php');


?>

<title> Pay Bill | SNGH: Hospital of the Ignorant </title>
</head>
<body>
    <?php
        include_once('lib/menu.php');
    ?>
 
    <div class="header">
        <h3> Pay Bill </h3>
    </div>

<!-- Some instructions before form-->
    <div class="content">
        Pay for appointment <br />
    </div>

<!-- form begins here -->

    <form method="POST" action="processpaybill.php">
        <?php
            //Check if error/message is available and print it out
            error(); message();
            session_destroy();
        ?>


        <input
            <?php
            if(user_is_logged_in() || isset($_SESSION['full_name'])) { 
                echo "value='" . $_SESSION['full_name'] . "'" ;
            }
            ?>
         type="hidden" name="full_name"  />

        <div class="input-group">

        <p> 
            <label> Email </label>
            <input 
                <?php //Check for and display email
                if(isset($_SESSION['email']) && !empty($_SESSION['email']) ){
                    echo "value='" . $_SESSION['email'] . "'";
                }
                
                ?>
            type="text" name="email" placeholder="Email" /> <br />
        </p>
        </div>


        <div class="input-group">
        <p>
            <label> Select Department </label>
            <select name="department" >
                <option value=""> Select One </option>
                <option> Blood Lab </option>
                <option> X-ray Lab </option>
            </select>
        </p>
        </div>
        <div class="input-group">
        <p>
            <label> Enter Amount </label>
            <input 
                            <?php
                            //Check if Email is available after error message (ie if initially inputed by user) and hold it in 
                            if(isset($_SESSION['amount'])){
                                echo "value=" . $_SESSION['amount'];
                            }
                            ?>
                        type="number" name="amount" placeholder="&#8358;" /> <br />
        </p>
        </div>
        <button type="submit" class="btn btn-success" >Pay Now</button>
    </form>
     <!-- onClick="payWithRave()" -->


<?php  
    include_once('lib/footer.php');
?>

</body>

</html>