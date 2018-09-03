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
		//unset($_SESSION['message']);
	}

?>

<?php
    if(isset($_SESSION['username']))
    {
        $uname = $_SESSION['username'];
        echo "<br>";
        echo "<h1>Hi $uname</h1>";
        echo "You are now logged in.";

    }
?>

<br>
<a href = "php/logout.php">Logout</a>
<h3>Wanna join the forum chat?</h3>
<a href="forum/forum.html"><h4>Click here to join.</h4></a>
</body>
</html>
