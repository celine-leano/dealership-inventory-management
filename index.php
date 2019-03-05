<?php
	/**
	 * Celine Leano and Adolfo Gonzalez
	 * 2/10/2019
	 * 328/final-project/index.php
	 * Fat-Free Routing
	 */
	
	// turn on error reporting
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	
	// require autoload
	require_once('vendor/autoload.php');
	
	// create an instance of the Base class
	$f3=Base::instance();
	
	// turn on Fat-Free error reporting
	$f3->set('DEBUG',3);
	
	// department array
	$f3->set("departments",
		["detail"   =>"Detail","inspection"=>"Inspection","inventoried"=>"Inventoried","photo-area"=>"Photo Area",
		 "paint"    =>"Paint","reconditioning"=>"Reconditioning","ready-for-sale"=>"Ready For Sale","sales"=>"Sales",
		 "service"  =>"Service","sold"=>"Sold","waiting-for-parts"=>"Waiting For Parts","wash"=>"Wash",
		 "wholesale"=>"Wholesale"]);
	
	// define a default route
	$f3->route('GET|POST /',function($f3)
	{
		$f3->set("title","Inventory Management");
		
		$template=new Template();
		echo $template->render("views/home.html");
	});
	
	// define login route
	$f3->route('GET|POST /login',function($f3)
	{
		$f3->set("title","Employee Login");
		
		$template=new Template();
		echo $template->render("views/login.html");
	});
	
	// define route for input stock number after logging in
	$f3->route('GET|POST /stock',function($f3)
	{
		$f3->set("title","Enter Stock Number");
		
		$template=new Template();
		echo $template->render("views/stock.html");
	});
	
	// define live board route
	$f3->route('GET /live',function($f3)
	{
		$f3->set("title","Live Board");
		
		$template=new Template();
		echo $template->render("views/live.html");
	});
	
	// define route to admin login
	$f3->route('GET|POST /admin',function($f3)
	{
		$f3->set("title","Admin Login");
		
		$template=new Template();
		echo $template->render("views/admin-login.html");
	});
	
	// define route to admin tools
	$f3->route('GET|POST /admin/tools',function($f3)
	{
		$f3->set("title","Admin Tools");
		
		$template=new Template();
		echo $template->render("views/admin-tools.html");
	});
	
	// define route to admin add car
	$f3->route('GET|POST /admin/add',function($f3)
	{
		$f3->set("title","Admin - Add a Vehicle");
		
		$template=new Template();
		echo $template->render("views/admin-add.html");
	});
	
	// run fat free
	$f3->run();