<style>
    #map {
        height: 100%;
        width: 100%;
        position: fixed;
        top: 30%;
        right: 0px;
        background-color:rgb(229, 227, 223);
    }
</style>

<?php
	include_once('templates/header.php');
	include_once('templates/navbar.php');
    include_once('database/house_q.php');
    
    $location = isset($_GET['location']) ? htmlentities($_GET['location'], ENT_QUOTES) : '';
    $checkin = isset($_GET['checkin']) ? htmlentities($_GET['checkin'], ENT_QUOTES) : '';
    $checkout = isset($_GET['checkout']) ? htmlentities($_GET['checkout'], ENT_QUOTES) : '';
    $guests = (isset($_GET['guests']) && !empty($_GET['guests'])) ? htmlentities($_GET['guests'], ENT_QUOTES) : 1;
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
    
    include_once('templates/search_filter.php'); ?>
    <div id="house_map_container">
        <div id="house_simple_container"> <?php
        include_once('templates/list_houses.php');
        ?> </div>
        <div id="map">
            <script>
            var map;
            function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: new google.maps.LatLng(41.1779,-8.5977),
            mapTypeId: 'terrain'
            });

            // Create a <script> tag and set the USGS URL as the source.
            var script = document.createElement('script');
            script.src = 'https://developers.google.com/maps/documentation/javascript/examples/json/earthquake_GeoJSONP.js';
            document.getElementsByTagName('head')[0].appendChild(script);
            }

            // Loop through the results array and place a marker for each
            // set of coordinates.
            window.eqfeed_callback = function(results) {
            for (var i = 0; i < results.features.length; i++) {
            var coords = results.features[i].geometry.coordinates;
            var latLng = new google.maps.LatLng(41.1779,-8.5977);
            var marker = new google.maps.Marker({
            position: latLng,
            map: map
            });
            }
            }
            </script>
            <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQiAzwQeiciDSrp7pAu7OD4RGZlp7PJlw&callback=initMap">
            </script>
        </div>
    </div>
	<?php include_once('templates/footer.php');
?>
