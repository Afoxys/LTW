<?php
	include_once('../database/house_q.php');

    $house = try_get_house_by_id($_POST['id']);
    
    
?>