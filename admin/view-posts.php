<style type="text/css">
	.news-post{
		position: relative;
		border-radius: 2px;
		border: 1px solid #BBBBBB;
		background-color: #E0E0E0;
		margin: 1em 0;
		padding: 0 1em;
	}
	.news-post .content{
		display: none;
	}
	.news-post .title{
		display: block;
		cursor: pointer;
	}
	.news-post-controls{
		position: absolute;
		right: 1em;
		top: 0;
	}
	.news-post-controls *{
		margin: 0 2px;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		$("#news .news-post").each(function(){
			//apend the controls for edit/delete.
			$(this).append(
				'<div class="news-post-controls">' +
					'<a class="delete" href="#" id="delete-' + $(this).attr("id") + '">delete</a>' +
					'<a href="?page=edit-post.php&post-id=' + $(this).attr("id") + '">edit</a>' +
				'</div>'
			);
		});
		//expands the post 
		$(".news-post .title").click(function(){
			$(this).parent().find(".content").slideToggle();
		});

		$(".delete").click(function(){
			var post = $(this).attr("id").replace("delete-","");
			if(confirm("Are you sure you want to delete this post?")){
				$.post("delete-post.php",{
		            "post-id" : post
		        },function(data){
		            if(data){
		                alert(data);
		            }else{
		                location.reload();
		            }
		        });
		    }
		});
	});
</script>
<?php
	$dir = "../newsletters/";
	$files = scandir($dir, 1);
	$fileCount = count($files) - 2;
	$pageLength = 10;
	$pageCount = ceil($fileCount/$pageLength);

	//sets the page vairiable used to decide what page to display. If it is not passed through $_GET["p"] then it defaults to 0.
	$page = 0;
	if(isset($_GET['p']) && ctype_digit($_GET['p'])){
		$page = $_GET["p"];

		//if the page is out of bounds then redirect them to the last page
		if($page >= $pageCount){
			$page = $pageCount - 1;
			header('Location: ?page=view-posts.php&p=' . $page);
		}
	}

	//echo the page bars. Method at bottom
	echoPageNumbers($pageCount, $page); 
	
	//this will be populated by javascript so that the whole post is not displayed
	echo '<div id="post-browser"></div>';

	//this is the hidden div that contains all the posts.
	echo '<div id="news">';
	//loop through all the posts 
	for($i = $page * $pageLength;; $i++){
		if($i < (($page * $pageLength) + $pageLength-1) && $i < $fileCount-1){
			echo "<div class='news-post' id=" . $files[$i] . ">";
			include($dir . $files[$i]); 
			echo " <div style='clear: both'></div></div> ";
		}else{
			echo "<div class='first-post news-post' id=" . $files[$i] . ">";
			include($dir . $files[$i]); 
			echo "<div style='clear: both'></div></div>  ";
			break;
		}
	}

	echo '</div>';

	echoPageNumbers($pageCount, $page); 

	function echoPageNumbers($pageCount, $page){
		$startPage=0;
		$endPage = 5;

		if($page >= 2){
			$startPage = $page - 2;
			$endPage = $page + 3;
		}
		if($endPage > $pageCount){
			$endPage = $pageCount;
			$startPage = $endPage - 5;
		}
		if($startPage < 0){
			$startPage = 0;
		}

		echo '<div class="pagination pull-right" style="margin: 0;"><ul>';
		echo '<li><a href="?page=view-posts.php&p=0">«</a></li>';
		for($i = $startPage; $i < $endPage; $i++){
			if($i == $page){
				echo '<li class="active">';
			}else{
				echo '<li>';
			}
			echo('<a href="?page=view-posts.php&p=' . $i . '">' . ($i + 1) . '</a></li>');
		}
		echo '<li><a href="?page=view-posts.php&p=' . ($pageCount-1) . '">»</a></li>';
		echo '</ul></div>';
		echo '<div style="clear:both"></div>';
	}
?>