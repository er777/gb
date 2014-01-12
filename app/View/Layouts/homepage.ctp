<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content='A fresh way to shop for, learn about, prepare and enjoy foods of the world.'>
<title><?php echo $title_for_layout; ?></title>

<!-- Meganizr Menu Styles -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Rosario:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oregano:400,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>

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
</head>

<body>
	<div id="page" role="main" class="container">
		<div id="fb-root"></div>
		<!--<script>
			(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
			</script>-->
		<div id="header-background">
			<div class="container navigation">
				<div id="header-top"> <a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>">
					<div class="basket"><img src="/img/global/gwm-oval.png"  alt="gourmet basket"></div>
					</a>
					<div id="account">
						<div class="search"> 
							<!-- Search Box --> 
							<?php echo $this->Form->create('Product', array('type' => 'GET', 'class' => 'navbar-form', 'url' => array('controller' => 'products', 'action' => 'search'))); ?> <?php echo $this->Form->input('search', array('label' => false, 'div' => false, 'autocomplete' => 'on')); ?>
							<?php //echo $this->Form->button('<i class="icon-search icon-white"></i> Search', array('div' => false, 'class' => 'btn btn-gb', 'escape' => false)); ?>
							<?php echo $this->Form->end(); ?> </div>
						<ul class="gb-horiz-account">
							<li class="cart">
								<button class="cart" type="submit">
								<a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>/shops/cart"></i><img src="/img/global/cart.png" width="40" height="29" alt="cart"></a>
								</button>
							</li>
							<li class="social"><a href="https://www.facebook.com/pages/Gourmet-Basket/603379453015040"><img src="/img/global/fb.png" width="28" height="27" alt="facebook"></a></li>
							<li class="social"><a href="https://twitter.com/search/users?q=gourmetbasket1"><img src="/img/global/tw.png" width="28" height="27"></a></li>
							<li class="social"><a href="http://pinterest.com/gourmetbasket1/"><img src="/img/global/pin.png" width="27" height="27" alt="pinterest"></a></li>
							<!--<li class="gb-account"><a href="/members/register">BECOME A MEMBER</a></li>--> 
							<!-- <li class="gb-account"><a href="/members/login">LOG IN</a></li>-->
						</ul>
					</div>
				</div>
				
			<div id="header-nav">
				<div id="nav-wrapper"> 
					<!-- Include Nav element --> 
					<?php echo $this->element('nav-work'); ?> </div>
				</div>
			
			<div id="gb-title"> 
				<!--<div class="issue gb-heading">July - August 2013</div>-->
				<h1 class="title-description center">A fresh way to shop for, learn about, prepare and enjoy foods of the world.</h1>
				<p class=" center">Our slogan “Become a World Class Foodie” reflects our committment to help cooks of all kinds, from Moms to chefs, 
					novices to professionals and young to old, expand their tastes, techniques and pantries to enjoy the delicious bounties <a href="#" id="welcome">(more) ...</a></p>
			</div>
			
			<div id="welcome_content"> <span class="b-close btn-gb"><span>X</span></span>
				
					<h2 style="text-align:center;font-size:25px">The Marketplace to Explore and Experience Global Cuisines and Cultures</h2>
					<hr />
					<div style="text-align:center;position:relative">
						<div id="welcome-bkngd"> <img src="/img/homepage/markets.png" width="704" height="657">
					</div>
						<?php echo $welcome['Content']['body']; ?>
					</div>
				</div>
			</div>
		
		<div class="container feature-wrapper">
			<div id="upper">
				<div id="myCarousel" class="carousel slide">
					<div class="carousel-inner">
						<div class="carousel-title">TODAY'S FEATURED VENDORS</div>
						<?php $active = 'active'; ?>
						<?php foreach($contents as $content) : ?>
						<?php if (($content['Content']['active']) == 1) : ?>
						<div class="item <?php echo $active; ?>"> <a href="<?php echo ($content['Content']['link']); ?>"> <?php echo $this->Html->image('homepage/sliders/' . $content['Content']['image']); ?> </a>
							<div class="carousel-caption">
								<h1><?php echo $this->Html->link($content['Content']['name'], $content['Content']['link']); ?></h1>
								<?php echo $content['Content']['body']; ?> <br />
							</div>
						</div>
						<?php endif ; ?>
						<?php $active = ''; ?>
						<?php endforeach; ?>
					</div>
					<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a> <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a> </div>
			</div>
			
			<div class="container feature-block">
			
			<h2 class="feature-label">SEASONAL AND GIFT IDEAS</h2>
			<div class="feature-row">
				<?php $i=1;
				foreach ($gift_products as $gift_product):
			?>
				<!--- One product -->
				<div class="feature"> <?php echo $this->Html->image('products/image/' . $gift_product['Product']['image'], array(
						'alt' => $gift_product['Product']['name'],
						'class' =>'show',
						'url' => array(
							'subdomain' => $gift_product['User']['slug'],
							'controller' => 'products',
							'action' => 'view',
							'id' => $gift_product['Product']['id'],
							'slug' => $gift_product['Product']['slug']),
						 ));
					?>
					<div class="feature-product-name"> 
						<!--<a href="/product/<?php //echo ($product['Product']['id'].'-'.$product['Product']['slug']);?>">--> 
						<?php echo $this->Text->truncate($gift_product['Product']['name'], 36, array('ellipsis' => '...', 'exact' => 'false')); ?> </a> </div>
					<div class="feature-price">$<?php echo $gift_product['Product']['price']; ?></div>
					<?php $i++; ?>
				</div>
				<!-- End product -->
				
				<?php if ($i > 5) break;
							endforeach;
						?>
			</div>
			
			<h2 class='feature-label'>US FOODS</h2>
			<div class="feature-row">
				<?php $i=1;
				foreach ($us_products as $us_product):
			?>
				<!--- One product -->
				<div class="feature"> <?php echo $this->Html->image('products/image/' . $us_product['Product']['image'], array(
							'alt' => $us_product['Product']['name'],
							'class' =>'show',
							'url' => array(
								'subdomain' => $us_product['User']['slug'],
								'controller' => 'products',
								'action' => 'view',
								'id' => $us_product['Product']['id'],
								'slug' => $us_product['Product']['slug']),
							 ));
						?>
					<div class="feature-product-name"> 
						<!--<a href="/product/<?php //echo ($product['Product']['id'].'-'.$product['Product']['slug']);?>">--> 
						<?php echo $this->Text->truncate($us_product['Product']['name'], 36, array('ellipsis' => '...', 'exact' => 'false')); ?> </a> </div>
					<div class="feature-price">$<?php echo $us_product['Product']['price']; ?></div>
					<?php $i++; ?>
				</div>
				<!-- End product -->
				
				<?php if ($i > 5) break;
							endforeach;
						?>
			</div>
			
			<h2 class="feature-label">INTERNATIONAL FOODS</h2>
			<div class="feature-row">
				<?php $i=1;
				foreach ($intl_products as $intl_product):
			?>
				<!--- One product -->
				<div class="feature"> <?php echo $this->Html->image('products/image/' . $intl_product['Product']['image'], array(
							'alt' => $intl_product['Product']['name'],
							'class' =>'show',
							'url' => array(
								'subdomain' => $intl_product['User']['slug'],
								'controller' => 'products',
								'action' => 'view',
								'id' => $intl_product['Product']['id'],
								'slug' => $intl_product['Product']['slug']),
							 ));
						?>
					<div class="feature-product-name"> 
						<!--<a href="/product/<?php //echo ($product['Product']['id'].'-'.$product['Product']['slug']);?>">--> 
						<?php echo $this->Text->truncate($intl_product['Product']['name'], 36, array('ellipsis' => '...', 'exact' => 'false')); ?> </a> </div>
					<div class="feature-price">$<?php echo $intl_product['Product']['price']; ?></div>
					<?php $i++; ?>
				</div>
				<!-- End product -->
				
				<?php if ($i > 5) break;
							endforeach;
						?>
			</div>
			
	<h2 class="feature-label">FEATURED RECIPES</h2>
			<div class="feature-row">
				<?php $i=1;
				foreach ($featurerecipe_objects as $featurerecipe_object):
			?>
				<!--- One product -->
				<div class="feature-recipe">
					<a href="http://<?php echo $featurerecipe_object['User']['slug'] ; ?>.gourmetworldmarket.com/recipe/<?php echo $featurerecipe_object['Recipe']['slug'] ; ?>">
						<?php echo $this->Html->image('recipes/image_1/' . $featurerecipe_object['Recipe']['image_1']); ?></a>
					<div class="feature-recipe-name"> 
						<!--<a href="/product/<?php //echo ($product['Product']['id'].'-'.$product['Product']['slug']);?>">--> 
						<?php echo $this->Text->truncate($featurerecipe_object['Recipe']['name'], 36, array('ellipsis' => '...', 'exact' => 'false')); ?> </a> </div>
					<?php $i++; ?>
				</div>
				<?php if ($i > 4) break;
					endforeach;
			?>
			</div>

			</div>
		</div>

</div>	
	
	<?php echo $this->element('footer'); ?>
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<?php echo $this->Html->script(array('bootstrap.min.js','homepage.js','jquery.bpopup-0.9.3.min.js','twitter-bootstrap-hover-dropdown.js','fitvid.js')); ?>
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
    // Drop Down Hover!
    $(document).ready(function() {
      $('.js-activated').dropdownHover(true);
      
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
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-40855494-1', 'gourmetworldmarket.com');
	  ga('send', 'pageview');

// Heat map - Crazy Egg 
		setTimeout(function(){var a=document.createElement("script");
		var b=document.getElementsByTagName("script")[0];
		a.src=document.location.protocol+"//dnn506yrbagrg.cloudfront.net/pages/scripts/0019/3794.js?"+Math.floor(new Date().getTime()/3600000);
		a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);


	
});
</script>

</body>
</html>