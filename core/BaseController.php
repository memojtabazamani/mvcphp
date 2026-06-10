<?php
namespace core;
class BaseController
{
    protected Request $request;
    protected Session $session;

    public function __construct()
    {
        $this->request = new Request();
        $this->session = new Session();
    }

    /**
     * @param string $view
     * @param array $data
     * @return void
     *
     * This method will be rendered of view
     *
     * Usage in Controllers
     * $this->view('users/index', [['users' => ['Jackson']])
     * We want to have $users on $view!
     */
    protected function view(string $view, array $data = []): void
    {
        // This function convert $data to variable!
        extract($data);

        require_once "../app/views/" . $view . ".php";
    }
}