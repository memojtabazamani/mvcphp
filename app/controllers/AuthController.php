<?php

use core\BaseController;
use core\Response;

require_once __DIR__ . '/../models/User.php';

class AuthController extends BaseController
{
    public function login()
    {
        if ($this->request->isPost()) {

            $userModel = new User();

            $user = $userModel->firstWhere("username", $this->request->post("username"));

            if (!$user) {
                die('User not found');
            }

            if (
                $user['password']
                !==
                $this->request->post(
                    'password'
                )
            ) {

                die('Wrong password');
            }
            $userId = $user['id'];
            $_SESSION['user_id']
                = $userId;

                $rememberMe = $this->request->post('remember');

                if($rememberMe) {
                    $token = bin2hex(random_bytes(16));
                    setcookie("remember_token", $token, time() + (86400 * 30), "/");
                    $userModel->update(['remember_token' => $token], " id = $userId");
                }

            Response::redirect(
                '/dashboard'
            );

        }

        $this->view("auth/login");
    }

    /**
     * @return void
     */
    public function logout(): void
    {
        $_SESSION = [];

        session_destroy();

        $this->session->delete('user_id');

        Response::redirect("/");
    }

    public function register()
    {
        if ($this->request->isPost()) {
            $validator = new Validator();
            $isValid = $validator
                ->validate($this->request->all(),
                    [
                        'username' => 'required',
                        'password' => 'required',
                    ]);

            if (!$isValid) {
                $this->session->flash(
                    'errors',
                    $validator->errors()
                );
                $this->session->flash('old',
                    $this->request->all());
                echo "<pre>";

                Response::redirect('/auth/register');
                exit;
            }
            $userModel = new User();

            $user = $userModel->firstWhere(
                'username',
                $this->request->post('username')
            );

            if ($user) {

                die('Email already exists');
            }

            $password = password_hash(
                $this->request->post('password'),
                PASSWORD_DEFAULT
            );

            $userModel->create([
                'username' => $this->request->post('username'),
                'password' => $password,
            ]);

            $this->session->set("user_id", $this->request->post("user_id"));
            Response::redirect("/dashboard");
        }
        $errors = $this->session->getFlash('errors');
        $old = $this->session->getFlash('old');

        $this->view(
            'auth/register',
            compact('errors', 'old')
        );
    }
}