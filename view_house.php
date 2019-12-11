<style>
    #Amenities li{
        list-style-type: none;
    }
</style>

<?php 

include_once('templates/header.php');
include_once('templates/navbar.php');

include_once('database/house_q.php');

$house_data = try_get_house_by_id($_GET['id']);

$house_rat = try_get_house_rating_by_id($_GET['id']);
if($house_rat['avg_rat'] === NULL) {
    $rating = 'No rating';
} else {
    $rating = $house_rat['avg_rat'];
}

printf("%s Nº %s %s, %s %s\n", $house_data['street'], $house_data['door'], $house_data['floor'], $house_data['postal_code'], $house_data['city']);


?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <h1><?php echo $house_data['title']?></h1>
    <img id="house_img" alt="house image" src="images/houses/h<?php echo $_GET['id']?>.jpg">
    <!-- MULTIPLE IMAGES -->
    <div id="house_description"><?php echo $house_data['house_description']?></div>
    <div id="house_rating"><?php echo $rating.' '?><i class="fa fa-star"></i></div>
    <div id="Amenities">
        <ul>
            <?php if($house_data['internet'] === 'true') { ?> <li><i class="fa fa-wifi"></i>WIFI</li> <?php } ?>
            <?php if($house_data['animals'] === 'true') { ?> <li><i class="fa fa-paw"></i>Pet Friendly</li> <?php } ?>
            <li><i class="fa fa-cutlery"></i>Kitchen</li>
        </ul>
    </div>

    <div id="user_rent_action">
        Price: <?php echo $house_data['daily_price']?>€/night
        <br>
        <input type="button" value="Rent this house" onclick="rent_action()">
    </div>

<?php include_once('templates/footer.php'); ?>

<script>
    function rent_action() {
        console.log("You have rented this house successfully");
    }
</script>