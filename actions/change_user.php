<?php
	//session_set_cookie_params(0, '/', '', false, true);
	session_start();

	include_once('../database/account_q.php');

    $user_data = try_get_user($_SESSION['email']);

	// function generate_random_token() {
	// 	return bin2hex(openssl_random_pseudo_bytes(32));
    // }
    
    function check_params($first, $last, $phone, $new_pwd, $curr_pwd, $hash) {

        if(!password_verify($curr_pwd, $hash)) {
            return 'Wrong password';
        }
        
		// if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		// 	return 'Bad Email';
		// }

		if( empty($first) || strlen($first) < 2 || strlen($first) > 64 ) {
            return 'Bad First';
        }
        
        if( empty($last) || strlen($last) < 2 || strlen($last) > 64 ) {
            return 'Bad Last';
        }
        
        if( empty($phone) || $phone < 9*pow(10, 8) || $phone > 10*pow(10, 8) ) {

            return 'Bad Phone';
        }

		if( !empty($new_pwd) && (strlen($new_pwd) < 8 || strlen($new_pwd) > 128) ) {
			return 'Bad Password';
        }
        
		return 'OK';
	}

	
	$first = !empty($_POST['firstname']) ? $_POST['firstname'] : $user_data['firstname'];
	$last = !empty($_POST['lastname']) ? $_POST['lastname'] : $user_data['lastname'];
    $phone = !empty($_POST['phone']) ? $_POST['phone'] : $user_data['phone'];
	$new_pwd = !empty($_POST['new_pwd']) ? $_POST['new_pwd'] : '';
    $curr_pwd = !empty($_POST['current_pwd']) ? $_POST['current_pwd'] : '';
    $hash = $user_data['hash'];

    $msg = check_params($first, $last, $phone, $new_pwd, $curr_pwd, $hash);

	if($msg === 'OK') {

        $options = ['cost' => 12];
        $pwd = !empty($new_pwd) ? password_hash($new_pwd, PASSWORD_DEFAULT, $options) : $hash;

        $msg = try_update_user($user_data['email'], $first, $last, $phone, $pwd);
    
        if($msg === 'OK') {
            session_regenerate_id(true);
            $_SESSION['email'] = $user_data['email'];
            $_SESSION['firstname'] = $first;
            header('Location: ../account_settings.php?code= was successful');
            return;
        }

    }
    
    header('Location: ../account_settings.php?code= failed');


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