<?php include_once('lib/header.php'); require('functions/alert.php');  ?>



    <title> SNGH: Hospital of the Ignorant </title>
</head>

<body>
    <?php
        include_once('lib/menu.php');
    ?>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"> Welcome to Start.NG Hospital: Hospital of the Ignorant </h1>
        <p class="lead">This is a Specialist Hospital to cure ignorance<br />
        Come as you are. It is for all men/women; and completely free! </p>
    </div>

    
        <?php 
            if(isset($_SESSION['logged_in'])) { ?>
                <div class="error success">
                    <h3> <?php  echo $_SESSION['logged_in']; ?> </h3>
                </div>     
        <?php   } ?>
   
     
   
    
</body>

</html>