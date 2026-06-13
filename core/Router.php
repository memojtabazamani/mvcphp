<?php

use core\Response;

class Router
{
    private array $routes = [];

    public function get(string $path, string $action): void
    {
        $this->routes[] = [
            'path' => $path,
            'action' => $action
        ];
    }

    public function resolve(string $requestUri): void
    {
        foreach ($this->routes as $route) {

            $pattern = preg_replace(
                '/\{[a-zA-Z_][a-zA-Z0-9_]*\}/',
                '([^\/]+)',
                $route['path']
            );

            $pattern = "#^{$pattern}$#";

            if (preg_match($pattern, $requestUri, $matches)) {

                array_shift($matches);

                $this->runAction(
                    $route['action'],
                    $matches
                );

                return;
            }
        }

        Response::notFound();
    }

    private function runAction(string $action, array $params = []): void
    {
        [$controllerName, $methodName] = explode('@', $action);

        require_once __DIR__ . "/../app/controllers/{$controllerName}.php";

        $controller = new $controllerName();

        call_user_func_array(
            [$controller, $methodName],
            $params
        );
    }
}