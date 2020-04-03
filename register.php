<?php
    include_once('lib/header.php');
?>

    <title> Register to SNGH: Hospital for the Ignorant </title>

</head>

<body>

<strong> Hey there, kindly register below: </strong> <br />
(All fields are required)
    <form method="POST" action="processregister.php">

        <p>
        <label> First Name </label>
        <input type="text" name="first_name" placeholder="First Name" /> <br />
        </p>

        <p>
        <label> Last Name </label>
        <input type="text" name="last_name" placeholder="Last Name" /> <br />
        </p>
        
        <p>
        <label> Email </label>
        <input type="text" name="email" placeholder="Email" required/> <br />
        </p>

        <p>
        <label> Password </label>
        <input type="password" name="password" placeholder="Password" required/> <br />
        </p>

        <p>
        <label> Gender </label>
        <select name="gender" required>
            <option> Select One </option>
            <option> Male </option>
            <option> Female </option>
        </select>
        </p>

        <p>
        <label> Designation </label>
        <select name="designation" >
            <option> Select One </option>
            <option> Medical Team (MT) </option>
            <option> Patient </option>
        </select>
        </p>

        <p>
        <label> Department </label>
        <input type="text" name="department" placeholder="Department" required/>
        </p>

        <p>
            <button type="submit"> Proceed </button>
        </p>

    </form>

</body>

</html>