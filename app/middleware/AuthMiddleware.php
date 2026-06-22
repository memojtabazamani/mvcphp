<?php 

use core\Response;

require_once __DIR__ . '/../models/User.php';


class AuthMiddleware {

	public function handle() {
		if(!isset($_SESSION['user_id']) && !isset($_COOKIE['remember_token'])) {
			Response::redirect("auth/login");
			
			exit();
		} else {
			if(!isset($_SESSION['user_id'])) {
				 $userModel = new User();

            	 $user = $userModel->firstWhere("remember_token", $_COOKIE['remember_token']);

				$_SESSION['user_id'] = $user['id'];

			}
		}
	}
}

 ?>