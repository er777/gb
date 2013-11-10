<?php

	App::uses('SubdomainRoute', 'Route');

	function getSubDomain() {
		$url = explode('.', env('HTTP_HOST'));
		return $url;
	}
	$subDomain = getSubDomain();

	if($subDomain[0] != 'www' && isset($subDomain[2])) {
		Router::connect('/', array('controller' => 'products', 'action' => 'index'));
	} else {
		Router::connect('/', array('controller' => 'contents', 'action' => 'homepage'));
	}

	Router::connect('/magazine', array('controller' => 'contents', 'action' => 'magazine'));

	Router::connect('/product/:id-:slug', array('controller' => 'products', 'action' => 'view'), array('pass' => array('id', 'slug'), 'id' => '[0-9]+', 'routeClass' => 'SubdomainRoute'));

	Router::connect('/category/:slug', array('controller' => 'products', 'action' => 'category'), array('pass' => array('slug'), 'routeClass' => 'SubdomainRoute'));
	Router::connect('/category/*', array('controller' => 'products', 'action' => 'category'), array('routeClass' => 'SubdomainRoute'));

	//Router::connect('/subcategory/:slug', array('controller' => 'products', 'action' => 'subcategory'), array('pass' => array('slug'), 'routeClass' => 'SubdomainRoute'));

	//Router::connect('/subsubcategory/:slug', array('controller' => 'products', 'action' => 'subsubcategory'), array('pass' => array('slug'), 'routeClass' => 'SubdomainRoute'));

	Router::connect('/foods/*', array('controller' => 'categories', 'action' => 'view'), array('pass' => array('slug'), 'routeClass' => 'SubdomainRoute'));

	Router::connect('/admin', array('controller' => 'users', 'action' => 'dashboard', 'admin' => true));

	Router::connect('/vendor', array('controller' => 'users', 'action' => 'dashboard', 'vendor' => true));
	
	Router::connect('/cat/*', array('controller' => 'products', 'action' => 'view'));

	Router::connect('/us/:slug', array('controller' => 'ustraditions', 'action' => 'view'), array('pass' => array('slug')));

	Router::connect('/international/:slug', array('controller' => 'traditions', 'action' => 'view'), array('pass' => array('slug')));
	
	
	Router::connect('/recipe/:slug', array('controller' => 'recipes', 'action' => 'view'), array('pass' => array('slug'), 'routeClass' => 'SubdomainRoute'));
	// Article landing page routing
	Router::connect('/articles/:block/*', array('controller' => 'articles', 'action' => 'index'), array('pass' => array('block','slug')));

	// Router::connect(
	// 	'/recipe/:short_name/:slug',
	// 	array(
	// 		'controller' => 'recipes',
	// 		'action' => 'view'
	// 	),
	// 	array(
	// 		'pass' => array('slug')
	// 	)
	// );

	Router::connect(
		'/article/:year/:month/:day/:slug',
		array(
			'controller' => 'articles',
			'action' => 'view'
		),
		array(
			'pass' => array(
				'slug',
			)
		)
	);

	

	Router::connect('/mailchimp.rss', array('controller' => 'products', 'action' => 'mailchimp'));

	Router::connect('/sitemap.xml', array('controller' => 'products', 'action' => 'sitemap'));


	Router::connect('/info/:slug', array('controller' => 'pages', 'action' => 'view'), array('pass' => array('slug')));


	//Members - Sign Me Up

	//Router::connect('/register', array('controller' => 'members', 'action' => 'register'));
//
//	Router::connect('/activate', array('controller' => 'members', 'action' => 'activate'));
//
//	Router::connect('/activate/:activation_code', array('controller' => 'members', 'action' => 'activate'), array('pass' => 'activation_code'));
//
//	Router::connect('/forgotten_password', array('controller' => 'members', 'action' => 'forgotten_password'));
//
//	Router::connect('/forgotten_password/:password_reset', array('controller' => 'members', 'action' => 'forgotten_password'), array('pass' => 'password_reset_code'));
//
//	Router::connect('/login', array('controller' => 'members', 'action' => 'login'));
//
//	Router::connect('/logout', array('controller' => 'members', 'action' => 'logout'));
//

	include APP . 'Plugin' . DS . 'Blogg' . DS . 'Config' . DS . 'routes.php';

	CakePlugin::routes();

	require CAKE . 'Config' . DS . 'routes.php';


