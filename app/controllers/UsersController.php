<?php

use core\BaseController;

class UsersController extends BaseController
{
    public function index()
    {
        $users = [
            'Ali',
            'Reza',
            'Sara'
        ];

        $this->view("users/index", [
            'users' => $users
        ]);
    }
}