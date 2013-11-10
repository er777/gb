<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content='A fresh way to shop for, learn about, prepare and enjoy foods of the world.'>

<title><?php echo $title_for_layout; ?></title>

<!-- Meganizr Menu Styles -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oregano:400,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]><link href="css/meganizr-ie.css" rel="stylesheet" type="text/css"><![endif]-->
<!-- end Meganizr Menu Styles -->

<?php echo $this->Html->css(array('bootstrap.min.css', 'jquery.vegas.css', 'homepage.css','meganizr.css')); ?>
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<?php echo $this->Html->script(array('bootstrap.min.js','twitter-bootstrap-hover-dropdown.js' ,'jquery.vegas.js', 'homepage.js','jquery.columnizer.min.js','jquery.bpopup-0.9.3.min.js')); ?>
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
    
    
        <div id="header-homepage"> <a href="http://www.<?php echo Configure::read('Settings.DOMAIN'); ?>">
           <div class="basket" style="width:180px"><img src="/img/global/gwm-oval.png" width="180"  alt="gourmet basket"></div>
            
            <div id="account">
            	<ul class="gb-horiz-account">
                   <li class="social"><a href="https://www.facebook.com/pages/Gourmet-Basket/603379453015040"><img src="/img/global/facebook-home.png" width="25" height="25" alt="facebook"></a></li>
                   <li class="social"><a href="https://twitter.com/search/users?q=gourmetbasket1"><img src="/img/global/twitter-home.png" width="25" height="25"></a></li>
                   <li class="social"><a href="http://pinterest.com/gourmetbasket1/"><img src="/img/global/pinterest.png" width="25" height="25" alt="pinterest"></a></li>
                   <!--<li class="gb-account"><a href="/members/register">BECOME A MEMBER</a></li>-->
                   <!-- <li class="gb-account"><a href="/members/login">LOG IN</a></li>-->
            	</ul>
			</div>

            
            
            
            </a>
            <div id="nav-wrapper"> 
                <!-- Include Nav element --> 
                <?php echo $this->element('nav'); ?>
            </div>
			
			
            
        </div>
        
       
        
        <div id="gb-title">
            <!--<div class="issue gb-heading">July - August 2013</div>-->
            <h1 class="title-description center">A fresh way to shop for, learn about, prepare and enjoy foods of the world.</h1>
            <div class="welcome-link"><a href="#" id="welcome"><img src="/img/global/gourmet-basket-jump.png"/></a></div>
        </div>
      
        
    </div>
</div>


</div>
<div class="container">
	

	<?php echo $this->fetch('content'); ?>

</div>

<?php echo $this->element('footer'); ?>
<script>

// Ticker

/**
 * Example of starting a plugin with options.
 * I am just passing all the default options
 * so you can just start the plugin using $('.marquee').marquee();
*/
$('.marquee').marquee({
	//speed in milliseconds of the marquee
	speed: 8000,
	//gap in pixels between the tickers
	gap: 50,
	//gap in pixels between the tickers
	delayBeforeStart: 0,
	//'left' or 'right'
	direction: 'left'
});


//$("ul#ticker01").liScroll({travelocity: 0.10});

</script>
</body>
</html>
