<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content='A fresh way to shop for, learn about, prepare and enjoy foods of the world.'>
<title><?php echo $title_for_layout; ?></title>
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/themes/smoothness/jquery-ui.css" />
<!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>-->
<link href='http://fonts.googleapis.com/css?family=Rosario:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oregano:400,400italic' rel='stylesheet' type='text/css'>
<!--<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>-->
<?php echo $this->Html->css(array('bootstrap.min.css','css.css','meganizr.css','cakephp_tag_cloud.css')); ?>

<!-- CSS -->

<style type="text/css">
<?php if(isset($user['User']['awning_css'])) : ?> .btn-gb {
 <?php echo $user['User']['awning_css'];
?>
}
.bkgnd-gb {
 <?php echo $user['User']['awning_css'];
?>  opacity: 0.2;
Android 2.1+, Chrome 4+, Firefox 2+, IE 9+, iOS 3.2+, Opera 9+, Safari 3.1+
}
<?php endif;
?>
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<?php echo $this->Html->script(array('bootstrap.min.js','twitter-bootstrap-hover-dropdown.js','js.js','jquery.columnizer.min.js','jquery.bpopup-0.9.3.min.js','jquery.easing.1.3.js','jquery.cj-object-scaler.min.js')); ?>
<?php //echo $this->Html->css('bootstrap.less?','stylesheet/less') ?>
<?php echo $this->App->js(); ?><?php echo $this->fetch('meta'); ?><?php echo $this->fetch('css'); ?><?php echo $this->fetch('script'); ?>
<script type="text/javascript" src="/t/track.php?id=gourmet"></script>

</head>
<body class="sun">
	<div id="page" role="main">
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
			<div class="container">
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
					<?php echo $this->element('nav'); ?> </div>
			</div>
			
			<div class="container wrapper">
				<div id="dialog-info">
				<?php echo $this->Session->flash(); ?>
				</div>
				<!-- CONTENT -->
				<?php echo $this->fetch('content'); ?> </div>
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

	 //Columnizer
	$(function(){
		$('.wide').columnize({width:250});
		//$('.thin').columnize({width:200});
	});

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


	})(jQuery);

</script>
</body>
</html>