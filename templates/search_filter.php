<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

    #search_filter {
        margin-left:10%;
        max-width: 80%;
        font-family: 'Open Sans', sans-serif;
        background-color: #fafafa;
        border: solid;
        border-radius: 5px;
        border-color: #e27d60;
        padding: 0 0 1em 0;
        text-align: center;
    }
    #search_filter label{
        margin: 0 1em;
    }
    #search{
        padding: 0.25em 0.5em;
        border-radius: 5px;
    }
</style>

<div>

    <form id="search_filter" method="GET" action="search_results.php">
        <label>
            <br>Location <input id="location" type="text" placeholder="Example: Porto" name="location" value="<?php echo htmlspecialchars($location, ENT_QUOTES); ?>">
        </label>
        <label>
            <br>Check-In <input id="CheckIn" type="date" name="checkin" value="<?php echo htmlspecialchars($checkin, ENT_QUOTES); ?>">
        </label>
        <label>
            <br>Check-Out <input id="CheckOut" type="date" name="checkout" value="<?php echo htmlspecialchars($checkout, ENT_QUOTES); ?>">
        </label>
        <label>
            <br>Guests <input type="number" name="guests" min="1" value="<?php echo htmlspecialchars($guests, ENT_QUOTES); ?>">
        </label>
        <label>
            <input id="search" type="submit" value="Search">
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