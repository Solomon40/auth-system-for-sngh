<?php include_once('lib/header.php'); require('functions/alert.php'); ?>
    <title> Book Appointment | SNGH: Hospital of the Ignorant </title>
</head>
<body>
 
    <h2> Book Appointment </h2>
    Please fill in details of booking below

    <form method="POST" action="processappointment.php">
        <?php
        //Check if error/message is available and print it out
        error(); message();
        session_destroy();
        ?>
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
            type="text" name="date" placeholder="Date" /> 
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
            type="text" name="time" placeholder="Time" /> 
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
                    echo "value=" . $_SESSION['nature'];
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
            <input 
                <?php
                //Check if Email is available after error message (ie if initially inputed by user) and hold it in 
                if(isset($_SESSION['department'])){
                    echo "value=" . $_SESSION['department'];
                }
                ?>
            type="text" name=" department" placeholder="Department" /> 
            <span style= 'color:red'>*</span>
        </p>
        </div>
        <p>
            <button class="btn" type="submit"> Submit </button>
        </p>
    </form>
</body>
</html>