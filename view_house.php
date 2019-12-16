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
$pathOriginal = "images/houses/h$id/originals/h$id";
$pathMedium = "images/houses/h$id/medium/h$id-";

$house_data = try_get_house_by_id($_POST['id']);
if( isset($_SESSION['email'])){
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

    <div id="house_display">
        <h1 id="house_title"><?php echo $house_data['title']?></h1>
            <a  href=<?php echo $pathOriginal,'.jpg'?>><img id="house_image" alt="house image"src=<?php echo $pathOriginal,'.jpg' ?> width="960" width="540"></a>
            <?php if($count > 1) { ?>
                <div id="house_thumb"> <?php
                for ($i = 1; $i <= $count - 1; $i++) {
                    ?> <a href=<?php echo $pathOriginal,'-',$i,'.jpg'?>><img id="house_img_thumb" alt="house image"src=<?php echo $pathMedium,$i,'.jpg'?> width="480" width="270"></a> <?php
                } ?>
                </div> <?php
            } ?>
        <!-- MULTIPLE IMAGES -->
        <div id="house_info"><?php printf("%s Nº %s Floor: %s, %s %s\n", $house_data['street'], $house_data['door'], $house_data['floor'], $house_data['postal_code'], $house_data['city']); ?></div>
        <div id="house_info"><?php echo $house_data['house_description']?></div>
        <div id="house_info"><?php echo $rating.' '?><i id="star" class="fa fa-star"></i></div>
        <div id="Amenities">
            <ul>
                <?php if($house_data['animals'] === 'true') { ?> <li><i class="fa fa-paw"></i> Pet Friendly</li> <?php } ?>
                <?php if($house_data['kitchen'] === 'true') { ?> <li><i class="fas fa-utensils"></i> Kitchen</li> <?php } ?>
                <?php if($house_data['internet'] === 'true') { ?> <li><i class="fa fa-wifi"></i> WIFI</li> <?php } ?>
                <?php if($house_data['air_con'] === 'true') { ?> <li><i class="fas fa-wind"></i> Air Conditioning</li> <?php } ?>
                <?php if($house_data['low_mobility'] === 'true') { ?> <li><i class="fas fa-wheelchair"></i> Low Mobility Access</li> <?php } ?>
                <?php if($house_data['washing_machine'] === 'true') { ?> <li><i class="fa fa-tint"></i> Washing Machine</li> <?php } ?>
            </ul>
        </div>

        <?php
            if(empty($_POST['checkin']) || empty($_POST['checkout'])){
            ?>
            <div id="rent_info">
                <p>Owner contact: <?php echo $house_data['owner']?></p>
                <p>Price: <?php echo $house_data['daily_price']?> €/night</p>
                <form action="rented_success.php" method="post" id="user_rent_action">
                        <input type="hidden" name="email" value="<?php echo $email?>">
                        <label>
                            <br>Check-In <input id="checkin" type="date" name="checkin" value="<?php echo $checkin?>" required>
                        </label>
                        <br><label>
                            <br>Check-Out <input id="checkout" type="date" name="checkout" value="<?php echo $checkout?>" required>
                        </label>
                        <input type="hidden" name="id" value="<?php echo $house_data['houseID']?>">
                        <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf'] ?>">
                        <input type="submit" id="rent_submit_button" value="Rent this house">
                </form>
            </div>
    </div>
           <?php
        }
            else if(!empty($_POST['checkin'])){
                ?>
                <div id="rent_info">
                    <p>Owner contact: <?php echo $house_data['owner']?></p>
                    <p>Price: <?php echo $house_data['daily_price']?> €/night</p>
                    <form action="rented_success.php" method="post" id="user_rent_action">
                        <input type="hidden" name="email" value="<?php echo $email?>">
                        <input type="hidden" name="checkin" value="<?php echo $checkin?>" >
                        <input type="hidden" name="checkout" value="<?php echo $checkout?>">
                        <input type="hidden" name="id" value="<?php echo $house_data['houseID']?>">
                        <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf'] ?>">
                        <input type="submit" id="rent_submit_button" value="Rent this house">
                    </form>
                </div>
        </div>
            <?php
        }
    ?>


<?php include_once('templates/footer.php'); ?>



<script>
    let today = new Date().toISOString().substr(0, 10);
    document.getElementById("checkin").setAttribute("min", today);
    document.getElementById("checkout").setAttribute("min", today);
</script>