<style>
 h1 {
     user-select:none;
 }
</style>

<section id="form">
    <h1>Book your stay</h1>
    <form id="search_form" method="POST" action="search_results.php">
        <label>
            <p>Where</p>
            <input type="text" placeholder="Example: Porto" name="Location">
        </label>
        <label>
            <p>Check-In</p>
            <input id="CheckIn" type="date" name="checkin">
        </label>
        <label>
            <p>Check-Out</p>
            <input id="CheckOut" type="date" name="checkout">
        </label>
        <label>
            <p>Guests</p>
            <input type="number" name="Guests" min="1">
        </label>
        <label>
            <input type="submit" value="Search">
        </label>
    </form>
</section>

<script>
    let today = new Date().toISOString().substr(0, 10);
    document.getElementById("CheckIn").setAttribute("min", today);
    document.getElementById("CheckOut").setAttribute("min", today);
</script>