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
 <div class="container">
    <section>
        <div id="table">
            <?php
            $patient_rows = get_patients();
            $staff_rows = get_staff();
            ?>
            <table class="table table-bordered">
                <caption> All Staff </caption>
                <thead class="thead-dark ">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Department</th>
                        <th scope="col">Date of Registration</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $staff_rows; ?>
                </tbody>
            </table>

            <table class="table table-bordered">
                <caption> All Patients </caption>
                <thead class="thead-dark ">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Department</th>
                        <th scope="col">Date of Registration</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $patient_rows; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>
<?php  
    include_once('lib/footer.php');
?>

</body>

</html>