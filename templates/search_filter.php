
<div>

    <form id="search_filter" method="GET" action="search_results.php">
        <label>
            <br>Location <input id="location" type="text" placeholder="Example: Porto" name="location" value="<?php echo htmlspecialchars($location, ENT_QUOTES); ?>">
        </label>
        <label>
            <br>Check-In <input id="CheckIn" type="date" name="checkin" value="<?php echo htmlspecialchars($checkin, ENT_QUOTES); ?>">
        </label>
        <label>
            <br>Check-Out<input id="CheckOut" type="date" name="checkout" value="<?php echo htmlspecialchars($checkout, ENT_QUOTES); ?>">
        </label>
        <label>
            <br>Guests<input type="number" name="guests" min="1" value="<?php echo htmlspecialchars($guests, ENT_QUOTES); ?>">
        </label>
        <label>
            <input type="submit" value="Search">
        </label>
    </form>

</div>

<!-- 
<script>
let search_filter = document.getElementById('search_filter');
if(search_filter != null) {
    search_filter.CheckIn.value = 
}
</script> -->