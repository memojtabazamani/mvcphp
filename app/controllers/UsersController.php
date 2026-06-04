<?php

use core\BaseController;

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
	
	public function register() {
		if($this->request->isPost()) {
				echo $this->request->post('name');
				return;
		}
		$this->view('users/register');
	}
	public function testDb()
	{
		$db = new Database();

		var_dump(
			$db->connection()
		);
	}
}