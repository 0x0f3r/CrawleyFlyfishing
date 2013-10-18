<style type="text/css">
	#news{
		display: none;
	}
	.post-browser-item{
		position: relative;
	}
	.post-browser-item img{
		position: absolute;
		right: 1em;
		top: 10%;
		height: 80%;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		$("#news .news-post").each(function(){
			var title = $(this).children(":first")[0];
			$("#post-browser").append("<div class='well post-browser-item' id='post-" + $(this).attr("id") + "'>" + title.outerHTML + "<img src='/img/down-chevron.png' alt='expand'>" + "</div>");
		});
	});
</script>
<div id="post-browser">

</div>
<div id="news">
	<?php
		$dir = "../newsletters/";
		$files = scandir($dir, 1);
		$fileCount = count($files);
		
		//loop through all the posts 
		for($i = 0; $i < ($fileCount - 3); $i++){
			echo "<div class='news-post' id='" . $files[ $i ] . "'>";
			include($dir . $files[$i]); 
			echo " <div style='clear: both'></div></div> ";
		}
		
		//Add the first (earliest) post with the css styling to add the bottom border.
		echo "<div class='first-post news-post'>";
		include($dir . $files[$fileCount - 3]); 
		echo "<div style='clear: both'></div></div>  ";
	?>
</div>