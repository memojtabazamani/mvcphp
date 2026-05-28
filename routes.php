<?php
$router->get('/', 'HomeController@index');
$router->get('/users', 'UsersController@index');
$router->get('/posts', 'PostsController@index');