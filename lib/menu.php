 


<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal"><a href="index.php">StartNG Hospital</a></h5>
    <nav class="my-2 my-md-0 mr-md-3">

        <?php if(!isset($_SESSION['logged_in']) && empty($_SESSION['logged_in'])){ //if not logged in, show: ?>
        <a class="p-2 text-dark" href="#">About</a>
        <a class="p-2 text-dark" href="#">FAQs</a>
        <a class="p-2 text-dark" href="#">Legal</a>
        <a class="p-2 text-dark" href="#">Contact</a>

        
        <?php } else if(isset($_SESSION['role']) ||  $_SESSION['role'] ==  'Medical Team (MT)') {?>
        <a class="p-2 text-dark" href="forgot.php">Change Password</a>
        <a class="p-2 text-dark" href="view_app.php"> View Appointments </a>
        <a class="p-2 text-dark" href="#">Legal</a>
        <a class="p-2 text-dark" href="Logout.php"> Logout </a>
        <?php } else if(isset($_SESSION['role']) ||  $_SESSION['role'] ==  'Patient'){?>
        <a class="p-2 text-dark" href="reset.php">Change Password</a>
        <a class="p-2 text-dark" href="pay_bill.php"> Pay Bill </a>
        <a class="p-2 text-dark" href="book_app.php"> Book Appointment</a>
        <a class="p-2 text-dark" href="Logout.php"> Logout </a>
        <?php } else {?>
        <a class="p-2 text-dark" href="reset.php">Change Password</a>
        <a class="p-2 text-dark" href="create_user.php"> Add User  </a>
        <a class="p-2 text-dark" href="#">Legal</a>
        <a class="p-2 text-dark" href="Logout.php"> Logout </a>
        <?php }?>
    </nav>
</div>