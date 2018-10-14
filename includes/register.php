<?php
    $host = "localhost";
	$user = "root";
	$pass = "";
	$db = "forum";
	$con = mysqli_connect($host, $user, $pass, $db); 

    // $errors = array();

    if(isset($_POST['register-btn']))
    {
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password_1 = mysqli_real_escape_string($con, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($con, $_POST['password_2']);
    }
    

    // if (empty($username)) { array_push($errors, "Username is required"); }
    // if (empty($email)) { array_push($errors, "Email is required"); }
    // if (empty($password_1)) { array_push($errors, "Password is required"); }
    // if ($password_1 != $password_2) 
    // {
    //     array_push($errors, "The two passwords do not match");
    // }


    // if (count($errors) == 0)
    if ($password_1 == $password_2)
    {
        $password = md5($password_1);//encrypt the password before saving in the database
  
        $query = "INSERT INTO users(username, email, passwd) VALUES('$username', '$email', '$password')";
        mysqli_query($con, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: ../index.php');
    }

    else
    {
        header('location: errors.php');
    }
?>