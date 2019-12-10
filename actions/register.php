<?php
	//session_set_cookie_params(0, '/', '', false, true);
	session_start();

	include_once('../database/connection.php');
    include_once('../database/account_q.php');
    
    function check_params($email, $first, $last, $phone, $pwd, $pwd_confirm) {
		if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return 'Bad Email';
		}

		if(empty($first) || strlen($first) < 2 || strlen($first) > 64) {
            return 'Bad First';
        }
        
        if(empty($last) || strlen($last) < 2 || strlen($last) > 64) {
            return 'Bad Last';
        }
        
        if (empty($phone) || $phone < 9*pow(10, 8) || $phone > 10*pow(10, 8)) {

            return 'Bad Phone';
        }

		if(empty($pwd) || strlen($pwd) < 8 || strlen($pwd) > 128) {
			return 'Bad Password';
        }
        
        if($pwd !== $pwd_confirm) {
			return 'Bad Password Match';
		}
        
		return 'OK';
	}

	$success = false;
	$msg = 'OK';
	
	$email = isset($_POST['email']) ? $_POST['email'] : '';
    $first = isset($_POST['first']) ? $_POST['first'] : '';
    $last = isset($_POST['last']) ? $_POST['last'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $pwd = isset($_POST['pwd']) ? $_POST['pwd'] : '';
    $pwd_confirm = isset($_POST['pwd_confirm']) ? $_POST['pwd_confirm'] : '';

    $msg = check_params($email, $first, $last, $phone, $pwd, $pwd_confirm);

    if($msg === 'OK') {
        $msg = try_insert_user($email, $first, $last, $phone, $pwd);

        if($msg === 'OK') {
			session_regenerate_id(true);

			$success = true;
            $_SESSION['email'] = $email;
            $_SESSION['firstname'] = $first;
		}
    }
    
    echo json_encode( array(
		'success' 	=> $success,
		'msg' 		=> $msg
	));
    
?>