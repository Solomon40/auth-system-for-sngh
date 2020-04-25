<?php
include_once('lib/header.php'); require('functions/alert.php'); require('functions/users.php'); require('functions/appointments.php');

?>
</head>
<body>

<section>
    <div id="table">
    <?php
    
    
    $rows = get_appointments($_SESSION['department']);
    
   
    if ($rows) {
        
        ?>
            <table class="table table-bordered">
                <caption>
                    <?php echo get_details("department"); ?> Department Appointments</caption>
                    
                <thead class="thead-dark ">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Nature of Apointment</th>
                        <th scope="col">Appointment Date</th>
                        <th scope="col">Appointment Time</th>
                        <th scope="col">Department</th>
                        <th scope="col">Initial Complaint</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $rows; ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>You have no pending appointments</p>
        <?php } ?>

    </div>
</section>
    
</body>
</html>