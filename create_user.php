<?php 
include_once('lib/header.php'); ?>

    <title>Super Admin SNGH: Hospital of the Ignorant</title>
</head>
<body>
    <div class="header">
        <h3> Create User </h3>
    </div>
    <div class="content">
        <strong> Kindly fill in the details: </strong> <br />
        <span style= 'color:red'>* required field</span> <br />
    </div>

    <form method="POST" action="processcreate.php">
        <?php
        //Check if error message is available and print it out
        if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
        echo "<span style = 'color:red'>" . $_SESSION['error'] . "</span>";
        }
        session_destroy();
        ?>
        <div class="input-group">
        <p>
            <label> First Name </label>
            <input 
                <?php
                //Check if First Name is available after error message (ie if initially inputed by user) and hold it in 
                if(isset($_SESSION['first_name'])){
                    echo "value=" . $_SESSION['first_name'];
                }
                ?>
            type="text" name="first_name" placeholder="First Name" /> 
            <span style= 'color:red'>*</span>
        </p>
        </div>
        <div class="input-group">
        <p>
            <label> Last Name </label>
            <input 
                <?php
                //Check if Last Name is available after error message (ie if initially inputed by user) and hold it in 
                if(isset($_SESSION['last_name'])){
                    echo "value=" . $_SESSION['last_name'];
                }
                ?>
            type="text" name="last_name" placeholder="Last Name" /> 
            <span style= 'color:red'>*</span>
        </p>
        </div>
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
            type="text" name="email" placeholder="Email" /> 
            <span style= 'color:red'>*</span>
        </p>
        </div>
        <div class="input-group">
        <p>
            <label> Password </label>
            <input type="password" name="password" placeholder="Password" />
            <span style= 'color:red'>*</span>
        </p>
        </div>
        <div class="input-group">
        <p>
            <label> Gender </label>
            <select name="gender">
                <option value=""> Select One </option>
                <option
                    <?php
                    //Check if Male is available after error message (ie if initially inputed by user) and hold it in 
                    if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Male'){
                        echo "selected";
                    }
                    ?>
                > Male </option>
                <option
                    <?php
                    //Check if Female is available after error message (ie if initially inputed by user) and hold it in 
                    if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female'){
                        echo "selected";
                    }
                    ?>
                > Female </option>
            </select>
            <span style= 'color:red'>*</span>
        </p>
        </div>
        <div class="input-group">
        <p>
            <label> Designation </label>
            <select name="designation" >
                <option value=""> Select One </option>
                <option
                    <?php
                    //Check if Medical Team is available after error message (ie if initially inputed by user) and hold it in 
                    if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Medical Team (MT)'){
                        echo "selected";
                    }
                    ?>
                > Medical Team (MT) </option>
                <option
                    <?php
                    //Check if Patient is available after error message (ie if initially inputed by user) and hold it in 
                    if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Patient'){
                        echo "selected";
                    }
                    ?>
                > Patient </option>
            </select>
            <span style= 'color:red'>*</span>
        </p>
        </div>
        <div class="input-group">
        <p>
            <label> Department </label>
            <input
                <?php
                //Check if Department is available after error message (ie if initially inputed by user) and hold it in 
                if(isset($_SESSION['department'])){
                    echo "value=" . $_SESSION['department'];
                }
                ?>
            type="text" name="department" placeholder="Department" />
            <span style= 'color:red'>*</span>
        </p>
        </div>
        <div class="input-group">
        <p>
            <button class="btn" type="submit"> Create </button>
        </p>
        
        </div>
        <!--save date and time registered-->
        <input 
            <?php
                $date_registered = date("l") . ", " . date("d-m-Y") . ".";
                echo "value='" . $date_registered . "'";
            ?>
        type="hidden" name="date" />
        <input 
            <?php
                $time_registered = date("h:ia");
                echo "value='" . $time_registered . "'";
            ?>
        type="hidden" name="time" />
    </form>
</body>

</html>