
<style type="text/css">
  #slider div{
    height: 100%;
    width: 100%;
  }
  #slider{
    height: 400px; width: 90%; margin: 0 auto; position: abolute;
  }
  .item img{
    position: relative;
    min-height: 100%;
    width: 100%;
    top: -25%;
  }
</style>

<div id="slider" class="carousel slide">
  <ol class="carousel-indicators">
    <li data-target="#slider" data-slide-to="0" class="active"></li>
    <li data-target="#slider" data-slide-to="1"></li>
    <li data-target="#slider" data-slide-to="2"></li>
  </ol>
  <!-- Carousel items -->
  <div class="carousel-inner">
    <div class="active item"><img src="http://i.imgur.com/rOzZets.jpg"></div>
    <div class="item"><img src="http://i.imgur.com/2Q6OdQD.jpg"></div>
    <div class="item"><img src="http://i.imgur.com/U2zcA2H.jpg"></div>
  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#slider" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#slider" data-slide="next">&rsaquo;</a>
</div>