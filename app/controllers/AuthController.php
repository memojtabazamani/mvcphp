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

            $_SESSION['user_id']
                = $user['id'];

            Response::redirect(
                '/dashboard'
            );

        }

        $this->view("auth/login");
    }
}