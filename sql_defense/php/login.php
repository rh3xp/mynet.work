<?php
	session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);
	//require '/opt/lampp/htdocs/website/sql_defense/php/FlashMessages.php';


	//connect to db
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "mynet";

	$con = new mysqli($host, $user, $pass, $db); 

    if ($con->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
	
    if(isset($_POST['login_btn']))
	{
		$username = $_POST['username'];
		$password = md5($_POST['password']);

//		$password = md5($password);
		
        $stmt = $con->prepare("SELECT * FROM users WHERE username =? AND password=?");
	    $stmt->bind_param('ss', $username, $password);
		$stmt->execute();
        $stmt->bind_result($username, $password);
        $stmt->store_result();
	
		if($stmt->num_rows == 1)
		{
			$_SESSION['message'] = "You are now logged in.";
			$_SESSION['username'] = $username;

			header("location: profile.php");
		}

		else
		{
			$_SESSION['message'] = "Incorrect username/password.";
		}
	
		$stmt->free_result;
   		$stmt->close();
		$con->close();
	
	}    

	//$msg = new \Plasticbrain\FlashMessages\FlashMessages();
	 
	// Add a few messages
	//$msg->info('This is an info message');
	//$msg->success('This is a success message');
	//$msg->warning('This is a warning message');
	//$msg->error('This is an error message');

	// Display the messages
	 
	//$msg->display();
?>

<!DOCTYPE html>
<html>
	<body>
	<a href= "../login.html">Login</a>
	</body>
</html>
