<?php  

    /* Start New Session */
    session_start();
    $_SESSION['username'] = "";
    
    /* Require Project AutoLoader */ 
    require_once('../app/autoLoader.php');
    ?>