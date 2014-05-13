<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!--<meta name="description" content='A fresh way to shop for, learn about, prepare and enjoy foods of the world.'>
-->

<?php
//debug($this->params);
 $here = $this->params['controller'];
 
 //echo($here);
 
 	if ($here == 'categories') : ?>
		<meta name="description" content='<?php echo $category['Category']['metadata']; ?>'
	<?php endif; 

 	if ($here == 'products') : ?>
		<meta name="description" content='<?php echo $user['User']['metadata']; ?>'
	<?php endif; ?>

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
a.btn-gb:hover {
	color:#CCC;
	
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
<!--<script type="text/javascript" src="/t/track.php?id=gourmet"></script>-->

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

   <div id="dialog-info"> <?php echo $this->Session->flash(); ?> </div>
   <!-- CONTENT --> 
   <?php echo $this->fetch('content'); ?>
  
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

</body>
</html>