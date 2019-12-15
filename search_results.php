<?php
	include_once('templates/header.php');
	include_once('templates/navbar.php');
    include_once('database/house_q.php');
    
    $location = isset($_GET['location']) ? $_GET['location'] : '';
    $checkin = isset($_GET['checkin']) ? $_GET['checkin'] : '';
    $checkout = isset($_GET['checkout']) ? $_GET['checkout'] : '';
    $guests = isset($_GET['guests']) ? $_GET['guests'] : 1;
    if (isset($_GET['search_city'])) {
        $location = $_GET['search_city'];
    }

    if( !empty($_GET['search_city']) )
        $houses = get_all_houses_by_city($location);
    else if( !empty($checkin) && !empty($checkout) )
        $houses = get_all_houses_by_check_in_out($location, $checkin, $checkout, $guests);
    else if( !empty($checkin) && empty($checkout) )
        $houses = get_all_houses_by_check_in($location, $checkin, $guests);
    else if( empty($checkin) && !empty($checkout) )
        $houses = get_all_houses_by_check_out($location, $checkout, $guests);
    else
        $houses = get_all_houses_no_check($location, $guests);
    
    include_once('templates/search_filter.php');
    include_once('templates/list_houses.php');
    
	include_once('templates/footer.php');
?>
