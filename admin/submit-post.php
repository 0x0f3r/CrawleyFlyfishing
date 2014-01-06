<?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);

        date_default_timezone_set('Europe/London');

        function parse(){
                $title = $_POST["title"];
                $content = $_POST["content"];

                //formatting the date
                $date = date("D jS M Y G") . ":" . date("i");

                return ("<h3 class='title'>" . $title . "</h3>" . "<div class='content'>" . $content . "</div>" . "<div class='pull-right' class='date'>" . $date . "</div>");
        }
        function submit(){
                //opens a file with the current time elapsed since the unix epoch
                $filepath = "../newsletters/" . date("U") .".php";
                $f = fopen($filepath, "w"); 
                //checks to see if the file was opened successfully.
                if($f == false){
                        echo(" \n Error code: 1 \n Unable to open file. Please report this to the server administrator. \n");
                        return;
                }

                fwrite($f, parse()); 
                if(!fclose($f)){
                        echo("\n Error code: 2 \n Unable to save file. Please report this to the server administrator");
                        return;
                }
        }

        if (isset($_POST["action"])) {
                if($_POST["action"] == "submit"){
                        submit();
                }else if ($_POST["action"] == "preview") {
                        echo parse();
                }
        }
       
?>
