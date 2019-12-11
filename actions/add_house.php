<?php
	//session_set_cookie_params(0, '/', '', false, true);
	session_start();

	include_once('../database/connection.php');
	include_once('../database/house_q.php');


	function is_bool_str($bool) {
		return (strcasecmp($bool, 'true') == 0 || strcasecmp($bool, 'false') == 0);
	}
	
	function check_params($title, $price, $city, $region, $country, $street, $door, $floor, $postal, $description, $beds,
		$pet, $kitchen, $wifi, $air_con, $low_mobility, $washing
	) {
		if(empty($title) || strlen($title) < 2 || strlen($title) > 64) {
			return 'Bad Title';
		}

		if(empty($price) || $price < 1 || $price > 99999) {
			return 'Bad Price';
		}
		
		if(empty($city) || strlen($city) < 2 || strlen($city) > 64) {
			return 'Bad City';
		}
		
		if(empty($region) || strlen($region) < 2 || strlen($region) > 64) {
			return 'Bad Region';
		}

		if(empty($country) || strlen($country) < 2 || strlen($country) > 64) {
			return 'Bad Country';
		}

		if(empty($street) || strlen($street) < 2 || strlen($street) > 64) {
			return 'Bad Street';
		}
		
		if(empty($door) ||  $door < 0 || $door > 999999) {
			return 'Bad Door';
		}

		if(strlen($floor) > 64) {
			return 'Bad Floor';
		}

		if(empty($postal) || preg_match('/\d{4}-\d{3}/', $postal, $matches) !== 1) {
			return 'Bad Postal';
		}

		if(strlen($description) > 500) {
			return 'Bad Description';
		}

		if(empty($beds) || $beds < 1 || $beds > 999) {
			return 'Bad Beds';
		}

		if(!is_bool_str($pet) || !is_bool_str($kitchen) || !is_bool_str($wifi) || !is_bool_str($air_con) || !is_bool_str($low_mobility) || !is_bool_str($washing)) {
			return 'Bad Amenities';
		}
		
		return 'OK';
	}

	$success = false;
	$msg = 'OK';
	
	$title = isset($_POST['title']) ? $_POST['title'] : '';
	$price = isset($_POST['price']) ? $_POST['price'] : '';
	$city = isset($_POST['city']) ? $_POST['city'] : '';
	$region = isset($_POST['region']) ? $_POST['region'] : '';
	$country = isset($_POST['country']) ? $_POST['country'] : '';
	$street = isset($_POST['street']) ? $_POST['street'] : '';
	$door = isset($_POST['door']) ? $_POST['door'] : '';
	$floor = isset($_POST['floor']) ? $_POST['floor'] : 'N/A';
	$postal = isset($_POST['postal']) ? $_POST['postal'] : '';
	$description = isset($_POST['description']) ? $_POST['description'] : '';
	$beds = isset($_POST['beds']) ? $_POST['beds'] : '';
	$pet = isset($_POST['pet']) ? $_POST['pet'] : false;
	$kitchen = isset($_POST['kitchen']) ? $_POST['kitchen'] : false;
	$wifi = isset($_POST['wifi']) ? $_POST['wifi'] : false;
	$air_con = isset($_POST['air_con']) ? $_POST['air_con'] : false;
	$low_mobility = isset($_POST['low_mobility']) ? $_POST['low_mobility'] : false;
	$washing = isset($_POST['washing']) ? $_POST['washing'] : false;

	$msg = check_params($title, $price, $city, $region, $country, $street, $door, $floor, $postal, $description, $beds,
						$pet, $kitchen, $wifi, $air_con, $low_mobility, $washing);

	if($msg === 'OK') {

		// insert house
		$msg = try_insert_house($title, $price, $city, $region, $country, $street, $door, $floor, $postal, $description, $beds,
		$pet, $kitchen, $wifi, $air_con, $low_mobility, $washing);

		if($msg === 'OK') {
			$success = true;
		}
	}
	
	echo json_encode( array(
		'success' 	=> $success,
		'msg' 		=> $msg
	));
	
?>