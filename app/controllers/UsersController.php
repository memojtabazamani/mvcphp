<?php

use core\BaseController;
use core\Response;

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



    public function testDb()
    {
        $user = new User();

        echo '<pre>';

        print_r(
            $user->all()
        );
    }
    public function api() {
        Response::json([
            'status' => true,
            'message' => 'Success']);
    }
}