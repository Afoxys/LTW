<style>
    #Amenities li{
        list-style-type: none;
    }
</style>

<?php 

include_once('templates/header.php');
include_once('templates/navbar.php');

include_once('database/house_q.php');

$house_data = try_get_house_by_id($_POST['id']);

$house_rat = try_get_house_rating_by_id($_POST['id']);
if($house_rat['avg_rat'] === NULL) {
    $rating = 'No rating';
} else {
    $rating = $house_rat['avg_rat'];
}

if( isset($_POST['city'])){ 
    $city = $_POST['city'];
}

else if( isset($_POST['location'])) {
    $location = $_POST['location'];
    echo $location;


    $checkin = $_POST['checkin'];
    echo $checkin;

    $checkout = $_POST['checkout'];
    echo $checkout;
    $guests = $_POST['guests'];
    echo $guests;
}

?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">

    <h1><?php echo $house_data['title']?></h1>
    <img id="house_img" alt="house image" src="images/houses/h<?php echo $_POST['id']?>.jpg">
    <!-- MULTIPLE IMAGES -->
    <div><?php printf("%s Nº %s %s, %s %s\n", $house_data['street'], $house_data['door'], $house_data['floor'], $house_data['postal_code'], $house_data['city']); ?></div>
    <div id="house_description"><?php echo $house_data['house_description']?></div>
    <div id="house_rating"><?php echo $rating.' '?><i class="fa fa-star"></i></div>
    <div id="Amenities">
        <ul>
            <?php if($house_data['animals'] === 'true') { ?> <li><i class="fa fa-paw"></i>Pet Friendly</li> <?php } ?>
            <?php if($house_data['kitchen'] === 'true') { ?> <li><i class="fas fa-utensils"></i>Kitchen</li> <?php } ?>
            <?php if($house_data['internet'] === 'true') { ?> <li><i class="fa fa-wifi"></i>WIFI</li> <?php } ?>
            <?php if($house_data['air_con'] === 'true') { ?> <li><i class="fas fa-wind"></i>Air Conditioning</li> <?php } ?>
            <?php if($house_data['low_mobility'] === 'true') { ?> <li><i class="fas fa-wheelchair"></i>Low Mobility Access</li> <?php } ?>
            <?php if($house_data['washing_machine'] === 'true') { ?> <li><i class="fa fa-tint"></i>Washing Machine</li> <?php } ?>
        </ul>
    </div>

    <form action="rented_success.php" method="post" id="user_rent_action">
        Price: <?php echo $house_data['daily_price']?>€/night
        <br>
        <input type="hidden" name="location" value="<?php echo $location?>">
        <input type="hidden" name="checkin" value="<?php echo $checkin?>">
        <input type="hidden" name="checkout" value="<?php echo $checkout?>">
        <input type="hidden" name="guests" value="<?php echo $guests?>">
        <input type="hidden" name="id" value="<?php echo $house['houseID']?>">
        <input type="submit" value="Rent this house" onclick="rent_action()">
    </form>

<?php include_once('templates/footer.php'); ?>

<script>
    function rent_action() {
        console.log("You have rented this house successfully");
    }
</script>