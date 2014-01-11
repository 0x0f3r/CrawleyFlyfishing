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
                if(isset($_POST["post"])){
                        $filepath = "../newsletters/" . $_POST["post"];
                }
                file_put_contents($filepath, parse());
        }

        if (isset($_POST["action"])) {
                if($_POST["action"] == "submit"){
                        submit();
                }else if ($_POST["action"] == "preview") {
                        echo parse();
                }
        }
       
?>
