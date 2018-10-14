<?php
 
    // if(isset($_POST['logout']))
    // {
    //     session_start();
    //     session_unset();
    //     session_destroy();
    //     header("location: ../index.php");
    // }

    session_start();
    // Destroying All Sessions
    if(session_destroy())
    {
    // Redirecting To Home Page
    header("Location: ../index.php");
    }
?>