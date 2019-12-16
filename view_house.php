<style>
    #Amenities li{
        list-style-type: none;
    }
</style>

<?php 

include_once('templates/header.php');
include_once('templates/navbar.php');

include_once('database/house_q.php');

$id = $_POST['id'];
$count = try_get_image_count_by_id($id);
$pathOriginal = "images/houses/h$id/originals/h$id.jpg";
$pathMedium = "images/houses/h$id/medium/h$id-";

$house_data = try_get_house_by_id($_POST['id']);
if( isset($_SESSION['firstname'])){
    $email = $_SESSION['email'];
}

$house_rat = try_get_house_rating_by_id($_POST['id']);
if($house_rat['avg_rat'] === NULL) {
    $rating = 'No rating';
} else {
    $rating = $house_rat['avg_rat'];
}

if(empty($_POST['checkin'])){
}

else if(!empty($_POST['checkin'])) {
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
}


?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">

    <?php
    if( !isset($_SESSION['firstname'])){
        ?>
        <div id="">
        </div>
        <?php
    }?>


    <h1><?php echo $house_data['title']?></h1>
        <a href=<?php echo $pathOriginal?>><img id="house_img" alt="house image"src=<?php echo $pathOriginal?> width="960" width="540"></a>
    <!-- MULTIPLE IMAGES -->
    <div><?php printf("%s Nº %s Floor: %s, %s %s\n", $house_data['street'], $house_data['door'], $house_data['floor'], $house_data['postal_code'], $house_data['city']); ?></div>
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

    <?php
        if(empty($_POST['checkin']) || empty($_POST['checkout'])){
           ?>
           <form action="rented_success.php" method="post" id="user_rent_action">
                <p>Price: <?php echo $house_data['daily_price']?>€/night</p>
                <p>Owner contact: <?php echo $house_data['owner']?></p>
                <input type="hidden" name="email" value="<?php echo $email?>">
                <label>
                    <br>Check-In <input id="checkin" type="date" name="checkin" value="<?php echo $checkin?>" required>
                </label>
                <label>
                    <br>Check-Out<input id="checkout" type="date" name="checkout" value="<?php echo $checkout?>" required>
                </label>
                <input type="hidden" name="id" value="<?php echo $house_data['houseID']?>">
                <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf'] ?>">
                <input type="submit" value="Rent this house">
             </form>
           <?php
        }
        else if(!empty($_POST['checkin'])){
            ?>
            <form action="rented_success.php" method="post" id="user_rent_action">
                Price: <?php echo $house_data['daily_price']?>€/night
                <br>
                <input type="hidden" name="email" value="<?php echo $email?>">
                <input type="hidden" name="checkin" value="<?php echo $checkin?>" >
                <input type="hidden" name="checkout" value="<?php echo $checkout?>">
                <input type="hidden" name="id" value="<?php echo $house_data['houseID']?>">
                <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf'] ?>">
                <input type="submit" value="Rent this house">
            </form>
            <?php
        }
    ?>


<?php include_once('templates/footer.php'); ?>



<script>
    let today = new Date().toISOString().substr(0, 10);
    document.getElementById("checkin").setAttribute("min", today);
    document.getElementById("checkout").setAttribute("min", today);
</script>