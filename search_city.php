<?php
	include_once('templates/header.php');
	include_once('templates/navbar.php');
	include_once('database/connection.php');
	include_once('database/house_q.php');
    
    if( isset($_POST['SearchCity'])){ 
        $city = $_POST['SearchCity'];
        $houses = getAllHousesByCity($city);
    }

    else if( isset($_POST['Location'])) {
        $location = $_POST['Location'];
        $checkin = $_POST['CheckIn'];
        $checkout = $_POST['CheckOut'];
        $guests = $_POST['Guests'];
        
        // $houses = getAllHousesBySearch($location,$checkin,$checkout,$guests);
        $houses = getAllHousesByCity($location);
    }
    else
        header("location: index.php");

    
    

	include_once('templates/list_houses.php');
	include_once('templates/footer.php');
?>
