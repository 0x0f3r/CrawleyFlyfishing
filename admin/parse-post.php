<?php
	    error_reporting(E_ALL);
        ini_set("display_errors", 1);
        
        //formatting the date
        date_default_timezone_set('Europe/London');
        $date = date("D jS M Y G") . ":" . date("i");
        
        $title = $_POST["title"];
        $content = $_POST["content"];

        $content = nl2br($content);

        echo("<h3>" . $title  . "</h3> \n <div> " . $content . "</div><div class='pull-right'> $date </div>");
        
?>