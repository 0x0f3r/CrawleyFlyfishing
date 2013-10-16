<?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        
        //formatting the date
        date_default_timezone_set('Europe/London');
        $date = date("D jS M Y G") . ":" . date("i");
        
        //opens a file with the current time elapsed since the unix epoch
        $filepath = "../newsletters/" . date("U") .".php";
        $f = fopen($filepath, "w"); 
        //checks to see if the file was opened successfully.
        if($f == false){
                echo(" \n Error code: 1 \n Unable to open file. Please report this to the server administrator. \n");
                return;
        }
        
        fwrite($f, "<h3>" .  $_POST["title"] . "</h3> \n <div> " . $_POST["content"] . "</div><div class='pull-right'> $date </div>"); 
        if(!fclose($f)){
                echo("\n Error code: 2 \n Unable to save file. Please report this to the server administrator");
                return;
        }
?>
