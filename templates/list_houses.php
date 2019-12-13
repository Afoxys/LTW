<section>
	<?php foreach($houses as $house) { ?>
		<?php
			$rating = try_get_house_rating_by_id($house['houseID']);
			echo $rating['avg_rat'];
			if ($rating['avg_rat'] === NULL) $rating['avg_rat'] = "no rating";
		?>
		<a class="house_simple" href="">
			<article>
				<header><?=$house['title']?></header>
				<img src="images/houses/h1.jpg" width="400" height="300">
				<p id="rating">Rating: <?=$rating['avg_rat']?></p>
				<p id="price"><?=$house['daily_price']?> €/day</p>
			</article>
		</a>
	<?php } ?>
</section>
