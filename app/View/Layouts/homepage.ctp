<!doctype html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta charset="utf-8">
<meta name="description" content='A fresh way to shop for, learn about, prepare and enjoy foods of the world.'>
<title><?php echo $title_for_layout; ?></title>

<!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Rosario:400,700,400italic,700italic' rel='stylesheet' type='text/css'>


<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>


<!-- Stylesheets -->

<link href='http://fonts.googleapis.com/css?family=Rosario:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">

<?php echo $this->Html->css(array('master.css','responsive.css','mega-menu.css','mega-menu-responsive.css')); ?>  <!-- 'bootstrap-responsive.min.css', -->


<!-- <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"> -->

<!-- JS -->


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

<?php echo $this->Html->script(array('twitter-bootstrap-hover-dropdown.js','homepage.js','jquery.bpopup-0.9.3.min.js')); ?>


<!--'jquery.marquee.min.js' -->
<?php //echo $this->App->js(); ?>
<?php //echo $this->fetch('meta'); ?>
<?php //echo $this->fetch('css'); ?>
<?php //echo $this->fetch('script'); ?>
</head>

<body class="home">
   
   <!-- Include Header element --> 
<?php echo $this->element('header'); ?>   
   
   <!-- Include Nav element --> 
<?php echo $this->element('nav-responsive-works'); ?>
   

				



<div class="page container">



	<div id="gwm-title"> 
        <!--<div class="issue gwm-heading">July - August 2013</div>-->
        <h1 class="title-description center">A fresh way to shop for, learn about, prepare and enjoy foods of the world.</h1>
        <p class="slogan center">Our slogan “Become a World Class Foodie” reflects our committment to help cooks of all kinds, from Moms to chefs, 
            novices to professionals and young to old, expand their tastes, techniques and pantries to enjoy the delicious bounties <a href="#" id="welcome">(more) ...</a></p>
	</div>
    
    <div id="welcome_content" class="col-md-7"> <span class="b-close btn-gb"><span>X</span></span>
        <h2>Welcome to Gourmet World market -<br />The First-Ever World Marketplace and Cultural Cuisine Magazine in one...</h2>
        <hr />
        <div style="text-align:center;position:relative">
            <?php echo $welcome['Content']['body']; ?>
        </div>
    </div>


    <div class="container feature-wrapper">

			<div id="upper">
			
				<div id="myCarousel" class="carousel slide">
					<div class="carousel-inner">
						
						<?php $active = 'active'; ?>
						<?php foreach($contents as $content) : ?>
						<?php if (($content['Content']['active']) == 1) : ?>
                        
						<div class="item <?php echo $active; ?>">
                        
                         <a href="<?php echo ($content['Content']['link']); ?>"> <?php echo $this->Html->image('homepage/sliders/' . $content['Content']['image']); ?> </a>
							<div class="carousel-caption">
                            <h3 class="featured">TODAY'S FEATURED VENDORS</h3>
								<p class="vendor-name"><?php echo $this->Html->link($content['Content']['name'], $content['Content']['link']); ?></p>
								<p class="vendor-info"><?php echo $content['Content']['body']; ?></p><br />
							</div>
							<?php if (($content['Content']['new']) == 1) : ?>
							<div class="new">
								<?php echo $this->Html->image('global/new-icon.png', array(
									'height' => '100',
									'width' => '100',
									));
								?>
							</div>
							<? endif; ?>
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
						<?php echo $this->Text->truncate($gift_product['Product']['name'], 32, array('ellipsis' => '...', 'exact' => 'false')); ?> </a> </div>
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
						<?php echo $this->Text->truncate($us_product['Product']['name'], 32, array('ellipsis' => '...', 'exact' => 'false')); ?> </a> </div>
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
						<?php echo $this->Text->truncate($intl_product['Product']['name'], 32, array('ellipsis' => '...', 'exact' => 'false')); ?> </a> </div>
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
					<a href="http://<?php echo $featurerecipe_object['User']['slug'] ; ?>.<?php echo Configure::read('Settings.DOMAIN'); ?>/recipe/<?php echo $featurerecipe_object['Recipe']['slug'] ; ?>">
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
       <!--<h2 class="feature-label" >Gourmet World Market welcomes our new vendors: </h2>  
       <ul>
          <li>Tonewood Maple</li>
          <li>Eleni's Ethiopian</li> 
       </ul>      -->
       
	</div>
            
  
            
</div>





<?php echo $this->element('footer'); ?>

<!-- ,'homepage.js','jquery.bpopup-0.9.3.min.js','twitter-bootstrap-hover-dropdown.js','fitvid.js' --> 
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
--> 



<script>
    
    $(document).ready(function() {
		
	// Drop Down Hover!
	//$('.js-activated').dropdownHover(true);
      
     
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

  ga('create', 'UA-43074664-1', 'gourmetworldmarket.com');
  ga('send', 'pageview');

	
});

</script>

</body>
</html>