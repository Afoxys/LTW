<style>
 h1 {
     user-select:none;
 }
</style>

<section id="form">
    <h1>Book your stay</h1>
    <form method="get">
    <label>
        <br>Where<input type="text" placeholder="Example: Porto" name="Location">
    </label>
    <label>
        <br>Check-In <input id="CheckIn" type="date" name="CheckIn">
    </label>
    <label>
        <br>Check-Out<input id="CheckOut" type="date" name="CheckOut">
    </label>

    <script>
        let today = new Date().toISOString().substr(0, 10);
        document.getElementById("CheckIn").setAttribute("min", today);
        document.getElementById("CheckOut").setAttribute("min", today);
    </script>

    <label>
        <br>Guests<input type="number" name="Guests" min="1"> <br>
    </label>
    <input  type="submit" value="Search">
    </form>
</section>