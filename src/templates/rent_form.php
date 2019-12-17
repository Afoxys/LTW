<style>
    #SecondPage{
        Display: none;
    }
    textarea {
        max-width: 25em;
    }
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
    }
    input[type=number] {
        -moz-appearance:textfield; /* Firefox */
    }
</style>

<section id="registerform">
    <form id="my-rent-container" method="post">
        <!-- First form page -->
        <div id="FirstPage">
            <h1>Register your house</h1>
            <label><br>Title</label>
                <input type="text" id="title" maxlength="64" placeholder="Small title for your house..." required>
            <label><br>Daily Price</label>
                <input  id="daily_price" type="number" step="0.01" id="price" maxlength="6" required>
            <label><br>City</label>
                <input type="text" id="city" required>
            <label><br>State / Region</label>
                <input type="text" id="region" required>
            <label><br>Country</label> 
                <input type="text" id="country" required>
            <label><br>Street</label>
                <input type="text" id="street" required>
            <label><br>Door</label>
                <input type="text" id="door" required>
            <label><br>Floor</label>
                <input type="text" id="floor">
            <label><br>Postal Code</label>
                <input type="text" pattern = "\d{4}-\d{3}" id="postal_code" required>
            <br><input id="button" type="button" value="Continue" onclick="open_second_page()">
        </div>
        <!-- First form page -->

        <!-- Second form page -->
        <div id="SecondPage">
            <label><br>Description</label>
                <textarea id="description" maxlength="500" clos="50" rows="10" placeholder="Small description of your house..."></textarea>
            <label><br>Number of beds</label>
                <input type="number" id="bed_number" min="1">
            <label><br>House available start</label>
                <input id="availability_start" type="date" required>
            <label><br>House available end</label>
                <input id="availability_end" type="date" required>
            <br><input id="button" type="button" value="Back" onclick="back_first_page()">
            <input id="button" type="button" value="Continue" class="continue"  onclick="open_third_page()">
        </div>
        <!-- Second form page -->

        <!-- Third form page -->
        <div id="ThirdPage">
            <label class="switch">Pet Friendly
                <input id="pet" type="checkbox">
                <span class="slider round"></span>
            </label>
            <label class="switch">Kitchen
                <input id="kitchen" type="checkbox">
                <span class="slider round"></span>
            </label>
            <label class="switch">WIFI
                <input id="wifi" type="checkbox">
                <span class="slider round"></span>
            </label>
            <label class="switch">Air conditioning
                <input id="air_con" type="checkbox">
                <span class="slider round"></span>
            </label>
            <label class="switch">Low Mobility Access
                <input id="low_mobility" type="checkbox">
                <span class="slider round"></span>
            </label>
            <label class="switch">Washing Machine
                <input id="washing" type="checkbox">
                <span class="slider round"></span>
            </label>
            <div id="last_buttons">
                <br><input id="button" type="button" value="Back" onclick="back_second_page()">
                <input type="hidden" id="csrf" value="<?php echo $_SESSION['csrf'] ?>">
                <input id="button" type="submit" id="register_btn" value="Register">
            </div>
        </div>
        <!-- Third form page -->
    </form>
</section>

<script>
    function open_second_page() {
        document.getElementById("FirstPage").style.display = "none";
        document.getElementById("SecondPage").style.display = "block";
    }
    function open_third_page() {
        document.getElementById("SecondPage").style.display = "none";
        document.getElementById("ThirdPage").style.display = "flex";
    }
    function back_second_page() {
        document.getElementById("SecondPage").style.display = "block";
        document.getElementById("ThirdPage").style.display = "none";
    }
    function back_first_page() {
        document.getElementById("FirstPage").style.display = "block";
        document.getElementById("SecondPage").style.display = "none";
    }

    let today = new Date().toISOString().substr(0, 10);
    document.getElementById("availability_start").setAttribute("min", today);
    document.getElementById("availability_end").setAttribute("min", today);
</script>
