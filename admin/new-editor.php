<link rel="stylesheet" href="minified/themes/default.min.css" type="text/css" media="all" />
<script type="text/javascript" src="minified/jquery.sceditor.bbcode.min.js"></script>

<script>
$(function() {
	$("textarea").sceditor({
		style: "minified/jquery.sceditor.default.min.css",
		width: "100.8%",
		enablePasteFiltering: true,
		id: "content",
		resizeEnabled: false
	});

	$("#preview-btn").click(function(){
		var content = $("textarea").sceditor('instance').val();
		var title = $("#title").val();
		alert(title + "\n" + content);
	});

});
</script>
<div style="width: 80%; position: relative; margin: 0 auto;">
	<input id="title" type="text" placeholder="Title" style="width: 100%; margin: 0;"></input>
	<textarea style="width: 100%; height: 400px;"></textarea>
	<br>
	<div id="preview-btn" class="btn btn-primary" style="position: absolute; bottom: 0em; right: -1em;">Preview</div>
</div>