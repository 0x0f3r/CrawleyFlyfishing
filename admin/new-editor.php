<link rel="stylesheet" href="minified/themes/default.min.css" type="text/css" media="all" />
<script type="text/javascript" src="minified/jquery.sceditor.bbcode.min.js"></script>

<script>
$(function() {
	$("textarea").sceditor({
		plugins: "bbcode",
		style: "minified/jquery.sceditor.default.min.css",
		width: "100.8%",
		enablePasteFiltering: true,
		resizeEnabled: false
	});
});
</script>
<div width="80%">
	<input type="text" placeholder="Title" style="width: 100%;"></input>
	<textarea style="width: 100%; height: 400px;"></textarea>
</div>