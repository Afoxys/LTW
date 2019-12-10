<?php
	session_set_cookie_params(0, '/', 'localhost', false, true);
	session_start();

	include_once('database/connection.php');
	include_once('database/account_q.php');

	$success = false;
	$msg = 'OK';
	
	$email = isset($_POST['email']) ? $_POST['email'] : '';
    $first = isset($_POST['pwd']) ? $_POST['pwd'] : '';
    $last = isset($_POST['pwd']) ? $_POST['pwd'] : '';
    $phone = isset($_POST['pwd']) ? $_POST['pwd'] : '';
    $pwd = isset($_POST['pwd']) ? $_POST['pwd'] : '';
    $pwd_confirm = isset($_POST['pwd_confirm']) ? $_POST['pwd_confirm'] : '';

    // check null or empty
    
    // check email valid

    // check pwd === pwd_confirm, and valid

    // check phone valid (?)

    // check first and last name length

    // insert in db
	debug_insertUser($email, $pwd);

    //check errors

    //return


    

    // outras coisas:
        // mover tudo para pasta images
        // mover codigo php para pasta "actions" -> "actions/login", "actions/logout", "actions/register"
        // rever nomes register/signup/create_account
        // Em modo "not login", botao "rent your house" da navbar manda para "create_account.php" (apos criar, redirecionar para onde?)
        // Em modo "not login", se permitir "search", eventual botao "rent this house" manda para "create_account.php"
            //(apos criar, redirecionar para onde? guardar o pedido de rent feito anteriormente? como?)
?>