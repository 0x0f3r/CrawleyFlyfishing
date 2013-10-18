<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Crawley Fly Fishing</title>
<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/layout.css" media="screen">
		
<!-- JQ UI -->
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
</head>
<body>
<div id="outer_content">
	<div id="header" class="rounded-container">
		<br>
		<a href=?page=welcome.php><img src="img/flyfishers.png" alt="Crawley Fly Fishing"></a>
		<ul id="nav-bar"> 
			<li><a href="?page=welcome.php">Welcome</a></li>
			<li><a href="?page=info.php">Info</a></li>
			<li><a href="?page=gallery.php">Gallery</a></li>
			<li><a href="?page=newsletter.php">Newsletter</a></li>
			<li><a href="?page=calendar.php">Calendar</a></li>
			<li><a href="?page=contact.php">Contact</a></li>
		</ul>
		<div style="clear:both;"></div>
	</div>
	<div id="inner_content" class="rounded-container">
		<?php 
			if(array_key_exists("page", $_GET) ){
				if (strpos($_GET["page"], "admin") !== false) {
					include("403.php");
				}else if(file_exists ($_GET["page"])){
					include($_GET["page"]); 
				}else{
					include("404.php");
				}
			}else{
				include("welcome.php");
			}
		?>
		<div style="clear: both"></div>
	</div>
	<div id="footer">
		<a href=?page=welcome.php><img src="img/flyfisherslogo.png" alt="logo"/></a>
		<div style="position: absolute; bottom: -1em; right: 0;"><a href="admin/index.php"><small>Admin</small></a></div>
		<p>Boring footer stuff! This is where you might put legal stuff.<br>
		   Made by Jonathan Poole. <br>
		   As a pet project to learn more about web development. <br>
		   If you like what you see, contact me at: jfp6@kent.ac.uk <br>
		   <a href="?page=credits.php">Special thanks</a>
		<a href="http://www.clubmark.org.uk/what-clubmark"><img src="img/clubmark-resized.jpg" style=" width: 100px; height: auto; position: absolute; right: 0; bottom: 1em;"></a>
	</div>
</div>
</body>
</html>
