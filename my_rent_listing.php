<?php
	include_once('templates/header.php');
	include_once('templates/navbar.php');
	include_once('database/connection.php');
    include_once('database/house_q.php');
    
    echo $_SESSION['firstname'];
    $email = $_SESSION['email'];
    $houses_rent_data = try_get_rents_by_owner_email($email);
    foreach($houses_rent_data as $house) {
        echo $house['id'], '<br>';
        echo $house['checkin'], '<br>';
        echo $house['checkout'], '<br>';
    }
    

    include_once('templates/footer.php');
?>