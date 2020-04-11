<?php session_start();  ?>
<!DOCTYPE html>

<html>
<head>
    <title> Contact Form </title>
</head>
<body>
<h3>Apply for Start.NG 2025:</h3>
<form method="POST" action="processcontact.php">
        <?php
        //Check if message is available and print it out
        if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
        echo "<span style = 'color:green'>" . $_SESSION['message'] . "</span>";
        }
        session_destroy();
        ?>
        
        <p>
            <label> First Name </label>
            <input type="text" name="first_name" placeholder="First Name" /> 
        </p>
        <p>
            <label> Last Name </label>
            <input type="text" name="last_name" placeholder="Last Name" /> 
        </p>


        <p>
            <label> Email </label>
            <input type="text" name="email" placeholder="Email" /> 
        </p>

        

        <p>
            <label> Gender </label>
            <select name="gender">
                <option value=""> Select One </option>
                <option> Male </option>
                <option> Female </option>
            </select>
        </p>

        
        <p>
            <label> Track </label>
            <select name="track" >
                <option value=""> Select One </option>
                <option> Front-end </option>
                <option> Back-end </option>
                <option> Mobile development </option>
                <option> Dev-Ops </option>
                <option> Design </option>
            </select>
        </p>
        
        
        <p>
            <button type="submit"> Submit </button>
        </p>
       
    </form>
</body>
</html>