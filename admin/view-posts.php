<style type="text/css">
	#news{
		display: none;
	}
	.post-browser-item{
		position: relative;
		border-radius: 2px;
		border: 1px solid #BBBBBB;
		background-color: #E0E0E0;
		margin: 1em 0;
		padding: 0 1em;
	}
	.post-browser-item .news-post .content{
		display: none;
	}
	.post-browser-item .title{
		display: block;
		cursor: pointer;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		//adds the titles of the news posts to the display.
		$("#news .news-post").each(function(){
			$("#post-browser").append("<div class='post-browser-item' id='post-" + $(this).attr("id") + "'>" + this.outerHTML +  "</div>");
		});

		//expands the psot 
		$(".post-browser-item").click(function(){
			$(this).find(".news-post .content").slideToggle();;
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