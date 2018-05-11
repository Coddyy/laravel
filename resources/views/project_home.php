<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<style type="text/css">
body {background:#e2e2e2;}
.area-padding {padding:60px 0px 60px 0px;}
.divider {border:1px solid #dd0000;margin:10px 0px 30px 0px;}
h1 {font-size:42px;font-weight:600;}
h2 {font-size:34px;font-weight:600;}
h3 {font-size:20px;font-weight:600;}
h4 {font-size:18px;font-weight:600;}
h5 {font-size:16px;font-weight:600;}
a {color:#000;}
a:hover {color:#dd0000;}
/*********** Brand List CSS **********/
.brand-list-area {background:#000; padding:20px 0px 20px 0px;}
.brand-list {padding: 0;list-style: none; margin: 0;}
/* **********news ara-CSS ****************/
.news-box {background:#fff;padding: 20px;transition: .5s;margin-bottom: 30px;border: 1px solid #e8e8e8;}
.news-box:hover {box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);}
/* Feature-CSS */
.used-cars-box {background:#fff;text-align: center;padding: 20px;transition: .5s;margin-bottom: 30px;border: 1px solid #e8e8e8;}
.used-cars-box:hover {box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);}
/**************** FOOTER CSS ********************/
/* Footer */
.footer {border-top:2px solid #dd0000;position: relative;background-color: #fff;color: #000;padding: 55px 0 40px;}
.footer h5:after {
    content: '';
    display: block;
    margin: 5px 0 0;
    width: 200px;
    height: 2px;
    background-color: #dd0000;
}
.footer ul {list-style: none;line-height: 2.2em;padding-left:0px;}
/*footer bottom */
.footer-bottom {padding-top: 5px;padding-bottom: 15px;border-top: 1px solid rgba(0,0,0,0.09);background: #fff;}
/* Social Icons */
.social-icons{margin: 0;padding: 0;font-size : 10px;}
.social {margin:7px 7px 7px 0px;color:#b40028;}
#social-fb:hover {color: #3B5998;transition:all .25s;}
 #social-tw:hover {color: #4099FF;transition:all .25s;}
 #social-gp:hover {color: #d34836;transition:all .25s;}
 #social-em:hover {color: #f39c12;transition:all .25s;}



/***************** Carousel CSS **************/
.margin-t70 {margin-top:70px;}
.item img {width:100%; max-height:450px;display: block;}
.caraous-title {
    position: absolute;
    top: 20%;
    left: 15.8%;
    right: auto;
    width: 96.66666666666666%;
    color: #000;
}
.caraous-title h1 {color:#000;font-size:45px; font-weight:400;}
.caraous-title h3 {margin-bottom:30px;color:#fff;font-size:20px;}
.caraous-title span {color:#fff;font-size:20px; background:#dd0000;}
.caraous-img-box img {width:50%;}
/* Button */
.site-btn{padding:12px 25px 12px 25px;background:#000;color:#fff;border:transparent;font-size:16px;}
.site-btn:hover{background:#dd0000;color:#fff;border:transparent;}


/************** NAVIGATION ***************/
.caret-up {
  width: 0; 
  height: 0; 
  border-left: 4px solid rgba(0, 0, 0, 0);
  border-right: 4px solid rgba(0, 0, 0, 0);
  border-bottom: 4px solid;

  display: inline-block;
  margin-left: 2px;
  vertical-align: middle;
}
.dropdown-menu {padding:0px;}
.dropdown-menu > li > a {
color: #514f4f;
text-decoration: none;
background-color: #fff   ;
}
.dropdown-menu > li > a:hover {
color: #fff;
text-decoration: none;
background-color: #dd0000     ;
}
.dropdown-menu > li > a {padding:8px; border-bottom:1px solid #e2e2e2;}

.navbar-default {
  background-color: #000;
  padding:25px 0px 15px 0px;
  border-bottom:1px solid #dd0000;
  font-weight:400;
  letter-spacing:2px;
  font-size:16px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}
.navbar-default .navbar-brand {
  color: #dfdfdf;
}
.navbar-default .navbar-brand:hover,
.navbar-default .navbar-brand:focus {
  color: #ffffff;
}
.navbar-default .navbar-text {
  color: #dfdfdf;
}
.navbar-default .navbar-nav > li > a {
  color: #dfdfdf;
}
.navbar-default .navbar-nav > li > a:hover,
.navbar-default .navbar-nav > li > a:focus {
  color: #ffffff;
}
.navbar-default .navbar-nav > .active > a,
.navbar-default .navbar-nav > .active > a:hover,
.navbar-default .navbar-nav > .active > a:focus {
  color: #ffffff;
  background-color: transparent;
}
.navbar-default .navbar-nav > .open > a,
.navbar-default .navbar-nav > .open > a:hover,
.navbar-default .navbar-nav > .open > a:focus {
  color: #ffffff;
  background-color: transparent;
}
.navbar-default .navbar-toggle {
  border-color: #e93402;
}
.navbar-default .navbar-toggle:hover,
.navbar-default .navbar-toggle:focus {
  background-color: #e93402;
}
.navbar-default .navbar-toggle .icon-bar {
  background-color: #dfdfdf;
}
.navbar-default .navbar-collapse,
.navbar-default .navbar-form {
  border-color: #dfdfdf;
}
.navbar-default .navbar-link {
  color: #dfdfdf;
}
.navbar-default .navbar-link:hover {
  color: #ffffff;
}

@media (max-width: 767px) {
  .navbar-default .navbar-nav .open .dropdown-menu > li > a {
    color: #dfdfdf;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
  .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
    color: #ffffff;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a,
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
    color: #ffffff;
    background-color: #e93402;
  }
}
</style>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Gaadiexpert</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      
      <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="#">Buy A Car</a></li>
        <li><a href="#">Sell a Car</a></li>
        <li><a href="#">Find a Dealer</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">News & Reviews <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Car News</a></li>
            <li><a href="#">Auto Expo 2018</a></li>
            <li><a href="#">Car Videos</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Insurance</a></li>
            <li><a href="#">Loan</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
            
         
          </ul>
        </li>
        
        
      </ul>
    </div><!-- /.navbar-collapse -->
      </div><!-- /.container-collapse -->
  </nav>
<div id="myCarousel" class="carousel slide margin-t70" data-interval="false">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="item active">
      <img src="https://images.cardekho.com/images/featuredcarimages/Maruti-Swift-17/Swift-new-0.jpg" style="width:100%" class="img-responsive">
      <div class="container">
        <div class="caraous-title">
            <div class="col-md-12">
                <div class="col-md-6">
                    <span>SPECIAL OFFER</span>
                    <h1>Choose Your<br> Dream Car with us </h1>
                    <h3>Our Promise to Complete Happiness & Satisfaction</h3>
                    <a class="btn btn-lg btn-primary site-btn" href="#">Get to Know about your car</a>
                </div>

            </div>
        
        </div>
      </div>
    </div>
    <div class="item">
      <img src="https://images.cardekho.com/images/featuredcarimages/-36/m3w21-0.jpg" class="img-responsive">
      <div class="container">
        <div class="caraous-title">
            <div class="col-md-12">
                <div class="col-md-6">
                    <span>SPECIAL OFFER</span>
                    <h1>Choose Your<br> Dream Car with us </h1>
                    <h3>Our Promise to Complete Happiness & Satisfaction</h3>
                    <a class="btn btn-lg btn-primary site-btn" href="#">Get to Know about your car</a>
                </div>

            </div>
        
        </div>
      </div>
    </div>
    <div class="item">
      <img src="https://images.cardekho.com/images/uploadimages/1509507889716/ccp.jpg" class="img-responsive">
      <div class="container">
        <div class="caraous-title">
            <div class="col-md-12">
                <div class="col-md-6">
                    <span>SPECIAL OFFER</span>
                    <h1>Choose Your<br> Dream Car with us </h1>
                    <h3>Our Promise to Complete Happiness & Satisfaction</h3>
                    <a class="btn btn-lg btn-primary site-btn" href="#">Get to Know about your car</a>
                </div>

            </div>
        
        </div>
      </div>
    </div>
  </div>
  <!-- Controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="icon-prev"></span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="icon-next"></span>
  </a>  
</div>
<div class="tabs-area area-padding">
    <div class="container">
  <div class="row">
		<div class="site-heading ">
						<h2>The most trusted Used cars</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,  </p>
						<div class="divider"></div>
					</div>
	</div>
  <div class="row">
    
    <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Sedan</a></li>
    <li><a data-toggle="tab" href="#menu1">Hatchback</a></li>
    <li><a data-toggle="tab" href="#menu2">SUV</a></li>
    <li><a data-toggle="tab" href="#menu3">Luxury</a></li>
  </ul>
    <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        <div class="row">
			<div class="col-md-3 text-center">
				<div class="used-cars-box">
				    <div class="used-cars-img">
				        <img class="img-responsive" src="https://media.zigcdn.com/media/model/2017/May/dire_320x160.jpg">
				    </div>
				    <div class="used-cars-title">
				        <h3>Maruti Swift Dzire</h3>
				        <h4>Rs. 5.53-9.91 Lakh</h4>
				    </div>
			        <button type="button" class="btn site-btn">Get On Road Price</button>
				</div>
			</div> <!-- End Col -->
			<div class="col-md-3 text-center">
				<div class="used-cars-box">
				    <div class="used-cars-img">
				        <img class="img-responsive" src="https://media.zigcdn.com/media/model/2017/May/dire_320x160.jpg">
				    </div>
				    <div class="used-cars-title">
				        <h3>Maruti Swift Dzire</h3>
				        <h4>Rs. 5.53-9.91 Lakh</h4>
				    </div>
			        <button type="button" class="btn site-btn">Get On Road Price</button>
				</div>
			</div> <!-- End Col -->

			<div class="col-md-3 text-center">
				<div class="used-cars-box">
				    <div class="used-cars-img">
				        <img class="img-responsive" src="https://media.zigcdn.com/media/model/2017/May/dire_320x160.jpg">
				    </div>
				    <div class="used-cars-title">
				        <h3>Maruti Swift Dzire</h3>
				        <h4>Rs. 5.53-9.91 Lakh</h4>
				    </div>
			        <button type="button" class="btn site-btn">Get On Road Price</button>
				</div>
			</div> <!-- End Col -->

			<div class="col-md-3 text-center">
				<div class="used-cars-box">
				    <div class="used-cars-img">
				        <img class="img-responsive" src="https://media.zigcdn.com/media/model/2017/May/dire_320x160.jpg">
				    </div>
				    <div class="used-cars-title">
				        <h3>Maruti Swift Dzire</h3>
				        <h4>Rs. 5.53-9.91 Lakh</h4>
				    </div>
			        <button type="button" class="btn site-btn">Get On Road Price</button>
				</div>
			</div> <!-- End Col -->

						
	
					</div>
      
    </div>
    <div id="menu1" class="tab-pane fade">
      <div class="row">
			<div class="col-sm-6 col-md-3 text-center">
				<div class="used-cars-box">
				    <div class="used-cars-img">
				        <img class="img-responsive" src="https://media.zigcdn.com/media/model/2017/May/dire_320x160.jpg">
				    </div>
				    <div class="used-cars-title">
				        <h3>Maruti Swift Dzire</h3>
				        <h4>Rs. 5.53-9.91 Lakh</h4>
				    </div>
			        <button type="button" class="btn site-btn">Get On Road Price</button>
				</div>
			</div> <!-- End Col -->
						<div class="col-sm-6 col-md-3 text-center">
				<div class="used-cars-box">
				    <div class="used-cars-img">
				        <img class="img-responsive" src="https://media.zigcdn.com/media/model/2017/May/dire_320x160.jpg">
				    </div>
				    <div class="used-cars-title">
				        <h3>Maruti Swift Dzire</h3>
				        <h4>Rs. 5.53-9.91 Lakh</h4>
				    </div>
			        <button type="button" class="btn site-btn">Get On Road Price</button>
				</div>
			</div> <!-- End Col -->

			<div class="col-sm-6 col-md-3 text-center">
				<div class="used-cars-box">
				    <div class="used-cars-img">
				        <img class="img-responsive" src="https://media.zigcdn.com/media/model/2017/May/dire_320x160.jpg">
				    </div>
				    <div class="used-cars-title">
				        <h3>Maruti Swift Dzire</h3>
				        <h4>Rs. 5.53-9.91 Lakh</h4>
				    </div>
			        <button type="button" class="btn site-btn">Get On Road Price</button>
				</div>
			</div> <!-- End Col -->

			<div class="col-sm-6 col-md-3 text-center">
				<div class="used-cars-box">
				    <div class="used-cars-img">
				        <img class="img-responsive" src="https://media.zigcdn.com/media/model/2017/May/dire_320x160.jpg">
				    </div>
				    <div class="used-cars-title">
				        <h3>Maruti Swift Dzire</h3>
				        <h4>Rs. 5.53-9.91 Lakh</h4>
				    </div>
			        <button type="button" class="btn site-btn">Get On Road Price</button>
				</div>
			</div> <!-- End Col -->

						
	
					</div>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
  </div>
</div>
</div>
<div class="cars-section area-padding">
    <div class="container">
	<div class="row">
		<div class="col-md-12 site-heading ">
						<h2>The most trusted Used cars</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,  </p>
						<div class="divider"></div>
					</div>
	</div>
	<div class="row">
			<div class="col-sm-6 col-md-3 text-center">
				<div class="used-cars-box">
				    <div class="used-cars-img">
				        <img class="img-responsive" src="https://media.zigcdn.com/media/model/2017/May/dire_320x160.jpg">
				    </div>
				    <div class="used-cars-title">
				        <h3>Maruti Swift Dzire</h3>
				        <h4>Rs. 5.53-9.91 Lakh</h4>
				    </div>
			        <button type="button" class="btn site-btn">Get On Road Price</button>
				</div>
			</div> <!-- End Col -->
						<div class="col-sm-6 col-md-3 text-center">
				<div class="used-cars-box">
				    <div class="used-cars-img">
				        <img class="img-responsive" src="https://media.zigcdn.com/media/model/2017/May/dire_320x160.jpg">
				    </div>
				    <div class="used-cars-title">
				        <h3>Maruti Swift Dzire</h3>
				        <h4>Rs. 5.53-9.91 Lakh</h4>
				    </div>
			        <button type="button" class="btn site-btn">Get On Road Price</button>
				</div>
			</div> <!-- End Col -->

			<div class="col-sm-6 col-md-3 text-center">
				<div class="used-cars-box">
				    <div class="used-cars-img">
				        <img class="img-responsive" src="https://media.zigcdn.com/media/model/2017/May/dire_320x160.jpg">
				    </div>
				    <div class="used-cars-title">
				        <h3>Maruti Swift Dzire</h3>
				        <h4>Rs. 5.53-9.91 Lakh</h4>
				    </div>
			        <button type="button" class="btn site-btn">Get On Road Price</button>
				</div>
			</div> <!-- End Col -->

			<div class="col-sm-6 col-md-3 text-center">
				<div class="used-cars-box">
				    <div class="used-cars-img">
				        <img class="img-responsive" src="https://media.zigcdn.com/media/model/2017/May/dire_320x160.jpg">
				    </div>
				    <div class="used-cars-title">
				        <h3>Maruti Swift Dzire</h3>
				        <h4>Rs. 5.53-9.91 Lakh</h4>
				    </div>
			        <button type="button" class="btn site-btn">Get On Road Price</button>
				</div>
			</div> <!-- End Col -->

						
	
					</div>
</div>
</div>
<div class="cars-section area-padding">
    <div class="container">
	<div class="row">
		<div class="col-md-12 site-heading ">
						<h2>The Most Trusted Used cars</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,  </p>
						<div class="divider"></div>
					</div>
	</div>
	<div class="row">
			<div class="col-sm-6 col-md-3 text-center">
				<div class="used-cars-box">
				    <div class="used-cars-img">
				        <img class="img-responsive" src="https://media.zigcdn.com/media/model/2016/Jan/renault_kwid_320x160.jpg">
				    </div>
				    <div class="used-cars-title">
				        <h3>Maruti Swift Dzire</h3>
				        <h4>Rs. 5.53-9.91 Lakh</h4>
				    </div>
			        <button type="button" class="btn site-btn">Get On Road Price</button>
				</div>
			</div> <!-- End Col -->
						<div class="col-sm-6 col-md-3 text-center">
				<div class="used-cars-box">
				    <div class="used-cars-img">
				        <img class="img-responsive" src="https://media.zigcdn.com/media/model/2017/Mar/baleno-right_320x160.jpg">
				    </div>
				    <div class="used-cars-title">
				        <h3>Maruti Swift Dzire</h3>
				        <h4>Rs. 5.53-9.91 Lakh</h4>
				    </div>
			        <button type="button" class="btn site-btn">Get On Road Price</button>
				</div>
			</div> <!-- End Col -->

			<div class="col-sm-6 col-md-3 text-center">
				<div class="used-cars-box">
				    <div class="used-cars-img">
				        <img class="img-responsive" src="https://media.zigcdn.com/media/model/2016/Apr/tata_tiago_320x160.jpg">
				    </div>
				    <div class="used-cars-title">
				        <h3>Maruti Swift Dzire</h3>
				        <h4>Rs. 5.53-9.91 Lakh</h4>
				    </div>
			        <button type="button" class="btn site-btn">Get On Road Price</button>
				</div>
			</div> <!-- End Col -->

			<div class="col-sm-6 col-md-3 text-center">
				<div class="used-cars-box">
				    <div class="used-cars-img">
				        <img class="img-responsive" src="https://media.zigcdn.com/media/model/2016/Jan/hyundai_creta_320x160.jpg">
				    </div>
				    <div class="used-cars-title">
				        <h3>Maruti Swift Dzire</h3>
				        <h4>Rs. 5.53-9.91 Lakh</h4>
				    </div>
			        <button type="button" class="btn site-btn">Get On Road Price</button>
				</div>
			</div> <!-- End Col -->

						
	
					</div>
</div>
</div>

<div class="news-area area-padding">
    <div class="container">
        <div class="row">
		<div class="col-md-12 site-heading ">
						<h2>The most Automobile News</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,  </p>
						<div class="divider"></div>
					</div>
	</div>
	    <div class="row">
	            <div class="col-md-3">
	               <div class="news-box">
	                <div class="news-img">
	                    <img class="img-responsive" src="https://media.zigcdn.com/media/content/2018/Jan/img_0248_300x225.jpg">
	                </div>
	                <div class="news-title">
	                    <h4>Last of the Bugatti EB 110 chassis to spawn SP-110 Edonis supercar</h4>
	                    <p>It’s tough having to say goodbye to a long-termer that has been with us for two years. It is even tougher when that long-termer is something as stellar as the R3</p>
	                </div>
	               </div>
	            </div>
	            <div class="col-md-3">
	               <div class="news-box">
	                <div class="news-img">
	                    <img class="img-responsive" src="https://media.zigcdn.com/media/content/2018/Jan/img_0248_300x225.jpg">
	                </div>
	                <div class="news-title">
	                    <h4>Last of the Bugatti EB 110 chassis to spawn SP-110 Edonis supercar</h4>
	                    <p>It’s tough having to say goodbye to a long-termer that has been with us for two years. It is even tougher when that long-termer is something as stellar as the R3</p>
	                </div>
	               </div>
	            </div>
	            <div class="col-md-3">
	               <div class="news-box">
	                <div class="news-img">
	                    <img class="img-responsive" src="https://media.zigcdn.com/media/content/2018/Jan/img_0248_300x225.jpg">
	                </div>
	                <div class="news-title">
	                    <h4>Last of the Bugatti EB 110 chassis to spawn SP-110 Edonis supercar</h4>
	                    <p>It’s tough having to say goodbye to a long-termer that has been with us for two years. It is even tougher when that long-termer is something as stellar as the R3</p>
	                </div>
	               </div>
	            </div>
	            <div class="col-md-3">
	               <div class="news-box">
	                <div class="news-img">
	                    <img class="img-responsive" src="https://media.zigcdn.com/media/content/2018/Jan/img_0248_300x225.jpg">
	                </div>
	                <div class="news-title">
	                    <h4>Last of the Bugatti EB 110 chassis to spawn SP-110 Edonis supercar</h4>
	                    <p>It’s tough having to say goodbye to a long-termer that has been with us for two years. It is even tougher when that long-termer is something as stellar as the R3</p>
	                </div>
	               </div>
	            </div>
	        
	    </div>
    </div>
</div>


<div class="brand-list-area">
<div class="container">
            <ul class="brand-list list-inline">
              <li><a href="#"><img src="http://livedemo00.template-help.com/wt_58434/images/partner1.png" alt=""></a></li>
              <li><a href="#"><img src="http://static.livedemo00.template-help.com/wt_58434/images/partner2.png" alt=""></a></li>
              <li><a href="#"><img src="http://static.livedemo00.template-help.com/wt_58434/images/partner3.png" alt=""></a></li>
              <li><a href="#"><img src="http://static.livedemo00.template-help.com/wt_58434/images/partner4.png" alt=""></a></li>
              <li><a href="#"><img src="http://static.livedemo00.template-help.com/wt_58434/images/partner5.png" alt=""></a></li>
              <li><a href="#"><img src="http://static.livedemo00.template-help.com/wt_58434/images/partner6.png" alt=""></a></li>
            </ul>
</div>
</div>
<div class="footer-area">
    <div class="footer">
	<div class="container">
		<div class="col-md-4 footer-one">
			<h5>About Us </h5>
		    <p>Cras sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
		    	<div class="social-icons"> 
               <a href="https://www.facebook.com/"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
               <a href="https://twitter.com/"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
	            <a href="https://plus.google.com/"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
	            <a href="mailto:bootsnipp@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
	        </div>	
		</div>
		<div class="col-md-3 footer-two">
		    <h5>Information </h5>
		    <ul>
									<li><a href="maintenance.html">Maintenance Tips</a></li>
									<li><a href="contact.html">Locations</a></li>
									<li><a href="about.html">Testimonials</a></li>
									<li><a href="about.html">Careers</a></li>
									<li><a href="about.html">Partners</a></li>
								</ul>
		</div>
		<div class="col-md-3 footer-three">
		    <h5>Helpful Links </h5>
		    <ul>
									<li><a href="maintenance.html">Maintenance Tips</a></li>
									<li><a href="contact.html">Locations</a></li>
									<li><a href="about.html">Testimonials</a></li>
									<li><a href="about.html">Careers</a></li>
									<li><a href="about.html">Partners</a></li>
								</ul>
		</div>
		<div class="col-md-2 footer-four">
		    <h5>Helpful Links </h5>
		    <ul>
									<li><a href="maintenance.html">Maintenance Tips</a></li>
									<li><a href="contact.html">Locations</a></li>
									<li><a href="about.html">Testimonials</a></li>
									<li><a href="about.html">Careers</a></li>
									<li><a href="about.html">Partners</a></li>
								</ul>
		</div>
		
		<div class="clearfix"></div>
	</div>
</div>
    <div class="footer-bottom">
        <div class="container">
					<div class="row">
						<div class="col-sm-12 text-center ">
							<div class="copyright-text">
								<p>CopyRight © 2017 Digital All Rights Reserved</p>
							</div>
						</div> <!-- End Col -->
						
					</div>
				</div>
    </div>
</div>
<script type="text/javascript">
	  $(function(){
        $(".dropdown").hover(            
          function() {
            $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
            $(this).toggleClass('open');
            $('b', this).toggleClass("caret caret-up");                
          },
          function() {
            $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
            $(this).toggleClass('open');
            $('b', this).toggleClass("caret caret-up");                
          });
      });
</script>
