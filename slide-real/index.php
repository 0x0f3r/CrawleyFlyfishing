<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="layout.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<title>
Testing some CSS
</title>
<script type="text/javascript">
	var imageCount = 0;
	var imagePos = 1;
	var clickTimer;
	
	function animateSlide(){
		$(".images").stop(true, true).animate({
			left: $(".slideRealContainer").width() * -(imagePos-1)
		});
		$(".SlideNavButtons li").css("border", "1px solid white");
		$(".slideReal ul li[data-id='" + imagePos + "']").css("border", "1px solid #00CCCC");
	}

	$(window).load(function(){
		clickTimer = window.setInterval( function() { $('.rightArrow').click() }, 5000 );
		for(var i = 1; i <= imageCount; i++){
			$(".SlideNavButtons").html($(".SlideNavButtons").html() + "<li class='slideUI' data-id='" + i + "'></li>");
		}
		$(".SlideNavButtons li").click(function(){
			var id = $(this).attr('data-id');
			imagePos = id;
			animateSlide();
		});
			$(".slideRealSlide img").each(function(index){
			var slideHeight = $(this).parent().height();
			var slideWidth = $(this).parent().width();
			
			if(($(this).width()/$(this).height()) < (slideWidth/slideHeight) ){
				$(this).css("width", "100%");
				var top = ($(this).height() - slideHeight)/2;
				$(this).css("top", -top);
			}else{
				$(this).css("height", "100%");
				var left = ($(this).width() - slideWidth)/2;
				$(this).css("left", -left);
			}
			
		});
		animateSlide();
	});
	$(function(){
		$(".images .slideRealSlide").each(function(index){
			$(this).css("left", index * $(".images").parent().width());
			imageCount++;
		});
		$(".leftArrow").click(function(){
			if(imagePos > 1){
				imagePos--;
				animateSlide();
			}else{
				imagePos=imageCount;
				animateSlide();
			}
		});
		$(".rightArrow").click(function(){
			if(imagePos < imageCount){
				imagePos++;
				animateSlide();
			}else{
				imagePos = 1;
				animateSlide();
			}
			
		});
		$("slideUI").hide();
		$(".slideReal").mouseenter(function(){
			clearInterval(clickTimer);
			$(".slideUI").stop(true, true);
			$(".slideUI").fadeIn();
		});
		$(".slideReal").mouseleave(function(){
			$(".slideUI").stop(true, true);
			$(".slideUI").fadeOut();
			clickTimer = window.setInterval( function() { $('.rightArrow').click() }, 5000 );
		});
		
	});
</script>
</head>
<body>
	<div class="slideRealContainer">
		<div class="slideReal">
			<div class="images" style="position: relative; height: 100%">
				<div class="slideRealSlide">
					<img src="http://i.imgur.com/rOzZets.jpg">
					<div class="slideCaption slideUI">Scientists did something. Interesting says one scientist.</div>
				</div>
				<div class="slideRealSlide">
					<img src="http://i.imgur.com/2Q6OdQD.jpg">
					<div class="slideCaption slideUI">Man catches worlds biggest fish. "More than I bargain for" he exclaims.</div>
				</div>
				<div class="slideRealSlide">
					<img src="http://i.imgur.com/U2zcA2H.jpg">
					<div class="slideCaption slideUI">Into the wormhole we go.</div>
				</div>
				<div class="slideRealSlide">
					<img src="http://i.imgur.com/EXAXsCl.jpg">
					<div class="slideCaption slideUI">Watching the world change</div>
				</div>
				<div class="slideRealSlide">
					<img src="http://i.imgur.com/NPRU3wB.jpg">
					<div class="slideCaption slideUI">Dam photobomber! Getting real tired of your shit.</div>
				</div>
				<div class="slideRealSlide">
					<img src="http://i.imgur.com/Fj4T9LZ.jpg">
					<div class="slideCaption slideUI">Did we forget something?</div>
				</div>
			</div>
			<div class="arrow leftArrow slideUI"> &larr; </div>
			<div class="arrow rightArrow slideUI"> &rarr; </div>
			<ul class="SlideNavButtons"></ul>
		</div>
	</div>
	<div style="clear:both;"></div>
</body>
</html>