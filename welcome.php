
<style type="text/css">
  #slider>div{
    height: 100%;
    width: 100%;
  }
  #slider ol{
    position: absolute;
    bottom: 15px;
    top: auto;
  }
  #slider ol li{
    margin-left: 1em;
  }
  #slider{
    height: 400px; width: 100%; margin: 0 auto; position: abolute;
  }
  .item img{
    position: relative;
    min-height: 100%;
    width: 100%;
  }
  div .link-box{
    width: 50%;
    position: relative;
  }
  div .link-box img{
    height: 150px;
    margin: 1em;
  }
  div .link-box h2{
    position: absolute;
    top: 1em;
    left: 1em;
    color: black;
  }
  div .caption{
    position: absolute;
    right: 0;
    top: 0;
    height: 100%;
    width: 40%;
    background-color: black;
    color: white;
    opacity: 0.5;
  }
  .caption *{
    opacity: 1;
  }
</style>

<div id="slider" class="carousel slide">
  <ol class="carousel-indicators">
    <li data-target="#slider" data-slide-to="0" class="active"></li>
    <li data-target="#slider" data-slide-to="1"></li>
    <li data-target="#slider" data-slide-to="2"></li>
    <li data-target="#slider" data-slide-to="3"></li>
  </ol>
  <!-- Carousel items -->
  <div class="carousel-inner">
    <div class="active item">
      <div>
        <img src="image/slide1.JPG" style="top: -150px;">
        <div class="caption">
          <h3>Header</h3>
          <p>Description
        </div>
      </div>
    </div>
    <div class="item">
      <div>
        <img src="image/slide2.JPG" style="top: -150px;">
        <div class="caption">
          <h3>Header</h3>
          <p>Description
        </div>
      </div>
    </div>
    <div class="item">
      <div>
        <img src="image/slide3.JPG" style="top: -400px;">
        <div class="caption">
          <h3>Header</h3>
          <p>Description
        </div>
      </div>
    </div>
    <div class="item">
      <div>
        <img src="image/slide4.JPG" style="top: -25%;">
        <div class="caption">
          <h3>Header</h3>
          <p>Description
        </div>
      </div>
    </div>
  </div>
  <div>
  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#slider" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#slider" data-slide="next">&rsaquo;</a>
</div>
<a href="?page=gallery.php"><div class="link-box pull-left" style="background-color: #6C8853;"><img class="pull-right" src="camera.png"><h2>Gallery</h2></div></a>
<a href="?page=newsletter.php"><div class="link-box pull-right" style="background-color: #086608;"><img class="pull-right" src="mail.png"><h2>Newsletter</h2></div></a>
