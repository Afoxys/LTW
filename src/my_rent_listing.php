<style>
    #house_info {
        font-family: 'Open Sans', sans-serif;
        margin: 1%;
        width: 98%;
        padding: 0.5em;
        background: #f5f5f5;
        border-radius: 10px;
        border-style: solid;
        border-width: 2px;
        border-color: black;
    }

    #house_simple_no_hover {
        font-family: 'Open Sans', sans-serif;
        margin: 1%;
        width: 98%;
        padding: 0.5em;
        background: #f5f5f5;
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
        display: row;
        max-width: 50%
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

    #rating_form {
        margin-left: 25%;
        padding: 1%;
    }

    #rating_form input {
        margin-right: 10%;
        float: right;
    }

    #rating_form textarea {
        width: 50%;
        margin-right: 10%;
        float: right;
        resize: none;
    }

    #rating_form label {
        margin-left: 30%;
    }

    #rate_title {
        color: #e27d60;
        font-size: 1.2em;
        font-weight: bold;
        margin-left: 47.5%;
    }

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance:textfield;
    }

    #rating_send {
        float: center;
        /* margin-left: 20%; */
    }

    @media screen and (max-width: 400px) {
        #house_simple_no_hover {
            float: none;
            display: block;
            text-align: left;
            width: 100%;
            margin: 0;
            padding: 14px;
        }
        
        #house_simple_no_hover img {
            width: 75%;
            height: 75%;
        }
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
                <article id="house_simple_no_hover">
                    <header id="house_header">
                        <h2><?=$title?></h2>
                        <h3>This house has been rented <?php if ($count == 1) {echo $count; echo " time!";} else {echo $count; echo " times!";} ?></h2>
                    </header>
                    <article>
                        <img src="<?php echo $path?>" width="355" height="200">
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
    <br><h2>You rented</h2>
    <?php
    $rents = try_get_rents_by_user_email($email);

    if (!empty($rents)) {
        foreach($rents as $rent) {
            $id = $rent['house'];
            $house = try_get_house_by_id($id);
            $rating = try_get_house_rating_by_id($id);
            $checkout = $rent['rent_end'];
            $checkin = $rent['rent_start'];
            $today = date('d-m-Y');
            $today = strtotime($today);

            if ($rating['avg_rat'] === NULL) $rating['avg_rat'] = "no rating";
            $path = "images/houses/h$id/medium/h$id.jpg";
            ?>
            <div id="house_simple_no_hover">
                <article>
                    <header id="house_header">
                        <h2><?=$house['title']?></h2>
                    </header>
                    <img src=<?php echo $path?> width="355" height="200">
                    <p id="address"><?php printf("%s Nº %s Floor: %s, %s %s\n", $house['street'], $house['door'], $house['floor'], $house['postal_code'], $house['city']); ?></p>
                    <p id="owner">Owner contact: <?=$house['owner']?></p>
                    <p id="price"><?=$house['daily_price']?> €/day</p>
                    <?php if( ($today > $checkout) && ($rent['rating'] == NULL) ) { ?>
                            <div id="rate_title">Please rate your stay:</div><br>
                            <form id="rating_form" method="post" action="actions/add_rating.php">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <input type="hidden" name="rent_start" value="<?php echo $checkin ?>">
                                <label for = "rating_value">Rating</label>
                                <input type="number" min="1" max="5" id="rating_value" name="rating_value" required>
                                <br><label for = "rating_comment">Comment</label>
                                <textarea id="rating_comment" maxlength="500" clos="50" rows="2"></textarea>
                                <br><input type="submit" id="rating_send" value="Rate house">
                            </form>
                        <?php
                    } ?>
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