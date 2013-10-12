<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$data = $_POST["imageData"];
	$name = $_POST["imageName"];
	
	list($type, $data) = explode(';', $data);
	list(, $data)      = explode(',', $data);
	$data = base64_decode($data);

	file_put_contents('./image/' . $name, $data);
	echo "Saved $name of type $type in /image/$name";
?>