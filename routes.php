<?php
$router->get('/', 'HomeController@index');
$router->get('/users', 'UsersController@index');
$router->get('/posts', 'PostsController@index');
$router->get('/users/{id}', 'UsersController@show');