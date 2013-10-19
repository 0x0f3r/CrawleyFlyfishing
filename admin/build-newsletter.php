	<?php
		//config params
		$postsPerPage = 5; //how many posts per page
	?>
	<?php
		$dir = "../newsletters/";
		$files = scandir($dir, 1);
		$fileCount = count($files) - 3;
		$page = 1;
		$pages = array();

		for($i = 0; $i < $fileCount;){
			$pages[$page] = "<hr>";
			for (; $i < $postsPerPage*$page; $i++) { 
				if($i < $fileCount){
					if(isset($pages[$page]))
						$pages[$page] = $pages[$page] . file_get_contents($dir . $files[$i]) . "<hr>";
				}else{
					break;
				}
			}
			$page++;
		}
		for($i = 1; $i < ($page); $i++){
			if(isset($pages[$i])){
				$filepath = "../newsletter-pages/page" . $i .".html";
		        $f = fopen($filepath, "w"); 
		        //checks to see if the file was opened successfully.
		        if($f == false){
		                echo(" \n Error code: 1 \n Unable to open file. Please report this to the server administrator. \n");
		                return;
		        }

		        fwrite($f, $pages[$i]); 
		        if(!fclose($f)){
		                echo("\n Error code: 2 \n Unable to save file. Please report this to the server administrator");
		                return;
		        }
		    }
		}
		
	?>