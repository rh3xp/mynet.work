<?php
    session_start();

    $host = "localhost";
    $user = "root";
    $pass = "";
    
    //Database Selection
    $link = mysql_connect($host, $user, $pass); 
    if (!$link) {
        die('Could not connect: ' . mysql_error());
    }
    //Database Selection
    mysql_select_db('forum') or die(mysql_error());



    if(isset($_POST['login-btn']))
    {
        // escapes the escape sequences and does not allow users to hack into it.
        //$username = mysqli_real_escape_string($con, $_POST['username']);
        //$password_1 = mysqli_real_escape_string($con, $_POST['password_1']);
        $username = $_POST['username'];
        $password_1 = $_POST['password_1'];
  

        //encrypt the password before saving in the database
        //$password = md5($password_1);
        $password = $password_1;

        $query = "SELECT * FROM users WHERE username='$username' AND passwd='$password' LIMIT 0,1";
        $result=mysql_query($query) or die("SELECT * FROM users WHERE username = <font color='red'>".$username."</font>"."AND password = <font color='red'>".$password."</font><br/><br/>".mysql_error());
        $rows = mysql_fetch_array($result);

        if($rows)
        {
            //create_session();
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: ../post.php');

        }
        else
        {
            echo "<h1>Incorrect username/password.</h1>";
            echo "SELECT * FROM users WHERE username='<font color='red'>".$username."</font>'"." AND password='<font color='red'>".$password."</font>'";
        }
    }
?>