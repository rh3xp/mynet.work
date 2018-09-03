<?php
	session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);

	//connect to db
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "mynet";

	$con = mysqli_connect($host, $user, $pass,  $db); 


	if(isset($_POST['register_btn']))
	{
		$username = mysql_real_escape_string($_POST['username']);
		$email = mysql_real_escape_string($_POST['email']);
		$password = mysql_real_escape_string($_POST['password']);
		$password2 = mysql_real_escape_string($_POST['password2']);
	
		if($password == $password2)
		{
			$password = md5($password);
			
			$sql = "INSERT INTO $db(username, email, password) VALUES('$username', '$email', '$password')";
			mysqli_query($con, $sql);

			$_SESSION['message'] = "Hi $username. You are now logged in.";
			$_SESSION['username'] = $username;

			header("location: login.html");
		}

		else
		{
			echo "The 2 passwords do not match";
		}

	}

?>

<?php

	if(isset($_SESSION['message']))
	{
	  	echo "<hr>";
		echo $_SESSION['message'];
		echo "<hr>";
		unset($_SESSION['message']);
	}

?>
