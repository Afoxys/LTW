<?php
    include_once('templates/header.php');
    include_once('templates/navbar.php');
    include_once('database/connection.php');
    include_once('database/houses.php');

    $city = $_POST['SearchCity'];
    $houses = getAllHousesByCity($city);

   	include_once('templates/list_houses.php');
    include_once('templates/footer.php');
?>
