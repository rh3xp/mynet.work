<?php
	session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);

	//connect to db
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "users";

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
			
			$sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
			mysqli_query($con, $sql);

			$_SESSION['message'] = "Hi $username. You are now logged in.";
			$_SESSION['username'] = $username;

			header("location: index.php");
		}

		else
		{
			echo "The 2 passwords do not match";
		}

	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Register!</title>
	</head>

<?php

	if(isset($_SESSION['message']))
	{
	  	echo "<hr>";
		echo $_SESSION['message'];
		echo "<hr>";
		unset($_SESSION['message']);
	}

?>

	<body>
		<form method="POST" action="register.php">
			<table>
				<tr>
					<td>Username: </td>
					<td><input type = "text" name="username" class=textInput/></td>
				</tr>
				<tr>
					<td>Email: </td>
					<td><input type = "email" name="email" class=textInput/></td>
				</tr>
				<tr>
					<td>Password: </td>
					<td><input type = "password" name="password" class=textInput/></td>
				</tr>
				<tr>
					<td>Confirm Password: </td>
					<td><input type = "password" name="password2" class=textInput/></td>
				</tr>
				<tr>
					<td></td>
					<td><input type = "submit" name="register_btn" class=Register/></td>
				</tr>
			</table>
		</form>
	</body>


</html>
