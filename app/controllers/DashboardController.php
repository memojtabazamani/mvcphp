<?php

use core\BaseController;
use core\Response;

require_once __DIR__ . '/../models/User.php';

class DashboardController extends BaseController
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

        $this->view("dashboard/index", [
            'users' => $users
        ]);
    }
}