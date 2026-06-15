<?php 

use core\Response;


class AuthMiddleware {

	public function handle() {
		if(!isset($_SESSION['user_id'])) {
			Response::redirect("auth/login");
			
			exit();
		}
	}
}

 ?>