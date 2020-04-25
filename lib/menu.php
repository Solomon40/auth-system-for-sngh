 
<?php require('functions/users.php'); ?>

<!-- <p>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5><a href="index.php" class="my-0 mr-md-auto font-weight-normal"> StartNG Hospital </a></h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <?php if(!user_is_logged_in()){ //if not logged in, show: ?>

                <a class="p-2 text-dark" href="#">Login</a>
                <a class="p-2 text-dark" href="#">Forgot Password</a>
                <a class="btn btn-outline-primary" href="#">Register</a>
            
            <?php } else{ ?>
                <a class="p-2 text-dark" href="#">Logout</a>
                <a class="p-2 text-dark" href="#">Change Password</a>
        </nav>
        
        <?php } ?>
    </div>
    
</p>   -->

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">StartNG Hospital</h5>
    <nav class="my-2 my-md-0 mr-md-3">

        <?php if(!user_is_logged_in()){ //if not logged in, show: ?>
        <a class="p-2 text-dark" href="#">Features</a>
        <a class="p-2 text-dark" href="#">Enterprise</a>
        
        <?php } else{ ?>
        <a class="p-2 text-dark" href="#">Support</a>
        <a class="p-2 text-dark" href="#">Pricing</a>
        <?php } ?>
    </nav>
    <a class="btn btn-outline-primary" href="#">Sign up</a>
</div>