<?php
    session_start();

    $host = "localhost";
	$user = "root";
	$pass = "";
	$db = "forum";
	$con = mysqli_connect($host, $user, $pass, $db);

    if(isset($_POST['addpost-btn']))
    {
        $username = $_SESSION['username'];
        $content = mysqli_real_escape_string($con, $_POST['postContent']);        
        
        $query = "INSERT into posts(username, content) VALUES('$username', '$content')";
  	    $results = mysqli_query($con, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Successfully posted";
        header('location: ../feed.php');
    }
?>