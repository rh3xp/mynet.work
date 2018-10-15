<?php
	session_start();
	if(isset($_SESSION['username']))
	{
		$uname = $_SESSION['username'];
	
	echo '<a href="includes/logout.php">
			<input class="logoutbutton" type="button" value="Logout">
		</a>';
	}

	// create connection


?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <title>feed</title>
	<link rel="stylesheet" href="css/feed_style.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Satisfy" />
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<title>newsfeed</title>
	<style>
      .logoutbutton
      {
        position:absolute;
        margin-top: 20px;
        margin-left:400px;
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
</head>

<body>
<h1>Hi <?php echo $uname ?></h1>
	<ul id="messages">
	  		<?php
					$connection = mysql_connect("localhost", "root", "");
					$db = mysql_select_db("forum", $connection);
					$sql = "SELECT username, content FROM posts ORDER BY PostedOn DESC";
					$query = mysql_query($sql, $connection);
					$num = mysql_num_rows($query);
					if($num > 0)
					{
						while($row = mysql_fetch_assoc($query))
						{	
							$uname = $row['username'];
							$post = $row['content'];
							echo '<li>
									<div class="infos">
										<img src="http://farm5.staticflickr.com/4136/4817542998_55a7eb8d8b_q.jpg" alt="" title="by tresMunkeys" />
									</div>
									<div class="content">
										<h3>'.$uname.'</h3>
										<p>'.$post.'</p>
									</div>		
									</li>';
						}
					}
					else
					{
						echo "<h1>Add some posts.</h1>";
					}

			?>

		<!-- 1
		<li>
			<div class="infos">
				<img src="http://farm5.staticflickr.com/4136/4817542998_55a7eb8d8b_q.jpg" alt="" title="by tresMunkeys" />
				<a href="https://twitter.com/webodream" class="sprite twitter">@webodream</a>
				<a href="https://www.facebook.com/groups/115089745169149" class="sprite facebook">depot.webdesigner</a>
				<a href="https://github.com/arbaoui-mehdi" class="sprite github">@arbaoui-mehdi</a> 
			</div>
			<div class="content">
		
			 <h3>
					Person 1
					<b>ceo &amp; founder "depot webdesigner"</b>
				</h3>
				<p>
					I look ugly. <a href="#">http://www.depotwebdesigner.com</a>.
				</p>
			</div> 
		</li> -->


		
		<!-- 2 
		<li>
			<div class="infos">
				<img src="http://farm3.staticflickr.com/2721/4531285963_cd28f61b16_q.jpg" alt=""  title="by tresMunkeys" />
				<a href="https://twitter.com/webodream" class="sprite twitter">@webodream</a>
				<a href="https://www.facebook.com/groups/115089745169149" class="sprite facebook">depot.webdesigner</a>
				<a href="https://github.com/arbaoui-mehdi" class="sprite github">@arbaoui-mehdi</a>
			</div>
			<div class="content">
				<h3>
					Person 2
					<b>webdeveloper</b>
				</h3>
				<p>
					random post 2 by person 2.
				</p>
			</div>
		</li>

		<li>
			<div class="infos">
				<img src="http://farm5.staticflickr.com/4136/4817542998_55a7eb8d8b_q.jpg" alt="" title="by tresMunkeys" />
				<a href="https://twitter.com/webodream" class="sprite twitter">@webodream</a>
				<a href="https://www.facebook.com/groups/115089745169149" class="sprite facebook">depot.webdesigner</a>
				<a href="https://github.com/arbaoui-mehdi" class="sprite github">@arbaoui-mehdi</a>
			</div>
			<div class="content">
				<h3>
					Person 3
					<b>ceo &amp; founder "depot webdesigner"</b>
				</h3>
				<p>
					I look ugly. <a href="#">http://www.depotwebdesigner.com</a>.
				</p>
			</div>
		</li> -->

	</ul>
    <script  src="js/feed.js"></script>
</body>
</html>