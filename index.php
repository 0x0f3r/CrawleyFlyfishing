<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	
	session_start();
	
	$siteURL = "index.php";
	$database = array("host" => "localhost", "user" => "writer", "password" => "apples", "database" => "users");
	$_SESSION["database"] = $database;
	if(array_key_exists("page", $_GET) && $_GET["page"] == "new-post.php"){
		if(!isset($_SESSION["logged"]) || !$_SESSION["logged"]){
			header("Location: " . $siteURL . "?page=login.php");
			die();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Crawley Fly Fishing</title>
<!-- Bootstrap -->
		<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="layout.css" media="screen">
		
<!-- JQ UI -->
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
</head>
<body>
<div id="outer_content">
	<div id="header" class="rounded-container">
		<div class="pull-right">
			<?php
				if(isset($_SESSION["logged"]) && $_SESSION["logged"]){
					echo "<p style='color: white;'> Welcome, " . $_SESSION["first-name"] . "<a href='?page=logout.php'> Not you? Log out. </a>";
				}else{
					echo "<p style='color: white;'> Not logged in: <a href='?page=login.php'>" . "Login </a>";
				}
			?>
		</div>
		<a href=?page=welcome.php><img src="flyfishers.png" alt="Crawley Fly Fishing"></a>
		<div id="nav-bar"> 
			| <a href="?page=welcome.php">Welcome</a> 
			| <a href="?page=info.php">Info</a> 
			| <a href="?page=newsletter.php">Newsletter</a> 
			| <a href="?page=calendar.php">Calendar</a>
			| <a href="?page=contact.php">Contact</a> |
		</div>
		<div style="clear:both;"></div>
	</div>
	<div id="inner_content" class="rounded-container">
		<?php 
			if(array_key_exists("page", $_GET) && file_exists ($_GET["page"])){
				include($_GET["page"]); 
			}else if(!array_key_exists("page", $_GET)){
				include("welcome.php");
			}else{
				include("404.php");
			}
		?>
		<div style="clear: both"></div>
	</div>
	<div id="footer">
		<a href=?page=welcome.php><img src="flyfisherslogo.png" alt="logo"/></a>
		<p>Boring footer stuff! This is where you might put legal stuff.<br>
		   Made by Jonathan Poole. <br>
		   As a pet project to learn more about web development. <br>
		   If you like what you see, contact me at: jfp6@kent.ac.uk		
	</div>
</div>
</body>
</html>
