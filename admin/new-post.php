<style type="text/css">
	#editor{
		margin:0 auto;
		width: 90%;
	}
	#post-content{
		display: block;
		width: 100%;
		min-height: 400px;
	}
	#post-title{
		width: 100%;
	}
	#backdrop{
		display: none;
		position: fixed;

		width: 100%;
		height: 100%;

		left: 0;
		top: 0;

		opacity: 0.8;
		background-color: black;
	}
	#backdrop img {
		position: fixed;
		top: 50%;
		left: 50%;
	}
	#preview{
		display: none;
		position: fixed;

		width: 80%;
		height: 80%;

		top: 10%;
		left: 10%;
	}
	#preview *{
		margin: 0em;
	}
	#close{
		position: absolute;
		right: -10px;
		top: -10px;
		width: 20px;
		height: 20px;

		-webkit-border-radius: 999px;
	    -moz-border-radius: 999px;
	    border-radius: 999px;
	    behavior: url(PIE.htc);

	    background-color: #f5f5f5;
	    border: 1px solid #e3e3e3;

	    color: #BBB;
	    text-align: center;

	    cursor: pointer;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		//submit the post to server and preview
		$("#preview-btn").click(function(){
			$("#backdrop").css({display: "block"});

			var title = $("#post-title").val();
			var content = $("#post-content").val();

			$.post("submit-post.php",{
				"action" : "preview",
	    		"title" : title,
	   			"content" : content
	    	},function(data){
	    		$("#preview-content").html(data + "<div style='clear:both;'></div>");
	    		$("#preview").css({display: "block"});
	    	});
		});

		//close the preview window
		$("#backdrop, #close").click(function(){
			$("#backdrop").css({display: "none"});
			$("#preview").css({display: "none"});
		});

		//submit the post to the server to save
		$("#submit-btn").click(function(){
			var title = $("#post-title").val();
			var content = $("#post-content").val();

			$.post("submit-post.php?action=submit",{
				"action" : "submit",
	    		"title" : title,
	   			"content" : content
	    	},function(data){
	    		alert(data);
	    	});
		});

	});
</script>
<br>
<div id="editor">
	<input type="text" id="post-title" placeholder="Title"></input>
	<textarea id="post-content" placeholder="Content"></textarea>
	<div id="preview-btn" class="btn btn-primary pull-right" style="position: relative; right: -1em;">Preview</div>
</div>

<div id="backdrop">
	<img src="/img/ajax-loader.gif">
</div>

<div id="preview" class="well">
	<div id="close">X</div>
	<div class="well" id="preview-content"></div>
	<div class="btn btn-primary" id="submit-btn" style="position: absolute; bottom: 1em; right: 1em;">Submit</div>
</div>
