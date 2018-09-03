<?php
	session_start();
	error_reporting(E_ALL ^ E_DEPRECATED);

	//connect to db
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "mynet";

	$con = new mysqli($host, $user, $pass,  $db); 

	if($con -> connect_error)
	{
		die("Connection Failed: " .$con->connect_error);
	}
	else
	{
	  	if(isset($_POST['register_btn']))
	    {
            /*
            //The following is the PHP5 code: 
		    $username = mysql_real_escape_string($_POST['username']);
		    $email = mysql_real_escape_string($_POST['email']);
		    $password = mysql_real_escape_string($_POST['password']);
		    $password2 = mysql_real_escape_string($_POST['password2']);
	        
            */

		    $username = $_POST['username'];
		    $email = $_POST['email'];
		    $password = $_POST['password'];
		    $password2 = $_POST['password2'];
			
			
			if($password == $password2)
		    {
			    $password = md5($password);
	  	        

                $stmt = $con->prepare("INSERT INTO users(id, username, email, password) VALUES (?, ?, ?, ?)");
		        $stmt->bind_param("isss", $id, $username, $email, $password);
				

				$stmt->execute();
				$stmt->close();
				$con->close();
			}
		}
	}

	
	if(isset($_SESSION['message']))
	{
	  	echo "<hr>";
		echo $_SESSION['message'];
		echo "<hr>";
		unset($_SESSION['message']);
	}

	header("location: ../login.html");
?>
