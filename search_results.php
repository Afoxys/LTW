<?php
	include_once('templates/header.php');
	include_once('templates/navbar.php');
	include_once('database/connection.php');
    include_once('database/house_q.php');
    
    $location = isset($_POST['Location']) ? $_POST['Location'] : '';
    $checkin = isset($_POST['checkin']) ? ($_POST['checkin']) : '';
    $checkout = isset($_POST['checkout']) ? ($_POST['checkout']) : '';
    $guests = isset($_POST['Guests']) ? $_POST['Guests'] : 0;

    if( isset($_POST['SearchCity']) )
        $houses = getAllHousesByCity($_POST['SearchCity']);
    else
        $houses = getAllHousesByCity($location);
    
    include_once('templates/search_filter.php');
    include_once('templates/list_houses.php');
    
	include_once('templates/footer.php');
?>
