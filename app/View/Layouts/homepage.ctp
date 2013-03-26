<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $title_for_layout; ?></title>

<!-- Meganizr Menu Styles -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="http://fonts.googleapis.com/css?family=Play" rel="stylesheet" type="text/css">
<link href="css/meganizr.css" rel="stylesheet" type="text/css">
<!--[if lt IE 9]><link href="css/meganizr-ie.css" rel="stylesheet" type="text/css"><![endif]-->
<!-- end Meganizr Menu Styles -->




<?php echo $this->Html->css(array('bootstrap.min.css', 'jquery.vegas.css', 'homepage.css','meganizr.css')); ?>
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

<?php echo $this->Html->script(array('bootstrap.min.js','twitter-bootstrap-hover-dropdown.js' ,'jquery.vegas.js', 'homepage.js','jquery.li-scroller.1.0.js','jquery.columnizer.min.js')); ?>
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
		});
	</script>



</head>

<body>

<div id="infinite-background">



<div class="container">
	<div id="header-magazine"></div>
	<div id="left-header">&nbsp;</div>
	<!--<div id="right-header">&nbsp;</div>-->
	
<!-- Include Nav element -->	
<?php echo $this->element('nav'); ?>

	
	

	<!--<div id="account">
		<ul class="gb-horiz-account">
			<li class="gb-account"><a href="/members/register">BECOME A MEMBER</a></li>
			<li class="gb-account"><a href="/members/login">LOG IN</a></li>
		</ul>
	</div>-->

	<div id="gb-title"> <img src="img/global/gb-title.png" width="1200" height="160" alt="gourmet-basket" />
		<div class="title-description">A new way to learn about, shop for, prepare and enjoy foods of all kinds..</div>
	</div>

</div>



<div class="container">

	<?php echo $this->fetch('content'); ?>

</div>

<div id="footer">

</div>

</div>

<script>

	// Ticker
	$("ul#ticker01").liScroll({travelocity: 0.15});

</script>
</body>
</html>
