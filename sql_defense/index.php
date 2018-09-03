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

<?php
    if(isset($_SESSION['username']))
    {
        $uname = $_SESSION['username'];
        echo "<br>";
        echo "<h1>Hi $uname</h1>";
        echo "You are now logged in.";

    }

    else
    {
        echo "You are not logged in. Please do.";
    }
?>

<br>
<a href = "login.html">Login</a>
<br>
<a href = "register.html">Register</a>

</body>
</html>
