<!doctype html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta charset="utf-8">
<meta name="description" content='A fresh way to shop for, learn about, prepare and enjoy foods of the world.'>
<title><?php echo $title_for_layout; ?></title>


<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Rosario:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oregano:400,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>


 <!-- Stylesheets -->
<?php echo $this->Html->css(array('bootstrap.min.css','homepage.css','mega-menu.css','mega-menu-responsive.css','flexslider.css')); ?> 

<!--/,'mega-menu.css','mega-menu-responsive.css','prettyPhoto.css' -->
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/smoothness/jquery-ui.css" />
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">


  <!-- JS -->
  
  <!-- HTML5 Support for IE -->
  <!--[if lt IE 9]>
  <script src="js/html5shim.js"></script>
  <![endif]-->

  
<!--'jquery.marquee.min.js' -->
<?php //echo $this->App->js(); ?>
<?php //echo $this->fetch('meta'); ?>
<?php //echo $this->fetch('css'); ?>
<?php //echo $this->fetch('script'); ?>
</head>

<body>

	<header>

		<div class="container">
		
			<div class="row">
			
				<div class="col-md-4">
				
					<!-- Logo -->
		
					<div class="logo">
						<a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>">
							<!--<div class="basket"><img src="/img/global/gwm-oval.png"  alt="gourmet basket" width="50%"></div>-->
						</a>
					</div>
					
			</div>
					
					<!-- Search -->	
					<div class="col-md-5 col-md-offset-3">
						<!-- Search form -->
						   <div class="search"> 
								<!-- Search Box --> 
								<?php echo $this->Form->create('Product', array('type' => 'GET', 'class' => 'navbar-form', 'url' => array('controller' => 'products', 'action' => 'search'))); ?> <?php echo $this->Form->input('search', array('label' => false, 'div' => false, 'autocomplete' => 'on')); ?>
								<?php //echo $this->Form->button('<i class="icon-search icon-white"></i> Search', array('div' => false, 'class' => 'btn btn-gb', 'escape' => false)); ?>
								<?php echo $this->Form->end(); ?>
							</div>
					</div>
						
					
					
		
				</div>
						
			</div>
		
		</div>







	
	</header>
	



			
			
			
			<div class="col-md-5 col-md-offset-3">
			
				
				
				<ul class="gwm-horiz-account">
					<li class="cart">
						<button class="cart" type="submit">
						<a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/shops/cart"></i><img src="/img/global/cart.png" width="40" height="29" alt="cart"></a>
						</button>
					</li>
					<li class="social"><a href="https://www.facebook.com/pages/Gourmet-Basket/603379453015040"><img src="/img/global/fb.png" width="28" height="27" alt="facebook"></a></li>
					<li class="social"><a href="https://twitter.com/search/users?q=gourmetbasket1"><img src="/img/global/tw.png" width="28" height="27"></a></li>
					<li class="social"><a href="http://pinterest.com/gourmetbasket1/"><img src="/img/global/pin.png" width="27" height="27" alt="pinterest"></a></li>
					<!--<li class="gwm-account"><a href="/members/register">BECOME A MEMBER</a></li>--> 
					<!-- <li class="gwm-account"><a href="/members/login">LOG IN</a></li>-->
				</ul>



				<div class="hlinks">
					<span>

					<!-- item details with price -->
					<a href="#cart" role="button" data-toggle="modal">3 Item(s) in your <i class="icon-shopping-cart"></i></a> -<span class="bold">$25</span>  

					</span>


					<!-- Login and Register link -->
					<span class="lr"><a href="#login" role="button" data-toggle="modal">Login</a> or <a href="#register" role="button" data-toggle="modal">Register</a></span>

				</div>






			
			</div>




			
				
					<!-- Include Nav element --> 
					<?php echo $this->element('nav-responsive'); ?>
				
			
			
			

	
	<?php //echo $this->element('footer'); ?>
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<?php echo $this->Html->script(array('bootstrap.min.js')); ?> <!-- ,'homepage.js','jquery.bpopup-0.9.3.min.js','twitter-bootstrap-hover-dropdown.js','fitvid.js' -->
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
-->
<!--'jquery.marquee.min.js' -->
<?php //echo $this->App->js(); ?>
<?php //echo $this->fetch('meta'); ?>
<?php //echo $this->fetch('css'); ?>
<?php //echo $this->fetch('script'); ?>


<script>


// Ticker

/**
 * Example of starting a plugin with options.
 * I am just passing all the default options
 * so you can just start the plugin using $('.marquee').marquee();
*/
	//$('.marquee').marquee({
		//speed in milliseconds of the marquee
	//	speed: 8000,
		//gap in pixels between the tickers
	//	gap: 50,
		//gap in pixels between the tickers
	//	delayBeforeStart: 0,
		//'left' or 'right'
	//	direction: 'left'
	//});
	

//$("ul#ticker01").liScroll({travelocity: 0.10});

</script>


<script>
	
	
	$(document).ready(function() {
		
	// Drop Down Hover!	
		
	//  $('.js-activated').dropdownHover(true);
	  
	  //Columnizer
	   // $(function(){
	   // $('.wide').columnize({width:250});
		//$('.thin').columnize({width:200});
   // });
	
	 // Welcome
	 $(function() {
	 
		$('#welcome').on('click', function(e) {
			e.preventDefault();
			$('#welcome_content').bPopup();
	});
});	

		// Google Analytics
	  //(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
//	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
//	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
//	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
//	
//	  ga('create', 'UA-40855494-1', 'gourmetworldmarket.com');
//	  ga('send', 'pageview');

// Heat map - Crazy Egg 
		//setTimeout(function(){var a=document.createElement("script");
//		var b=document.getElementsByTagName("script")[0];
//		a.src=document.location.protocol+"//dnn506yrbagrg.cloudfront.net/pages/scripts/0019/3794.js?"+Math.floor(new Date().getTime()/3600000);
//		a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);


	
});
</script>

</body>
</html>