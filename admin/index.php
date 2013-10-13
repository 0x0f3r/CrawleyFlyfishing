<!DOCTYPE html>
<html>
	<head>
		<title>Admin - Crawley Fly Fishing</title>
	</head>
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<body>
		<div id="header">
			<br>
			<div>
				<h1>Administration Control Panel</h1>
			</div>
			<br>
		</div>
		<div id="content">
			<div class="pull-left" id="navbar">
				<ul>
					<li><a href="?page=new-post.php">new post</a></li>
					<li><a href="?page=view-posts.php">view posts</a></li>
					<li><a href="?page=new-post.php">calendar</a></li>
					<li><a href="?page=help.php">help</a></li>
					<li><a href="../index.php">main site</a></li>
				</ul>
			</div>
			<div class="pull-left" id="page-content">
				<?php 
					if(array_key_exists("page", $_GET) ){
						if(file_exists ($_GET["page"])){
							include($_GET["page"]); 
						}else{
							include("404.php");
						}
					}else{
						include("help.php");
					}
				?>
			</div>
		</div>
	</body>
</html>