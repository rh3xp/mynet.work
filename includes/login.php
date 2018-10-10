<?php
    session_start();
    $host = "localhost";
	$user = "root";
	$pass = "";
	$db = "forum";
	$con = mysqli_connect($host, $user, $pass, $db); 

    if(isset($_POST['login-btn']))
    {
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password_1 = mysqli_real_escape_string($con, $_POST['password_1']);
    
        $password = md5($password_1);//encrypt the password before saving in the database
  
        $query = "SELECT * FROM users WHERE username='$username' AND passwd='$password'";
  	    $results = mysqli_query($con, $query);
        if (mysqli_num_rows($results) == 1)
        {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: ../profile.php');
        }
    }
?>