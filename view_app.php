<?php
include_once('lib/header.php'); require('functions/alert.php'); require('functions/users.php'); require('functions/appointments.php');
if(!user_is_logged_in() || $_SESSION['role'] !== "Medical Team (MT)") {
    header("Location: login.php");
    set_alert("error", "You must be Logged In to view appointments!");
}
?>
</head>
<body>
    <?php
        include_once('lib/menu.php');
    ?>
    <form method="POST" action="processviewapp.php">
    <div class="input-group">
        <p>
            <label> Select Department </label>
            <select name="department" >
                <option value=""> Select One </option>
                <option> Blood Lab </option>
                <option> X-ray Lab </option>
            </select>
            <span style= 'color:red'>*</span>
        </p>
        </div>
        <div class="input-group">
        <p>
            <button class="btn btn-success" type="submit"> Proceed </button>
        </p>
        </div>
    </form>

<?php  
    include_once('lib/footer.php');
?>
</body>
</html>