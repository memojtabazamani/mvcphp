<?php
namespace core;
class Session
{
    /**
     * This method will be start session
     */
    public function __construct()
    {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * @param $key
     * @param $value
     * @return void
     *
     * This method will be set session
     */
    public function set(string $key, $value): void {
        $_SESSION[$key] = $value;
    }

    /**
     * @param string $key
     * @param $default
     * @return void
     *
     * This method will be return a session key
     */
    public function get(string $key, $default = null) {
        return $_SESSION[$key] ?? $default;
    }

    /**
     * @param string $key
     * @return void
     *
     * This method will be unset session key
     */
    public function delete(string $key): void {
        unset($_SESSION[$key]);
    }

    /**
     * @param string $key
     * @param $value
     * @return void
     *
     * This method set flash session
     */
    public function flash(string $key, $value): void
    {
        $_SESSION['_flash'][$key] = $value;
    }

    /**
     * @param string $key
     * @param $default
     * @return void
     *
     * This method will be return flash session key
     */
    public function getFlash(string $key, $default = null)
    {
        $value = $_SESSION['_flash'][$key] ?? $default;

        unset($_SESSION['_flash'][$key]);

        return $value;
    }

}