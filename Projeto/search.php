<?php include_once('templates/header.php'); ?>

	<?php include_once('templates/navbar.php'); ?>

	<div id="container">
		<div class="wrapper">
			<h3>Showing results for Porto</h3>
		</div>

		<div class="box">
			<div>
				<div id="houseImg"><img src="houseimgs/h1.jpg"></div>
				<div id="Title">Good Enough - Center Porto</div>
                <div id="Rating">4.4</div>
                <div id="Price">120€</div>
			</div>
			<div>
                <div id="houseImg"><img src="houseimgs/h2.jpg"></div>
				<div id="Title">Has rats -Near Ribeira do Porto</div>
                <div id="Rating">4.2</div>
                <div id="Price">100€</div>
			</div>
			<div>
				Might be haunted - Suburbs Porto
				<img src="images/pexels-photo-106399.jpeg">
			</div>
		</div>

		<!-- <div id="map"></div>
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
		</script> -->

	</div>
	
<?php include_once('templates/footer.php'); ?>