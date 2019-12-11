<section>
  <?php foreach($houses as $house) { ?>
  <a class="house_simple" href="">
    <article>
      <header><?=$house['title']?></header>
      <img src="images/houses/h1.jpg" width="400" height="300">
      <p id="rating">Rating: rating</p>
      <p id="price"><?=$house['daily_price']?> €/day</p>
    </article>
  </a>
<?php } ?>
</section>
