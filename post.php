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

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Profile</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="css/post.css">
    <style>
      .logoutbutton
      {
        position:absolute;
        /* line-height: 30px;
        width: 40px; */
        margin-top: 20px;
        margin-left:400px;
        /* margin-top: 1px;
        margin-right: 2px; 
        padding: 15px 20px;
        border-radius: 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;*/
        top:0;
        right:0;

        width: 8%;
        padding: 10px;
        outline: none;
        border: none;
        border-radius: 25px;
        text-transform: uppercase;
        background: #f45c42;
        color: rgba(255, 255, 255, 0.8);
        font-weight: 800;
        cursor: pointer;

      }
    </style>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <!-- <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script> -->
    <script>
      $(document).ready(function()
      {
        $("#contentForm").on("submit", function ()
        {
          var hvalue = $('.text').text();
          $(this).append("<input type='hidden' name='postContent' value=' " + hvalue + " '/>");
        });
      });
    </script>

</head>

<body>
  <h1>Hi <?php echo $uname ?></h1>
  <a href="includes/logout.php">
    <input class="logoutbutton" type="button" value="Logout">
  </a>

<form action="includes/addpost.php" method="POST" id="contentForm">
  <div class="paper">
    <div class="lines">
      <div class="text" name="postContent" contenteditable spellcheck="false">
        You can edit this text! <br /><br />
        hi there~!
      </div>
    <div class="holes hole-top"></div>
    <div class="holes hole-middle"></div>
    <div class="holes hole-bottom"></div>
  </div>
  <button class="button" name="addpost-btn" >Add Post</button>
</form>
</body>
</html>