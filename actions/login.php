<?php
	//session_set_cookie_params(0, '/', '', false, true);
	session_start();

	include_once('../database/account_q.php');


	// function generate_random_token() {
	// 	return bin2hex(openssl_random_pseudo_bytes(32));
	// }

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
	
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : '';

	$msg = check_params($email, $pwd);
	if($msg === 'OK') {
		$userData = try_authentification($email, $pwd);
	
		if($userData !== NULL) {
			session_regenerate_id(true);

			$success = true;
			$_SESSION['email'] = $userData['email'];
			$_SESSION['firstname'] = $userData['firstname'];
		}
		else {
			$msg = 'Bad Login';
		}
	}

	echo json_encode( array(
		'success' 	=> $success,
		'msg' 		=> $msg,
		'userData' 	=> $userData
	));


	// if (!isset($_SESSION['csrf'])) {
	//     $_SESSION['csrf'] = generate_random_token();
	// }
	
	// session_regenerate_id(true);
	// if (isset($_SESSION['email']))
	// 	echo $_SESSION['email'];
	// else
	// 	$_SESSION['email'] = $userData['email'];
	// return $userData;
	
?>