<?php
    session_start();
    if(isset($_SESSION['username']))
    {
        $uname = $_SESSION['username'];
        echo "<br>";
        echo "<h1>Hi $uname</h1>";
        echo "You are now logged in.";
    }
?>