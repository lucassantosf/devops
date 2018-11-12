<?php 
session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;

$app = new Slim();

$app->config('debug', true);

//As rotas ficarem em arquivos diferentes para cada área do site
require_once("site.php");
require_once("admin.php");
require_once("admin-categories.php");
require_once("admin-products.php");
require_once("admin-users.php");
require_once("admin.php");
require_once("functions.php");

$app->run();
?>