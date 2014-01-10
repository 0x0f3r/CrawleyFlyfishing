<?php
	if(!isset($_POST["post-id"]) || !file_exists("../newsletters/" . $_GET["post-id"])){
        echo '400';
    }
    $path = realpath('../newsletters/' . $_POST["post-id"]);
    if(is_readable($path)){
    	unlink($path);
    	echo $path;
    }else{
    	echo "hi: " . $path;
    }
?>