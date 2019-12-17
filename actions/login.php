<?php
	//session_set_cookie_params(0, '/', '', false, true);
	function generate_random_token() {
		return bin2hex(openssl_random_pseudo_bytes(32));
	}
    session_start();


	include_once('../database/account_q.php');



	function check_params($email, $pwd) {
		if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return 'Bad Login';
		}

		if(empty($pwd) || strlen($pwd) < 8 || strlen($pwd) > 128) {
			return 'Bad Login';
		}

		return 'OK';
	}

	$success = false;
	$userData = NULL;

	if ($_SESSION['pre_csrf'] === $_POST['pre_csrf']) {

		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : '';

		$msg = check_params($email, $pwd);
		if($msg === 'OK') {
			$userData = try_authentification($email, $pwd);
		
			if($userData !== NULL) {
				session_regenerate_id(true);
				
				if (!isset($_SESSION['csrf'])) {
					$_SESSION['csrf'] = generate_random_token();
				}
				
				$_SESSION['email'] = $userData['email'];
				$_SESSION['firstname'] = $userData['firstname'];
				$success = true;
			}
			else {
				$msg = 'Bad Login';
			}
		}
	}


	echo json_encode( array(
		'success' 	=> $success,
		'msg' 		=> $msg,
		'userData' 	=> $userData
	));
	
?>