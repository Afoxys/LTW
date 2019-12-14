<?php include_once('templates/header.php'); ?>
<?php include_once('templates/navbar.php'); ?>
<?php include_once('database/house_q.php'); ?>

<style>
    #registerform {
        height: 10em;
    }
    #form_display, #close_form_button {
        display: none;
    }
</style>

<?php 

    $id = $_POST['id'];
    echo $id;
    $house_data = try_get_house_by_id($id);
?> 

<section id="registerform">
    <form method="post">

            <h1>Edit your house listing</h1><input type="button" id="open_form_button" value="open" onclick="open_form()">
            <input type="button" id="close_form_button" value="close" onclick="close_form()">
            <div id="form_display">
            <label><br>Title</label>
                <input type="text" id="title" maxlength="64" placeholder="<?php echo $house_data['title']?>" required>
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
            <label><br>Description</label>
                <textarea id="description" maxlength="500" clos="50" rows="10" placeholder="Small description of your house..."></textarea>
            <label><br>Number of beds</label>
                <input type="number" id="bed_number" min="1">
            <label><br>House available start</label>
                <input id="availability_start" type="date" required>
            <label><br>House available end</label>
                <input id="availability_end" type="date" required>
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
            <input type="submit" id="register_btn" value="Register">
            </div>
    </form>
</section>

<section id="registerform">
    <h2>Upload a photo</h2>
    <form action="actions/upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image"  accept="image/jpg, image/jpeg">
        <input type="submit" value="Upload">
    </form>
</section>
    

<?php include_once('templates/footer.php'); ?>

<script>
    function open_form() {
        document.getElementById("form_display").style.display = "block";
        document.getElementById("open_form_button").style.display = "none";
        document.getElementById("close_form_button").style.display = "block";
        document.getElementById("registerform").style.height = "70em";
    }
    function close_form() {
        document.getElementById("form_display").style.display = "none";
        document.getElementById("open_form_button").style.display = "block";
        document.getElementById("close_form_button").style.display = "none";
        document.getElementById("registerform").style.height = "10em";
    }
</script>