<?php

	session_start();

	include_once('../database/house_q.php');
	
    function check_params($title, $price, $description, $beds) {
		if(empty($title) || strlen($title) < 2 || strlen($title) > 64) {
			return 'Bad Title';
		}

		if(empty($price) || $price < 1 || $price > 999999) {
			return 'Bad Price';
		}

		if(strlen($description) > 500) {
			return 'Bad Description';
		}

		if(empty($beds) || $beds < 1 || $beds > 999) {
			return 'Bad Beds';
		}
		
		return 'OK';
	}
    $msg = 'OK';
    $id = $_POST['id'];
	
	if ($_SESSION['csrf'] !== $_POST['csrf']) {
		header("Location: ../index.php");
		return;
	}

	$title = isset($_POST['title']) ? $_POST['title'] : '';
	$price = isset($_POST['daily_price']) ? $_POST['daily_price'] : '';
	$description = isset($_POST['description']) ? $_POST['description'] : '';
	$beds = isset($_POST['bed_number']) ? $_POST['bed_number'] : '';

    $msg = check_params($title, $price, $description, $beds);
	if($msg === 'OK') {
		// update house
		update_house($id,$title, $price, $description, $beds);
		header("Location: ../manage_my_houses.php");
	} else header("Location: ../edit_house.php");
	
?>