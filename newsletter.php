<div id="news">
	<?php
		$dir = "./newsletters/";
		$files = scandir($dir, 1);
		$fileCount = count($files) - 2;
		$pageLength = 5; // change to liking
		$pageCount = ceil($fileCount/$pageLength);

		$page = 0;
		if(isset($_GET['p']) && ctype_digit($_GET['p'])){
			$page = $_GET["p"];

			//if the page is out of bounds then redirect them to the last page
			if($page >= $pageCount){
				$page = $pageCount - 1;
				header('Location: ?page=newsletter.php&p=' . $page);
			}
		}
		
		echoPageNumbers($pageCount, $page);

		//loop through all the posts 
		for($i = $page * $pageLength;; $i++){
			if($i < (($page * $pageLength) + $pageLength-1) && $i < $fileCount-1){
				echo "<div class='news-post'>";
				include($dir . $files[$i]); 
				echo " <div style='clear: both'></div></div> ";
			}else{
				echo "<div class='first-post news-post'>";
				include($dir . $files[$i]); 
				echo "<div style='clear: both'></div></div>  ";
				break;
			}
		}

		echoPageNumbers($pageCount, $page);

		//prints out a bootstrap page selector thingy
		function echoPageNumbers($pageCount, $page){
			//warning, black magick ahead. Probably works well. 
			$startPage=0;
			$endPage = 5;

			if($page >= 2){
				$startPage = $page - 2;
				$endPage = $page + 3;
			}
			if($endPage > $pageCount){
				$endPage = $pageCount;
				$startPage = $endPage - 5;
			}
			if($startPage < 0){
				$startPage = 0;
			}
			//end black magic

			//actual printing of the page selector thingy
			echo '<div class="pagination pull-right" style="margin: 6px 2em 0 0"><ul>';
			echo '<li><a href="?page=newsletter.php&p=0">«</a></li>';
			for($i = $startPage; $i < $endPage; $i++){
				if($i == $page){
					echo '<li class="active">';
				}else{
					echo '<li>';
				}
				echo('<a href="?page=newsletter.php&p=' . $i . '">' . ($i + 1) . '</a></li>');
			}
			echo '<li><a href="?page=newsletter.php&p=' . ($pageCount-1) . '">»</a></li>';
			echo '</ul></div>';
			echo '<div style="clear:both"></div>';
		}
	?>
</div>
