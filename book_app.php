<?php include_once('lib/header.php'); require('functions/alert.php'); require('functions/users.php');  ?>
    <title> Book Appointment | SNGH: Hospital of the Ignorant </title>
</head>
<body>
    <?php
        include_once('lib/menu.php');
    ?>
 
    <div class="header">
        <h2> Book Appointment </h2>
    </div>
    <div class="content">
    Please fill in details of booking below
    </div>
    <form method="POST" action="processappointment.php">
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
            <label> Date of Appointment </label>
            <input 
                <?php
                //Check if Date of Appointment is available after error message (ie if initially inputed by user) and hold it in 
                if(isset($_SESSION['date'])){
                    echo "value=" . $_SESSION['date'];
                }
                ?>
            type="date" name="date" placeholder="Date" /> 
            <span style= 'color:red'>*</span>
        </p>
        </div>
        <div class="input-group">
        <p>
            <label> Time of Appointment </label>
            <input 
                <?php
                //Check if Last Name is available after error message (ie if initially inputed by user) and hold it in 
                if(isset($_SESSION['time'])){
                    echo "value=" . $_SESSION['time'];
                }
                ?>
            type="time" name="time" placeholder="Time" /> 
            <span style= 'color:red'>*</span>
        </p>
        </div>
        <div class="input-group">
        <p>
            <label> Nature of Appointment </label>
            <input 
                <?php
                //Check if Email is available after error message (ie if initially inputed by user) and hold it in 
                if(isset($_SESSION['nature'])){
                    echo "value='" . $_SESSION['nature'] . "'";
                }
                ?>
            type="text" name="nature" placeholder="Nature" /> 
            <span style= 'color:red'>*</span>
        </p>
        </div>
        <div class="input-group">
        <p>
            <label> Initial Complaint </label> <br/>
            <textarea name="complaint" placeholder="Please comment your complains..."></textarea>
            <span style= 'color:red'>*</span>
        </p>
        </div>
        
        <div class="input-group">
        <p>
            <label> Department of Appointment </label>
            <select name="department" >
                <option value=""> Select One </option>
                <option
                    <?php
                    //Check if Blood Lab is available after error message (ie if initially inputed by user) and hold it in 
                    if(isset($_SESSION['department']) && $_SESSION['department'] == 'Blood Lab)'){
                        echo "selected";
                    }
                    ?>
                > Blood Lab </option>
                <option
                    <?php
                    //Check if Patient is available after error message (ie if initially inputed by user) and hold it in 
                    if(isset($_SESSION['department']) && $_SESSION['department'] == 'X-ray Lab'){
                        echo "selected";
                    }
                    ?>
                > X-ray Lab </option>
            </select>
            <span style= 'color:red'>*</span>
        </p>
        </div>
        
        <p>
            <button class="btn btn-success" type="submit"> Submit </button>
        </p>
    </form>

<?php
    include_once('lib/footer.php');
?>
</body>
</html>