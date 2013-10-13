<style type="text/css">
	#images img{
		max-width: 300px;
		max-height: 300px;
		margin: 1em;
	}
	#image-viewer{
		display: none;
		height: 90%;
		position: fixed;
		top: 5%;
	}
</style>
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
</div>