<?php
    if(!isset($_GET["post-id"]) || !file_exists("../newsletters/" . $_GET["post-id"])){
        header('Location: ?page=../400.php');
    }
?>

<link rel="stylesheet" href="minified/themes/default.min.css" type="text/css" media="all" />
<script type="text/javascript" src="minified/jquery.sceditor.bbcode.min.js"></script>

<style type="text/css">
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
    #preview{
    	display: none;

    	width: 80%;
    	height: 80%;

        padding: 1em;

    	position: fixed;
    	left: 10%;
    	top: 10%;

    	background-color: white;
    }
    #preview .well{
        overflow-x: scroll;
        height: 88%; 
    }
    #submit-btn{
        position: absolute;
        bottom: 2px;
        right: 1em;
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

        background-color: white;
        border: 1px solid black;

        text-align: center;

        cursor: pointer;
    }

</style>

<script type="text/javascript">
$(function() {
    var postId = "<?php echo $_GET["post-id"]; ?>";

	$("textarea").sceditor({
		style: "minified/jquery.sceditor.default.min.css",
		width: "100.8%",
		enablePasteFiltering: true,
		id: "content",
		resizeEnabled: false
	});

    $("#title").val($("#post-data .title").html());
    $("textarea").sceditor('instance').val($("#post-data .content")[0].outerHTML);

	$("#preview-btn").click(function(){
		var content = $("textarea").sceditor('instance').val();
		var title = $("#title").val();
		$("#backdrop").css({display: "block"});
		$(".sceditor-container").css({display: "none"});
		$.post("submit-post.php",{
            "action" : "preview",
            "title" : title,
            "content" : content
      	},function(data){
      		$("#preview").css({display: "block"});
            $("#preview .well").html(data);
        });
	});
    $("#submit-btn").click(function(){
        var content = $("textarea").sceditor('instance').val();
        var title = $("#title").val();
        $.post("submit-post.php",{
            "action" : "submit",
            "title" : title,
            "content" : content,
            "post" : postId
        },function(data){
            if(data){
                alert(data);
            }else{
                window.location.href = "?page=view-posts.php";
            }
        });
    });
    $("#close").click(function(){
        $("#backdrop").css({display: "none"});
        $(".sceditor-container").css({display: "block"});
        $("#preview").css({display: "none"});
    });
});
</script>
<div style="width: 80%; position: relative; margin: 0 auto;">
	<input id="title" type="text" placeholder="Title" style="width: 100%; margin: 0;"></input>
	<textarea style="width: 100%; height: 400px;"></textarea>
	<br>
	<div id="preview-btn" class="btn btn-primary" style="position: absolute; bottom: 0em; right: -1em;">Preview</div>
</div>
<div id="backdrop"></div>
<div id="preview">
    <div id="close">X</div>
    <div class="well"></div>
    <div class="btn btn-primary pull-right" id="submit-btn">Submit</div>
</div>
<div id="post-data" style="display: none">
    <?php
        include("../newsletters/" . $_GET["post-id"]);
    ?>
</div>
