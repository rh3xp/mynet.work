<?php
	session_start();
	session_destroy();
	unset($_SESSION['username']);
	$_SESSION['message'] = "You are now logged out.";
	header("location: ../index.php");
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

hi undollared sessioned user, <?php echo $_SESSION['username']; ?>.
<br>
<a href = "logout.php">Logout</a>

</body>
</html>
