<?php
	include_once('templates/header.php');
	include_once('templates/navbar.php');
    include_once('database/house_q.php');
    
    $location = isset($_GET['location']) ? htmlentities($_GET['location'], ENT_QUOTES) : '';
    $checkin = isset($_GET['checkin']) ? htmlentities($_GET['checkin'], ENT_QUOTES) : '';
    $checkout = isset($_GET['checkout']) ? htmlentities($_GET['checkout'], ENT_QUOTES) : '';
    $guests = isset($_GET['guests']) ? htmlentities($_GET['guests'], ENT_QUOTES) : 1;
    $max_price = isset($_GET['max_price']) ? htmlentities($_GET['max_price'], ENT_QUOTES) : -1;
    if (isset($_GET['search_city'])) {
        $location = htmlentities($_GET['search_city'], ENT_QUOTES);
    }

    if( !empty($_GET['search_city']) )
        $houses = get_all_houses_by_city($location);
    else if( !empty($checkin) && !empty($checkout) )
        $houses = get_all_houses_by_check_in_out($location, $checkin, $checkout, $guests, $max_price);
    else if( !empty($checkin) && empty($checkout) )
        $houses = get_all_houses_by_check_in($location, $checkin, $guests, $max_price);
    else if( empty($checkin) && !empty($checkout) )
        $houses = get_all_houses_by_check_out($location, $checkout, $guests, $max_price);
    else
        $houses = get_all_houses_no_check($location, $guests, $max_price);
    
    include_once('templates/search_filter.php');
    include_once('templates/list_houses.php');
    
	include_once('templates/footer.php');
?>
