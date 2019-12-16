<style>
    #house_info {
        font-family: 'Open Sans', sans-serif;
        margin: 1%;
        width: 98%;
        padding: 0.5em;
        background:#f5f5f5;
        border-radius: 10px;
        border-style: solid;
        border-width: 2px;
        border-color: black;
    }

    #house_header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        font-size: 1em;
        font-weight: bold;
        margin: 0em 0em;
    }

    #house_header h2, #house_header h3{
        font-size: 1em;
        font-weight: bold;
        margin: 1em 0em;
    }

    #house_info article{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    #rent_info {
        flex-grow: 2;
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
    }

    #count {
        font-family: 'Open Sans', sans-serif;
        color: #e27d60;
    }

    .empty {
        padding-left: 2%;
    }

</style>

<?php
	include_once('templates/header.php');
	include_once('templates/navbar.php');
	include_once('database/connection.php');
    include_once('database/house_q.php');
    
    $email = $_SESSION['email'];
    ?>
    <h2>Rentings in your houses</h2>
    <?php
    $houses = try_get_houses_by_owner_email($email);

    if (!empty($houses)) {

        foreach($houses as $house) {
            $rents = try_get_rents_by_house($house['houseID']);

            $title = $house['title'];
            $id = $house['houseID'];
            $path = "images/houses/h$id/medium/h$id.jpg";
            $count = count($rents);
            if($count > 0){
                ?>
                <article id="house_info">
                    <header id="house_header">
                        <h2><?=$title?></h2>
                        <h3>This house has been rented <?php if ($count == 1) {echo $count; echo " time!";} else {echo $count; echo " times!";} ?></h2>
                    </header>
                    <article>
                        <img src="<?php echo $path?>" width="200" height="200">
                        <?php
                        foreach($rents as $rent) {
                        $tenant = $rent['user'];
                        $checkin = date('d/m/Y', $rent['rent_start']);
                        $checkout = date('d/m/Y', $rent['rent_end']);
                        ?>                    
                        <div id="rent_info">
                            <p id="tenant">Tenant: <?=$tenant?></p>
                            <p id="checkin">Check-In: <?=$checkin?></p>
                            <p id="checkin">Check-Out: <?=$checkout?></p>
                        </div>                                       
                        <?php
                        }
                        ?>
                        </article>
                </article><?php
            }
        }

    } else {
        ?>
        <h3 class="empty">Your houses have no rentings or you have no houses</h3>
        <?php
    }
    
    ?>
    <h2>Your rentings</h2>
    <?php
    $rents = try_get_rents_by_user_email($email);

    if (!empty($rents)) {
        foreach($rents as $rent) {
            $house = try_get_house_by_id($rent['house']);
            $rating = try_get_house_rating_by_id($rent['house']);
            if ($rating['avg_rat'] === NULL) $rating['avg_rat'] = "no rating";
            ?>
            <div class="house_simple_no_hover">
                <article>
                    <header><?=$house['title']?></header>
                    <img src=<?php echo $path?> width="355" height="200">
                    <p id="rating">Rating: <?=$rating['avg_rat']?></p>
                    <p id="address"><?php printf("%s Nº %s %s, %s %s\n", $house['street'], $house['door'], $house['floor'], $house['postal_code'], $house['city']); ?></p>
                    <p id="owner">Owner contact: <?=$house['owner']?></p>
                    <p id="price"><?=$house['daily_price']?> €/day</p>
                </article>
            </div>
            <?php
        }
    }else {
        ?>
        <h3 class="empty">Your houses have no rentings or you have no houses</h3>
        <?php
    }
    

    include_once('templates/footer.php');
?>