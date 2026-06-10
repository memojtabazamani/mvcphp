<?php

use core\BaseController;

require_once __DIR__ . '/../models/User.php';

class UsersController extends BaseController
{
    public function index()
    {
        echo $this->request->get('page');
        return;
        $users = [
            'Ali',
            'Reza',
            'Sara'
        ];

        $this->view("users/index", [
            'users' => $users
        ]);
    }

    public function show($id)
    {
        echo "User ID: {$id}";
    }

    public function register()
    {

        if ($this->request->isPost()) {
            $validator = new Validator();
            $isValid = $validator
                ->validate($this->request->all(),
                    [
                        'name' => 'required',
                        'email' => 'required|email',
                    ]);

            if (!$isValid) {
                $this->session->flash(
                    'errors',
                    $validator->errors()
                );
                $this->session->flash('old',
                    $this->request->all());
                echo "<pre>";

                header('Location: /users/register');
                exit;
            }
            echo "User created";

            return;
        }
        $errors = $this->session->getFlash('errors');
        $old = $this->session->getFlash('old');

        $this->view(
            'users/register',
            compact('errors', 'old')
        );
    }

    public function testDb()
    {
        $user = new User();

        echo '<pre>';

        print_r(
            $user->all()
        );
    }
}