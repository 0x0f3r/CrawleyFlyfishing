<style type="text/css">
	#contentEditor{
		min-height: 20em;
	}
	#toolBar{
		margin-bottom: 2px;
		margin-top: 2px;
	}
</style>
<!--globals -->
<script type=text/javascript>
	//for clearing placeholder text
	var titleFocused = false;
	var contentFocused = false;
	
	//array of images to be uploaded 
	var images = [];
	var imageCount = 0;
	
	//inserts string b inside a at point pos.
	function insert(a, b, pos){
		return [a.slice(0, pos), b, a.slice(pos)].join('');
	}
	
</script>
<!-- Adding image -->
<script type=text/javascript>
	function handleImageSelect(evt){
		var file = evt.target.files[0];
		
		//check the file
		//file type
		if(!file.type.match("image.*")){
			document.getElementById('files').value="";
			alert("Image type not suported.");
			return false;
		}
		//file size
		if(file.size > 5242880){
			document.getElementById('files').value="";
			var size = Math.round((file.size/1024/1024) * 100) / 100;
			alert("File too large. Your file was " + size + "MB. Maximum file size is 5MB");
			return false;
		}
		
		var reader = new FileReader();
		reader.onload = (function(theFile) {
        return function(e) {
			  // Render thumbnail.
			  var span = document.createElement('span');
			  span.innerHTML = ['<img id="previewImg" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
			  var preview = document.getElementById('imagePreview');
			  preview.innerHTML = "";
			  preview.appendChild(span);
			  
			  //add image to array
			  images[imageCount] = [e.target.result, theFile.name];
			  
			  //update paste text
			  document.getElementById("imageURL").innerHTML = "[img " + (imageCount+1) + "]";
			};
		})(file);
		
		reader.readAsDataURL(file);
	}
	$(document).ready(function(){
		document.getElementById('files').addEventListener('change', handleImageSelect, false);
	});
</script>
<!-- Misc JQ stuff -->
<script type=text/javascript>
	$(document).ready(
		function(){
			// Check for the various File API support.
			if (window.File && window.FileReader && window.FileList && window.Blob) {
			  // Great success! All the File APIs are supported.
			} else {
			  alert("Oops, your browser doesn't support some of the features of this site. This site takes full advantage of the new features of HTML5. You should update your browser to the latest version. Internet Explorer 9, chrome and firefox all suport HTML5.");
			}
		
			//on clicking the submit button, it will send the post to submit-post.php
			$("#submit").click(
				function(){
					var title = document.getElementById("titleEditor").innerHTML;
					var content = document.getElementById("contentEditor").innerHTML;
					$.post("submit-post.php",{
						"title" : title,
						"content" : content
					},function(data){
						if(data == "0"){
							window.location.href = "?page=newsletter.php";
						}else{
							alert("There was an error with your request. This is most probaly nothing to do with you. Please send your system administrator this information: \n" + data);
						}
					});
					
				}
			);
			
			//testing uploads
			$("#testUpload").click(function(){
				var img = document.getElementById("previewImg");
				
				if(!img){
					alert("please select an image first.");
					return;
				}
				
				var data = img.src;
				var name = img.title;
				
				$.post("save-image.php",{
						"imageData" : data,
						"imageName" : name
					},function(data){
						alert(data);
					});
			});
			
			//disable new lines in title
			$("#titleEditor").keypress(function(e){ return e.which != 13; });
			
			//show the image upload dialog
			$("#imageUpload").dialog({minWidth: 450,minHeight: 300});
			$("#imageUpload").dialog('close');
			
			//clear the text editors on focus
			$("#titleEditor").focus(function(){
				if(!titleFocused){
					titleFocused = true;
					$(this).html("");
				}
			});
			$("#contentEditor").focus(function(){
				if(!contentFocused){
					contentFocused = true;
					$(this).html("");
				}
			});
			
		}
	);
</script>
<!-- Content and Title -->
<script type=text/javascript>
	function updateTitle(a){
		var title = document.getElementById("titlePreview");
		var text = a.innerHTML;
		
		//sanitise title
		
		title.innerHTML = text;
	}
	function replaceImg(str){
		var cmd;
		while(cmd = str.match(/\[img [0-9]+\]/)){
			var cmd = cmd[0];
			var i = str.indexOf(cmd);
			str=str.replace(cmd, "");

			imageNumber = cmd.match(/[0-9]+/);

			str = insert(str, "<img src=" + (images[imageNumber-1][0]) + " alt='pic' title =" + (images[imageNumber-1][1]) + "/>", i);
		}
		return str;
	}
	function updateContent(a){
		var content = document.getElementById("contentPreview");
		var text = a.innerHTML;
		
		//sanitise content
		text = replaceImg(text);
		
		
		content.innerHTML = text;
	}
	$(document).ready(function(){
		$("#addSelectedImage").click(function(){
			if($("#files").val() == ""){
				alert("Please select and image.");
				return false;
			}
		
			$("#imageUpload").dialog('close');
			
			if(!contentFocused){
				contentFocused = true;
				$("#contentEditor").html("");
			}
			$("#contentEditor").html($("#contentEditor").html() + "[img " + (imageCount+1) + "]");
			
			$("#imagePreview").html("");
			$("#imageURL").html("Please first select an image.");
			$("#files").val("");
			imageCount++;
		});
	});
</script>
<div contenteditable="true" id="titleEditor" class="textEditor" onkeyup="updateTitle(this)">
	Title...
</div>
<div id="toolBar">
	<button id="addImage" onclick="$('#imageUpload').dialog('open');">Add Image</button>
</div>
<div contenteditable="true" class="textEditor" id="contentEditor" onkeyup="updateContent(this)">
	Content...
</div>
<div id="help" class="pull-right">
	<a>Formatting help</a>
	<div>
	</div>
	<br>
</div>
<div style="clear:both;"></div>
<div class="news-post first-post">
	<h3 id="titlePreview">
		Title...
	</h3>
	<div id="contentPreview">
		Content...
	</div>
</div>
<button id="submit" class="pull-right">Submit</button>
<div><br></div>
<div id="imageUpload" title="Upload image">
	<input type="file" id="files"/>
	<div>
		<div id="imagePreview">
		</div>
		<br>
		Paste this where you want the image to be in the post:
	</div>
	<pre id="imageURL">Please first select an image.</pre>
	<!-- a button to test image uploads. -->
	<button id="addSelectedImage" class = "pull-right">Add Image</button>
</div>
