<style>
    #invisible_submit {
        position:absolute;
        padding: 10em 10em 6em 150em;
        color: transparent;
        background-color: transparent;
        border: transparent;
    }
</style>

<section>
	<?php foreach($houses as $house) { ?>
		<?php
			$rating = try_get_house_rating_by_id($house['houseID']);
			if ($rating['avg_rat'] === NULL) $rating['avg_rat'] = "no rating";
		?>

        <form action="view_house.php" method="GET"wsl>
            <div class="house_simple" href="view_house.php">
            <input type="hidden" name="checkin" value="<?php echo $checkin?>">
            <input type="hidden" name="checkout" value="<?php echo $checkout?>">
            <input type="hidden" name="id" value="<?php echo $house['houseID']?>">

            <?php
                /*if( empty($checkout)){
                    ?>
                    <input type="hidden" name="id" value="<?php echo $house['houseID']?>">
                    <?php
                }

                else if(!empty($checkout)) {
                    ?>
                    <input type="hidden" name="checkin" value="<?php echo $checkin?>">
                    <input type="hidden" name="checkout" value="<?php echo $checkout?>">
                    <input type="hidden" name="id" value="<?php echo $house['houseID']?>">
                    <?php
                }*/
            ?>
            
            <input type="submit" id="invisible_submit">
            <article>
                <header><?=$house['title']?></header>
                <img src="images/houses/h<?php echo $house['houseID']?>.jpg" width="200" height="200">
                <p id="rating">Rating: <?=$rating['avg_rat']?></p>
                <p id="address"><?php printf("%s Nº %s %s, %s %s\n", $house['street'], $house['door'], $house['floor'], $house['postal_code'], $house['city']); ?></p>
                <p id="price"><?=$house['daily_price']?> €/day</p>

            </article>
            </div>
        </form>
	<?php } ?>
</section>
