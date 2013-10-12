<div class="pull-right">
	<a href="<?php echo $siteURL; ?>?page=new-post.php"> New Post </a>
</div>	
<div style="clear: both; margin-bottom: 3px;"></div>
<div id="news">
	<?php
		$dir = "./newsletters/";
		$files = scandir($dir, 1);
		$fileCount = count($files);
		
		//loop through all the posts 
		for($i = 0; $i < ($fileCount - 3); $i++){
			echo "<div class='news-post'>";
			include($dir . $files[$i]); 
			echo " <div style='clear: both'></div></div> ";
		}
		
		//Add the first (earliest) post with the css styling to add the bottom border.
		echo "<div class='first-post news-post'>";
		include($dir . $files[$fileCount - 3]); 
		echo "<div style='clear: both'></div></div>  ";
	?>
</div>
<div class="pull-right" style="position: absolute; bottom: 0.5em; right: 0.5em;">
	<a href="<?php echo $siteURL; ?>?page=new-post.php"> New Post </a>
</div>	
