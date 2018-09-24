<?php

require_once("vendor/autoload.php");
use Rain\Tpl;

$app = new \Slim\Slim();

$app->get('/', function(){	
	// config
	$config = array(
	    "tpl_dir"       => "tpl/",
	    "cache_dir"     => "cache/"
	);
	Tpl::configure( $config );
	// create the Tpl object
	$tpl = new Tpl;
	// assign a variable
	$tpl->assign( "name", "Obi Wan Kenoby" );
	$tpl->assign( "version", PHP_VERSION );
	// assign an array
	//$tpl->assign( "week", array( "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday" ) );
	// draw the template
	$tpl->draw( "index" );
});

$app->get('/hello/:name', function ($name) {
    echo "Hello, " . $name;
});

$app->run();

?>