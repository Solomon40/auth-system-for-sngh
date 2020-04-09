<?php include_once('lib/header.php'); ?>
    <title> SNGH: Hospital of the Ignorant </title>
</head>

<body>
    <div class="header">
        <h2> Home Page </h2>
    </div>
    <div class="content">
        <?php 
            if(isset($_SESSION['logged_in'])) { ?>
                <div class="error success">
                    <h3> <?php  echo $_SESSION['logged_in']; ?> </h3>
                </div>     
        <?php   } ?>
<!-- Welcome Message -->
    
    Welcome to Start.NG Hospital: Hospital of the Ignorant <hr />
        <p>
        This is a Specialist Hospital to cure ignorance<br />
        Come as you are. It is for all men/women; and completely free! 
        </p>
   
     
    <?php
        include_once('lib/menu.php');
    ?>
    </div>
</body>

</html>