<?php
	session_start();
?>

<html>
<head>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
<?php

	if(isset($_SESSION['message']))
	{
	  	echo "<hr>";
		echo $_SESSION['message'];
		echo "<hr>";
		unset($_SESSION['message']);
	}

?>
<a href = "login.php">Login</a>
<br>
<a href = "register.php">Register</a>
<br>
<a href = "logout.php">Logout</a>

</body>
</html>
