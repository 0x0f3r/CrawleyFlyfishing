<style type="text/css">
	#editor{
		margin:0 auto;
		width: 90%;
	}
	textarea{
		display: block;
		width: 100%;
		min-height: 600px;
	}
</style>
<script type="text/javascript">
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
</script>
<br>
<div id="editor">
	<input type="text" id="post-title">
	<textarea id="post-content"></textarea>
	<input id="submit" type="button" value="submit" class="pull-right">
</div>