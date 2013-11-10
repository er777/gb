<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $title_for_layout; ?></title>
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/themes/smoothness/jquery-ui.css" />
<!--<link href="http://fonts.googleapis.com/css?family=Mako" rel="stylesheet" type="text/css">-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<!--<link href='http://fonts.googleapis.com/css?family=Simonetta:400,400italic' rel='stylesheet' type='text/css'>-->
<link href='http://fonts.googleapis.com/css?family=Oregano:400,400italic' rel='stylesheet' type='text/css'>
<?php //echo $this->Html->css(array('bootstrap.min.css','css.css','meganizr.css','cakephp_tag_cloud.css')); ?>

<!------ CSS ------>

<style>
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

ul#productGrid {
	 display: block;
	 width: 100%;
	 height: auto;
	 margin: 0;
	 padding: 0;
	 list-style: none;
}
ul#productGrid li {
	display: block;
	width: 110px;
	height: 110px;
	border: 1px solid #ccc;
	float: left;
	margin-right: 10px;
	margin-bottom: 10px;
	/*overflow: hidden;*/
}
ul#productGrid li a {
	border: 0;
}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"/></script>
<script type="text/javascript" src="/js/jquery.cj-object-scaler.min.js"/></script>
<?php //echo $this->Html->script(array('bootstrap.min.js','twitter-bootstrap-hover-dropdown.js','js.js','jquery.columnizer.min.js','jquery.bpopup-0.9.3.min.js','jquery.easing.1.3.js','jquery.cj-object-scaler.min.js')); ?>
<?php //echo $this->Html->css('bootstrap.less?','stylesheet/less') ?>
<?php //echo $this->App->js(); ?>
<?php //echo $this->fetch('meta'); ?>
<?php //echo $this->fetch('css'); ?>
<?php //echo $this->fetch('script'); ?>
<script type="text/javascript" src="/t/track.php?id=gourmet"></script>
<script>

		//Image scale
	
$(function () {
    $(".product img").each(function () {
        $(this).cjObjectScaler({
            method: "fit",
            fade: 1200
        });
    });
    $(".productLink img").each(function () {
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
});	
		
		
	
</script>
</head>
<body>
<div id="outer-wrapper">
	<div id="header">
		<div class="social-main"> <a href="https://www.facebook.com/pages/Gourmet-Basket/603379453015040"><img src="/img/global/facebook.png" width="29" height="30" alt="facebook"></a> <a href="https://twitter.com/search/users?q=gourmetbasket1"><img src="/img/global/twitter.png" width="30" height="30"></a> </div>
		<a href="http://www.<?php //echo Configure::read('Settings.DOMAIN'); ?>">
		<div class="basket"><img src="/img/global/basket.png" width="76" height="76" alt="gourmet basket"></div>
		</a>
		<div id="nav-wrapper"> 
			<!-- Include Nav element -->
			<?php //echo $this->element('nav'); ?>
		</div>
	</div>
	<div class="container content" style="margin:auto;width:300px;">
		
		
		
		<ul id="productGrid" >
			<li class="product"><img src="/img/products/image/11866.jpg" alt="Farmers Style Egg Spaetzle" /></li>
			<li class="product"><img src=" http://stopsellingvanillaicecream.com/wp-content/uploads/2013/03/Hat.png" alt="Hat" /></li>
			
			<li class="product"><img src=" http://blogs.glam.com/glamchic/files/2008/10/coat.jpg" alt="Coat" /></li>
			<li class="productLink"><a href="demo1.cfm"><img src=" http://www.bunnyslippers.com/gfx/products/classic-bunny-slippers-2-lg.jpg" alt="Bunny Slippers" /></a></li>
			<li class="productLink"><a href="http://kartika.gbnew.dev/product/176-thousand-layer-regular-vanilla-roll"><img src="/img/products/image/176.jpg" alt="Thousand-Layer Regular Vanilla Roll " /></a></li>
			<li class="productLink">
			<a href="http://heirloomcoffee.gbnew.dev/product/1525-tam-chau-flower-oolong-tea"><img src="/img/products/image/1525.jpg" alt="Tam Chau “Flower” Oolong Tea, Loose" /></a></li>
			
		</ul>
		
		
	</div>
	<?php //echo $this->element('footer'); ?>
</div>
</div>
<!-- end outer wrapper --> 

<br />
<br />
<?php //echo $this->element('sqldump'); ?>
<br />
<br />
</body>
</html>