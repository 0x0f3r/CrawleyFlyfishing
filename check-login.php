<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	session_start();
	$database = $_SESSION["database"];
    $mysqli = new mysqli($database["host"], $database["user"], $database["password"], $database["database"]);
	if ($mysqli->connect_errno) {
   		echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	}

	$res = $mysqli->query("SELECT * FROM users WHERE email='" . $_POST["email"] . "';");
	$row = $res->fetch_assoc();
	if( $_POST["password"] == $row['password']){
		$_SESSION["logged"] = true;
		$_SESSION["email"] = $row["email"];	
		$_SESSION["first-name"] = $row["first_name"];
		header("Location: index.php?page=welcome.php");
                die();
	}else{
		header("Location: index.php?page=bad-login.php");
                die();

	}
?>
