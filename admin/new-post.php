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
	#preview *{
		margin: 0;
	}
</style>
<script type="text/javascript">
	//submit the post to server when clicking the button.
	$(document).ready(function(){
		$("#submit").click(function(){
			var title = $("#post-title").val();
			var content = $("#post-content").val();

			alert("Title: " + title + "\nContent: " + content);

			$.post("submit-post.php",{
	    		"title" : title,
	   			"content" : content
	    	},function(data){
	    		if(data){
	    			alert("There was a probem with that post. The server repsonded with: \n" + data );
	    		}else{

	    		}
	    	});
		});
	});

	function updateContent(content){
		$("#preview p").html(content.value);
	}
	function updateTitle(title){
		$("#preview h3").html(title.value);
	}
</script>
<br>
<div id="editor">
	<input type="text" id="post-title" placeholder="Title" onkeyup="updateTitle(this)">
	<textarea id="post-content" placeholder="Content" onkeyup="updateContent(this)"></textarea>
	<hr>
	<div id="preview">
		<h3 id="title">Title...</h3>
		<p id="content">Content...
	</div>
	<hr>
	<input id="submit" type="button" value="submit" class="pull-right">
</div>