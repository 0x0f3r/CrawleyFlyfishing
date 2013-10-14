<style type="text/css">
	#images img{
		height: 150px;
		margin: 1em;
		cursor: pointer;
	}
	#backdrop{
		background-color: black;
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: 1000;
		opacity: 0.8;
		display: none;
	}
	#image-viewer{
		display: none;

		position: fixed;
		left: 5%;
		top: 5%;

		width: 90%;
		height: 90%;

		background-color: black;

		z-index: 1001;
	}
	#image-viewer-overflow{
		overflow: hidden;
		width: 100%;
		height: 100%;
	}
	#image-viewer img{
		margin: 0 auto;
		display: block;
		height: 100%;
		width: auto;
	}
	#image-viewer-close{
		position: absolute;
		right: -10px;
		top: -10px;
		width: 20px;
		height: 20px;

		-webkit-border-radius: 999px;
	    -moz-border-radius: 999px;
	    border-radius: 999px;
	    behavior: url(PIE.htc);

	    background-color: black;
	    border: 1px solid white;

	    color: white;
	    text-align: center;

	    cursor: pointer;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		$("#images img").click(function(){
			$("#image-viewer").css({display : "table-cell"});
			$("#backdrop").css({display: "block"});
			$("#image-viewer-image").attr("src", $(this).attr("src"))	
		});
		$("#backdrop, #image-viewer-close").click(function(){
			$("#image-viewer").css({display : "none"});
			$("#backdrop").css({display: "none"});
		});
	});
</script>
<div id="images">
	<?php 
		$finfo = finfo_open(FILEINFO_MIME_TYPE);

		$dir = "./image/";
		$files = scandir($dir, 1);
		$fileCount = count($files);

		for ($i=0; $i < $fileCount; $i++) {
			$path =  $dir . $files[$i];
			$type = finfo_file($finfo, $path);

			if(strpos($type, "image") === 0){
				echo "<img src='$path' alt='$path'>";
			}
		}
	?>
</div>
<div id="image-viewer">
	<div id="image-viewer-close"> X</div>
	<div id="image-viewer-overflow"><img id="image-viewer-image" alt="Image viewer image" src=""></div>
</div>
<div id="backdrop"></div>