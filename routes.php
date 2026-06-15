<?php
$router->get('/', 'HomeController@index');
$router->get('/users', 'UsersController@index');
$router->get('/posts', 'PostsController@index');
$router->get('/users/register', 'UsersController@register');
$router->get('/users/test-db', 'UsersController@testDb');
$router->get('/users/{id}', 'UsersController@show');
$router->get('/users/register', 'UsersController@register');
$router->get(
    '/api/users',
    'UsersController@api'
);
$router->get(
    '/dashboard',
    'DashboardController@index',
    'auth'
);
$router->get('/auth/login', 'AuthController@login');

$_SESSION['user_id'] = 1;