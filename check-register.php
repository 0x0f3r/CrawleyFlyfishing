<?php
	session_start();
	$database = $_SESSION["database"];
    $mysqli = new mysqli($database["host"], $database["user"], $database["password"], $database["database"]);
    if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }
	$result = $mysqli->query("SELECT * FROM users WHERE email='" . $_POST["email"] . "';");
	if($result->num_rows != 0){
		header("Location: " . $siteURL . "/flyfisher/?page=bad-register.php");
        
		die();
	}else{
		$insert = "INSERT INTO users (first_name, last_name, email, password, permision) VALUES ('$_POST[firstName]', '$_POST[lastName]', '$_POST[email]', '$_POST[password]', 0)";
		$mysqli->query($insert);
		header("Location: " . $siteURL . "/flyfisher/?page=good-register.php");
        
		die();		
	}

?>
