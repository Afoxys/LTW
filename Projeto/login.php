<?php
	session_set_cookie_params(0, '/', 'localhost', false, true);
	session_start();

	include_once('database/connection.php');
	include_once('database/login_q.php');


	// function generate_random_token() {
	// 	return bin2hex(openssl_random_pseudo_bytes(32));
	// }

	$success = false;
	$userData = NULL;
	$msg = 'OK';
	
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : '';
	
	if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {

		if(!empty($pwd) && strlen($pwd) >= 8 && strlen($pwd) <= 128) {
			//debug_insertUser($email, $pwd);
			$userData = try_authentification($email, $pwd);
	
			if($userData !== NULL) {
				session_regenerate_id(true);

				$success = true;
				$_SESSION['email'] = $userData['email'];
			}
			else {
				$msg = 'Bad Login';
			}
		}
		else {
			$msg = 'Bad Password';
		}
	}
	else {
		$msg = 'Bad Email';
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