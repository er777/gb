<!doctype html>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content='A fresh way to shop for, learn about, prepare and enjoy foods of the world.'>
<title><?php echo $title_for_layout; ?></title>

<!-- Meganizr Menu Styles -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Rosario:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oregano:400,400italic' rel='stylesheet' type='text/css'>

<!--[if lt IE 9]><link href="css/meganizr-ie.css" rel="stylesheet" type="text/css"><![endif]-->
<!-- end Meganizr Menu Styles -->

<?php echo $this->Html->css(array('bootstrap.min.css','bootstrap-responsive.min.css','homepage.css','meganizr.css')); ?>
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<?php echo $this->Html->script(array('bootstrap.min.js','twitter-bootstrap-hover-dropdown.js','homepage.js','jquery.columnizer.min.js','jquery.bpopup-0.9.3.min.js')); ?>
<!--'jquery.marquee.min.js' -->
<?php //echo $this->App->js(); ?>
<?php //echo $this->fetch('meta'); ?>
<?php //echo $this->fetch('css'); ?>
<?php //echo $this->fetch('script'); ?>
<script>
    // Drop Down Hover!
    $(document).ready(function() {
      $('.js-activated').dropdownHover(true);
      
      //Columnizer
        $(function(){
        $('.wide').columnize({width:250});
        //$('.thin').columnize({width:200});
    });
    
     // Welcome
     $(function() {
     
        $('#welcome').on('click', function(e) {
            e.preventDefault();
            $('#welcome_content').bPopup();
    });
});	

		// Google Analytics
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-40855494-1', 'gourmetworldmarket.com');
	  ga('send', 'pageview');



	
});
</script>
</head>

<body>
<section id="page" role="main">
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
				fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));
			</script>
	<div id="infinite-background">
	
		<div class="container">
		
			<div id="header-top"> <a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>">
			
				<div class="basket"><img src="/img/global/gwm-oval.png"  alt="gourmet basket"></div></a>
				
				<div id="account">
					<span class="search">
								<!-- Search Box -->
								<?php echo $this->Form->create('Product', array('type' => 'GET', 'class' => 'navbar-form', 'url' => array('controller' => 'products', 'action' => 'search'))); ?>
								<?php echo $this->Form->input('search', array('label' => false, 'div' => false, 'autocomplete' => 'on')); ?>
								<?php //echo $this->Form->button('<i class="icon-search icon-white"></i> Search', array('div' => false, 'class' => 'btn btn-gb', 'escape' => false)); ?>
								<?php echo $this->Form->end(); ?>
							
					</span>
					<ul class="gb-horiz-account">
						
						<li class="cart"><button class="btn btn-global cart" type="submit"> <a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/shops/cart"><i class="icon-shopping-cart icon-white"></i></a></button></li>
						<li class="social"><a href="https://www.facebook.com/pages/Gourmet-Basket/603379453015040"><img src="/img/global/fb.png" width="28" height="27" alt="facebook"></a></li>
						<li class="social"><a href="https://twitter.com/search/users?q=gourmetbasket1"><img src="/img/global/twitter.png" width="28" height="27"></a></li>
						<li class="social"><a href="http://pinterest.com/gourmetbasket1/"><img src="/img/global/pinterest.png" width="27" height="27" alt="pinterest"></a></li>
						<!--<li class="gb-account"><a href="/members/register">BECOME A MEMBER</a></li>--> 
						<!-- <li class="gb-account"><a href="/members/login">LOG IN</a></li>-->
					</ul>
				</div>
				
			</div>
				
			<div id="header-nav">
				<div id="nav-wrapper">
					<!-- Include Nav element --> 
					<?php echo $this->element('nav'); ?>
				</div>
			</div>
			
			<div id="gb-title"> 
				<!--<div class="issue gb-heading">July - August 2013</div>-->
				<h1 class="title-description center">A fresh way to shop for, learn about, prepare and enjoy foods of the world.</h1>
				<p class=" center">Our slogan “Become a World Class Foodie” reflects our committment to help cooks of all kinds, from Moms to chefs, 
novices to professionals and young to old, expand their tastes, techniques and pantries to enjoy the delicious bounties <a href="#" id="welcome">(more) ...</a></p>
				
			</div>
			
			<div id="welcome_content">
				 <span class="b-close btn-gb"><span>X</span></span>
				<h2 style="text-align:center">Welcome to Gourmet Basket &ndash; the First-Ever World Marketplace and Cultural Cuisine Magazine in One..</h2>
				<hr />
				<div style="text-align:center;position:relative">
					<div id="welcome-bkngd">
						<img src="/img/homepage/markets.png" width="704" height="657">
					 </div>
					<?php echo $welcome['Content']['body']; ?>
            </div>
           
        </div>
			
			
			
		</div>
	</div>
	</div>
	
	<div class="container">
	
		<div id="upper">
		
			<div id="myCarousel" class="carousel slide">
					
					<div class="carousel-inner">
					<?php $active = 'active'; ?>
					<?php foreach($contents as $content) : ?>
					
					<?php if (($content['Content']['active']) == 1) : ?>
			
						<div class="item <?php echo $active; ?>">
						
							<a href="<?php echo ($content['Content']['link']); ?>">
							<?php echo $this->Html->image('homepage/sliders/' . $content['Content']['image']); ?>
							</a>
			
							<div class="carousel-caption">
								<h1><?php echo $this->Html->link($content['Content']['name'], $content['Content']['link']); ?></h1>
								<?php echo $content['Content']['body']; ?>
								<br />
			
							</div>
						</div>
					<?php endif ; ?>    
						
					<?php $active = ''; ?>
					<?php endforeach; ?>
			
					</div>
			
					<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
					<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
				</div>
		
		</div>	
	





	<?php
		$i = 0;
		foreach ($products as $product):
		$i++;
		//if (($i % 4) == 0) { echo "\n<div class=\"row\">\n\n";}
	?>
	<div class="span2">

		<div class="content-product">
			
				<?php echo $this->Html->image('products/image/' . $product['Product']['image'], array('class' =>'show','url' => array('subdomain' => $product['User']['slug'], 'controller' => 'products', 'action' => 'view', 'id' => $product['Product']['id'], 'slug' => $product['Product']['slug']), 'alt' => $product['Product']['name'])); ?>
				<div class="product-name">
					<a href="/product/<?php echo ($product['Product']['id'].'-'.$product['Product']['slug']);?>">
					<?php echo $this->Text->truncate($product['Product']['name'], 36, array('ellipsis' => '...', 'exact' => 'false')); ?>
					</a>
				</div>
			</div>
			<div class="price">$<?php echo $product['Product']['price']; ?></div>
			
		</div>
	</div>
	<?php
	if (($i % 5) == 0) {
		echo "</div>\n\n\t\t<div class=\"row product\">\n\n";
	}
	endforeach;
	?>





	
	
	
	
<h2 class="feature-label">PANTRY FOODS</h2>
		<div class="feature-row">
			<div class="feature"><?php ?>						</div>
			<div class="feature">2</div>
			<div class="feature">3</div>
			<div class="feature">4</div>
			<div class="feature">5</div>
		</div>
<h2 class="feature-label">REGIONAL FOODS</h2>
		<div class="feature-row">
			<div class="feature">1</div>
			<div class="feature">2</div>
			<div class="feature">3</div>
			<div class="feature">4</div>
			<div class="feature">5</div>

		</div>
<h2 class="feature-label">INTERNATIONAL SELECTIONS</h2>
		<div class="feature-row">
			<div class="feature">1</div>
			<div class="feature">2</div>
			<div class="feature">3</div>
			<div class="feature">4</div>
			<div class="feature">5</div>
		</div>
<h2 class="feature-label">FEATURED RECIPES</h2>
		<div class="feature-row">
			<div class="feature">1</div>
			<div class="feature">2</div>
			<div class="feature">3</div>
			<div class="feature">4</div>
			<div class="feature">5</div>
		</div>

			
</div>	

</section>

	<?php echo $this->element('footer'); ?> 
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
</body>
</html>
