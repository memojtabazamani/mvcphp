<?php
// Load Router Class
require_once "../core/BaseController.php";
require_once '../core/Router.php';
require_once '../core/Request.php';
require_once '../core/Database.php';
// Create an object from Router class
$router = new Router();
$request = new \core\Request();
// Inject All the routes.
require_once '../routes.php';
// Real Url of users!
$requestUri = ($request->uri());

//var_dump($requestUri);
//var_dump($_SERVER['REQUEST_URI']);
//var_dump(PHP_URL_PATH);
//die();
$router->resolve($requestUri);