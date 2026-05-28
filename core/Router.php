<?php
class Router {
    private array $routes = [];

    /**
     * @param $path
     * @param $action
     * @return void
     * For Store Route
     * Example: $router->get('/users', 'UserController@index')
     * If User got to /users must be run UserController@index action
     */
    public function get($path, $action)
    {
        $this->routes[$path] = $action;
    }

    /**
     * @param $requestUri
     * @return void
     * This method will be checked are requested uri stored or not?
     * Example: /users? are store? or not?
     */
    public function resolve($requestUri)
    {
        if(array_key_exists($requestUri, $this->routes)) { // Check!
            echo "Route Found:" . $this->routes[$requestUri];

            return;
        }

        echo "404-Page Not Found";
    }
}