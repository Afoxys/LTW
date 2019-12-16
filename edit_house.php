<?php include_once('templates/header.php'); ?>
<?php include_once('templates/navbar.php'); ?>
<?php include_once('database/house_q.php'); ?>

<style>
    #form_display, #close_form_button {
        display: none;
    }
    #open_form_button, #close_form_button {
        padding: 0.25em;
    }
    #registerform #register_btn, #registerform #close_form_button{
    margin: 1em 0em 0em 0em;
    }
    #description_div{
        display: grid;
        grid-template-rows: auto auto;
        grid-template-columns: 20% 80%;
    }
    #description_div label{
        grid-column-start: 1;
        grid-column-end: 2;
        grid-row-start: 1;
        grid-row-end: 2;
    }
    #description_div textarea{
        grid-column-start: 2;
        grid-column-end: 3;
        grid-row-start: 1;
        grid-row-end: 3;
        padding: 0.5em 1em;
        margin: 1.5em 5em 1em 2em;
    }
</style>

<?php 

    $id = $_POST['id'];
    $active = $_POST['active'];
    $house_data = try_get_house_by_id($id);
?> 

<section id="registerform">
    <form action="actions/edit_house.php" method="post">
        <input type="hidden" name="id"  value="<?php echo htmlspecialchars($id, ENT_QUOTES); ?>">
        <h1>Edit your house listing</h1>
        <input type="button" id="open_form_button" value="Open" onclick="open_form()">
        <div id="form_display">
        <label><br>Title</label>
            <input type="text" name="title" maxlength="64" value="<?php echo $house_data['title']?>" required>
        <label><br>Daily Price</label>
            <input name="daily_price" type="number" step="0.01" id="price" maxlength="5" value="<?php echo $house_data['daily_price']?>" required>
        <div id="description_div">
            <label><br>Description</label>
            <textarea name="description" maxlength="500" clos="50" rows="10"><?php echo $house_data['house_description']?></textarea>
        </div>
        <label><br>Number of beds</label>
            <input type="number" name="bed_number" min="1" value="<?php echo $house_data['n_beds']?>">
        <br><input type="submit" id="register_btn" value="Edit">
        <input type="button" id="close_form_button" value="Close" onclick="close_form()">
        </div>
    </form>
</section>

<section id="registerform">
    <h2>Upload a photo</h2>
    <form action="actions/upload.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id"  value="<?php echo $id?>">
        <label></label><br>
        <input type="file" name="image"  accept="image/jpg, image/jpeg" required>
        <input type="submit" value="Upload">
    </form>
</section>

<?php if($active == 'true') { 
    ?>
    <section id="registerform">
    <h2>Stop renting your house</h2>
    <form action="actions/remove_house.php" method="post">
    <input type="hidden" name="active" value="false">
    <input type="hidden" name="id"  value="<?php echo $id?>">
    <label></label><br>
    <input type="submit" value="Stop">
    </form>
    </section> <?php
}
?>

<?php if($active == 'false') { 
?>
    <section id="registerform">
    <h2>Start renting your house</h2>
    <form action="actions/remove_house.php" method="post">
    <input type="hidden" name="active" value="true">
    <input type="hidden" name="id"  value="<?php echo $id?>">  
    <label></label><br>
    <input type="submit" value="Start">
    </form>
    </section> <?php
}
?>


<?php include_once('templates/footer.php'); ?>

<script>
    function open_form() {
        document.getElementById("form_display").style.display = "block";
        document.getElementById("open_form_button").style.display = "none";
        document.getElementById("close_form_button").style.display = "block";
    }
    function close_form() {
        document.getElementById("form_display").style.display = "none";
        document.getElementById("open_form_button").style.display = "block";
        document.getElementById("close_form_button").style.display = "none";
    }
</script>