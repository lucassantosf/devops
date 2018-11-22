<?php

use app\classes\Routes;
use app\classes\Uri;

require "../bootstrap.php";

$routes = [
	'/pdo/public'=>'controllers/index.php'
];

$uri = Uri::load();

require Routes::load($routes, $uri);



