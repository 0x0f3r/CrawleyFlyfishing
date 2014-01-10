<?php
	if(!isset($_GET["post-id"]) || !file_exists("../newsletters/" . $_GET["post-id"])){
        header('Location: ?page=../400.php');
    }
    unlink('../newsletters/$_GET["post-id"]');
?>