<?php
// Load Router Class
require_once '../core/Router.php';
// Create an object from Router class
$router = new Router();
// Inject All the routes.
require_once '../routes.php';
// Real Url of users!
$requestUri = $_SERVER['REQUEST_URI'];

$router->resolve($requestUri);