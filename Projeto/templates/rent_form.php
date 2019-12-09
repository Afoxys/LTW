<section id="registerform">
    <!-- First form page -->
    <form action="../Projeto/upload/upload.php" method="post" enctype="multipart/form-data">
        <div id="FirstPage">
        <h1>Register your house</h1>
        <label><br>Title</label>
            <input type="text" name="title" maxlength="64" placeholder="Small title for your house..." required>
        <label><br>Daily Price</label>
            <input type="text" name="price" maxlength="5" required>
        <label><br>City</label>
            <input type="text" name="city" required>
        <label><br>State / Region</label>
            <input type="text" name="state" required>
        <label><br>Country</label> 
            <input type="text" name="country" required>
        <label><br>Street</label>
            <input type="text" name="street" required>
        <label><br>Door</label>
            <input type="text" name="door" required>
        <label><br>Floor</label>
            <input type="text" name="floor">
        <label><br>Postal Code</label>
            <input type="text" pattern = "\d{4}-\d{3}" name="postalcode" required>
        </div>
        <!-- First form page -->
        <!-- Second form page -->
        <div id="SecondPage">
            <label><br>Description</label>
            <input type="text" name="description" maxlength="256" placeholder="Small description of your house...">
            <label><br>Number of beds</label>
            <input type="number" name="bed_numb" min="1">
            <label>Upload image</label>
            <input type="text" name="image_title">
            <input type="file" name="image">
        </div>
        <!-- Second form page -->
        <!-- Third form page -->
        <label class="switch">Pet Friendly
            <input type="checkbox" name="Pet">
            <span class="slider round"></span>
        </label>
        <label class="switch">WIFI
            <input type="checkbox" name="Pet">
            <span class="slider round"></span>
        </label>
        <label class="switch">Washing Machine
            <input type="checkbox" name="Pet">
            <span class="slider round"></span>
        </label>
        <label class="switch">Pet Friendly
            <input type="checkbox" name="Pet">
            <span class="slider round"></span>
        </label>
        <br><input type="submit" value="Register">
    </form>
    <!-- Third form page -->
    </form>
</section>