<?php
	$subDomain = getSubDomain();
	//echo($subDomain);
	echo $subDomain[0];
	$strip = $subDomain[0];
		
	//$strip = $this->here; 
	//echo('<br /> ' . $strip);
	?>
	<script>
	var strip = '<?php echo($strip); ?>'
		//alert(strip);
	</script>
	

<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content='A fresh way to shop for, learn about, prepare and enjoy foods of the world.'>
<title><?php echo $title_for_layout; ?></title>
<!--<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/themes/smoothness/jquery-ui.css" />-->
<link href='http://fonts.googleapis.com/css?family=Rosario:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">

<?php echo $this->Html->css(array('css.css','master.css','responsive.css','mega-menu.css','mega-menu-responsive.css','cakephp_tag_cloud.css')); ?>

<!-- CSS -->

<style type="text/css">
<?php /*?><?php if(isset($user['User']['awning_css'])) : ?><?php */?> .btn-gb {
	background-color:#393767;
<?php /*?><?php echo $user['User']['awning_css'];?><?php */?>
}

a.btn-gb, button.btn.btn-gb i  {
	color:#fff;
}



.bkgnd-gb {
<?php /*?><?php echo $user['User']['awning_css']; ?> <?php */?>
opacity: 0.2;
}
<?php /*?><?php endif; ?><?php */?>
</style>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<?php echo $this->Html->script(array('twitter-bootstrap-hover-dropdown.js','js.js','jquery.bpopup-0.9.3.min.js','jquery.easing.1.3.js','jquery.cj-object-scaler.min.js')); ?>
<?php //echo $this->Html->css('bootstrap.less?','stylesheet/less') ?>
<?php echo $this->App->js(); ?>
<?php echo $this->fetch('meta'); ?>
<?php //echo $this->fetch('css'); ?>
<?php echo $this->fetch('script'); ?>
<script type="text/javascript" src="/t/track.php?id=gourmet"></script>
</head>
<body class="sun <?php  ?>">

<!-- Include Header element --> 
<?php echo $this->element('header'); ?>


<!--<div id="fb-root"></div>-->
<!--<script>
				(function(d, s, id) {
					var js, fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id)) return;
					js = d.createElement(s); js.id = id;
					js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
					fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));
				</script>-->

<!-- Include Nav element --> 
<?php echo $this->element('nav-responsive-works'); ?>


<div class="page container">

<div class="air"></div>

   <div id="dialog-info"> <?php echo $this->Session->flash(); ?> 
   <!-- CONTENT --> 
   <?php echo $this->fetch('content'); ?>
   </div>
</div>

</div>
<?php echo $this->element('footer'); ?>
</div>
</div>
<!-- end outer wrapper --> 

<br /> 
<br />
<?php echo $this->element('sqldump'); ?> <br />
<br />

<!-- IE8 Compatibility --> 
<script src ="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script> 
<script>
	// Drop Down Hover!
	$(document).ready(function() {
		$('.js-activated').dropdownHover(true);
	});

	//Select Customize
	//$('.selectpicker').selectpicker();


	// Pop Up

	// $('#gb_popup').bPopup({
//            speed: 650,
//            transition: 'slideIn'
//        });

// Semicolon (;) to ensure closing of earlier scripting
	// Encapsulation
	// $ is assigned to jQuery
	(function($) {
		
		 // Policies
		$(function() {
			// Binding a click event
			// From jQuery v.1.7.0 use .on() instead of .bind()
			$('#policies').on('click', function(e) {
				// Prevents the default action to be triggered.
				e.preventDefault();
				// Triggering bPopup when click event is fired
				$('#policy_content').bPopup();
			});
		});
		
		 // Story
		 $(function() {
			$('#story').on('click', function(e) {
				e.preventDefault();
				$('#story_content').bPopup()
			});
		});

	//Accordion on hover

		$(".pointer").hover(
			function(){
				var thisdiv = jQuery(this).attr("data-target")
				$(thisdiv).collapse("show");
			},
			function(){
				var thisdiv = jQuery(this).attr("data-target")
				$(thisdiv).collapse("hide");
			}
		);



		//Image scale

		$(function () {
			//$(".product-pic img").each(function () {
//				$(this).cjObjectScaler({
//					method: "fit",
//					fade: 1200
//				});
//			});
			$(".product-pic img").each(function () {
				$(this).cjObjectScaler({
					destElem: $(this).parent().parent(),
					method: "fit",
					fade: 150
				});
			});
			$("#smallObject").each(function () {
				$(this).cjObjectScaler({
					method: "fit",
					fade: 550
				}, function () {
					$("#smallObject").html("Done loading object...<br /><br />(Example of the callback function.)");
				});
			});

			$(".product-pic img").css('display','inline');
		});


	// For active links
	
	
		var newURL = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname;
			var pathArray = window.location.pathname.split( '/' );

			var secondLevelLocation = pathArray[1];
			
					if (secondLevelLocation == 'foods') {
						jQuery('ul.nav li.foods a').addClass('active')
						
					}
					else if (secondLevelLocation == 'recipes'){
						jQuery('ul.nav li.recipes>a').addClass('active')
						
					}
					else if (secondLevelLocation == 'international'){
						 jQuery('ul.nav li.food-region>a').addClass('active')
						
					}	
					else if (secondLevelLocation == 'us'){
						 jQuery('ul.nav li.food-region>a').addClass('active')
						
					}	
				
			
	  //get sub domain
		  
		  var parts = location.hostname.split('.');
		  var subdomain = parts.shift();
		  var upperleveldomain = parts.join('.');
		  
		  var sndleveldomain = parts.slice(-3).join('.');
		  
		  //alert(subdomain);
		  
		  if (subdomain !== 'gwm' && (subdomain !== 'gogowiz' && subdomain !=="" && subdomain !=="www") {
			   jQuery('ul.nav li.vendors>a').addClass('active')						 
		  }

	})(jQuery);

</script>
</body>
</html>