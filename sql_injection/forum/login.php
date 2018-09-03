<?php
	session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);

	//connect to db
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "mynet";

	$con = mysqli_connect($host, $user, $pass, $db); 


	if(isset($_POST['login_btn']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$password = md5($password);
		
		$sql = "SELECT * FROM $db WHERE username ='$username' AND password='$password'";
		$result = mysqli_query($con, $sql);
	
		if(mysqli_num_rows($result) == 1)
		{
			$_SESSION['message'] = "You are now logged in.";
			$_SESSION['username'] = $username;

			header("location: profile.php");
		}

		else
		{
			$_SESSION['message'] = "Incorrect username/password.";
		}
	}

?>

<!DOCTYPE html>
<html>
<body>
<a href=login.html>Login</a>
</body>
</html>

