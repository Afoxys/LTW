<style>
    #SecondPage, #ThirdPage{
        Display: none;
    }
    #description {
        width: 25em;
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
    <form id="my-rent-container">

        <div id="FirstPage"> <!-- First form page -->
            <h1>Register your house</h1>
            <label><br>Title</label>
            <input type="text" id="title" maxlength="64" placeholder="Small title for your house..." required>
            <label><br>Daily Price</label>
            <input  id="daily_price" type="number" step="0.01" id="price" maxlength="5" required>
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
            <br><input type="button" value="Continue" onclick="open_second_page()">
        </div> <!-- First form page -->

        
        <div id="SecondPage"> <!-- Second form page -->
            <label><br>Description</label>
            <textarea id="description" maxlength="500" clos="50" rows="10" placeholder="Small description of your house..."></textarea>
            <label><br>Number of beds</label>
            <input type="number" id="bed_number" min="1">
            <br><input type="button" value="Back" onclick="back_first_page()">
            <input type="button" value="Continue" class="continue"  onclick="open_third_page()">
        </div> <!-- Second form page -->

        <div id="ThirdPage"><!-- Third form page -->
            <label class="switch">Pet Friendly
                <input id="pet" type="checkbox" value="off">
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
            <label class="switch">Low Mobility
                <input id="low_mobility" type="checkbox">
                <span class="slider round"></span>
            </label>
            <label class="switch">Washing Machine
                <input id="washing" type="checkbox">
                <span class="slider round"></span>
            </label>
            <br><input type="button" value="Back" onclick="back_second_page()"><br>
            <br><input type="submit" value="Register">
        </div><!-- Third form page -->
        
    </form>
</section>

<script>
    function open_second_page() {
        document.getElementById("FirstPage").style.display = "none";
        document.getElementById("SecondPage").style.display = "block";
    }
    function open_third_page() {
        document.getElementById("SecondPage").style.display = "none";
        document.getElementById("ThirdPage").style.display = "block";
    }
    function back_second_page() {
        document.getElementById("SecondPage").style.display = "block";
        document.getElementById("ThirdPage").style.display = "none";
    }
    function back_first_page() {
        document.getElementById("FirstPage").style.display = "block";
        document.getElementById("SecondPage").style.display = "none";
    }
</script>