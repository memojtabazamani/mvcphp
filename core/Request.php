<?php
namespace core;
class Request
{
    /*
     * How to use?
     * $request = new Request();
     * $page = $request->get('page', 1);
     *
     * In url: /users?page=5
     * echo $request->get('page');
     * Will return 5;
     */

    /**
     * @param string $key
     * @param $default
     * @return mixed|null
     */
    public function get(string $key, $default = null)
    {
        return $_GET[$key] ?? $default;
    }

    /**
     * @param string $key
     * @param $default
     * @return mixed|null
     */
    public function post(string $key, $default = null)
    {
        return $_POST[$key] ?? $default;
    }

    /**
     * @return string
     */
    public function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @return string
     */
    public function uri(): string
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    /**
     * @return array
     *
     * Example:
     * print_r($request->all());
     *
     */
    public function all(): array
    {
        return array_merge($_GET, $_POST);
    }

    public function isPost(): bool
    {
        return  $this->method() === 'POST';
    }
}