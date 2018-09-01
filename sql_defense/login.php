<?php
	session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);

	//connect to db
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "users";

	$con = new mysqli($host, $user, $pass,  $db);

    if($con -> connect_error)
	{
		die("Connection Failed: " .$con->connect_error);
	} 

	if(isset($_POST['login_btn']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$password = md5($password);
		
		$sql = "SELECT * FROM users WHERE username ='$username' AND password='$password'";
		$result = mysqli_query($con, $sql);

        $stmt = $con->prepare("INSERT INTO users(id, username, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $id, $username, $email, $password);
				

		$stmt->execute();
		$stmt->close();
		$con->close();
	
		if(mysqli_num_rows($result) == 1)
		{
			$_SESSION['message'] = "You are now logged in.";
			$_SESSION['username'] = $username;

			header("location: index.php");
		}

		else
		{
			$_SESSION['message'] = "Incorrect username/password.";
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Register!</title>
	</head>

	<body>
		<form method="POST" action="login.php">
			<table>
				<tr>
					<td>Username: </td>
					<td><input type = "text" name="username" class=textInput/></td>
				</tr>
					<td>Password: </td>
					<td><input type = "password" name="password" class=textInput/></td>
				</tr>
				<tr>
					<td></td>
					<td><input type = "submit" name="login_btn" class=Login/></td>
				</tr>
			</table>
		</form>
	</body>


</html>
