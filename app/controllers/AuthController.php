<?php

use core\BaseController;
use core\Response;

require_once __DIR__ . '/../models/User.php';

class AuthController extends BaseController
{
    public function login() {
		$this->view("auth/login");
	}
}