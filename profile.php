<?php
	session_start();
	if(isset($_SESSION['username']))
	{
		$uname = $_SESSION['username'];
	
	echo '<a href="includes/logout.php">
			<input class="logoutbutton" type="button" value="Logout">
		</a>';
	}
?>

<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>
    <p>
        <a href="includes/logout.php">Logout</a>
    </p>
</body>
</html>