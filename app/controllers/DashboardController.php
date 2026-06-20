<?php

use core\BaseController;
use core\Response;

require_once __DIR__ . '/../models/User.php';

class DashboardController extends BaseController
{
    public function index()
    {
        $users = [
            'Ali',
            'Reza',
            'Sara'
        ];

        $this->view("dashboard/index", [
            'users' => $users
        ]);
    }
}