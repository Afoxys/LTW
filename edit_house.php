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
    #open_form_button, #close_form_button {
        padding: 0.25em;
    }
</style>

<?php 

    $id = $_POST['id'];
    $active = $_POST['active'];
    $house_data = try_get_house_by_id($id);
?> 

<section id="registerform">
    <form method="post" action="actions/update_house.php">

            <h1>Edit your house listing</h1>
            <input type="button" id="open_form_button" value="open" onclick="open_form()">
            <input type="button" id="close_form_button" value="close" onclick="close_form()">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div id="form_display">
            <label><br>Title</label>
                <input type="text" id="title" maxlength="64" placeholder="<?php echo $house_data['title']?>" required>
            <label><br>Daily Price</label>
                <input  id="daily_price" type="number" step="0.01" id="price" maxlength="5" required>
            <br><input type="submit" id="register_btn" value="Edit">
            </div>
    </form>
</section>

<section id="registerform">
    <h2>Upload a photo</h2>
    <form action="actions/upload.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id"  value="<?php echo $id?>">
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
        document.getElementById("registerform").style.height = "20em";
    }
    function close_form() {
        document.getElementById("form_display").style.display = "none";
        document.getElementById("open_form_button").style.display = "block";
        document.getElementById("close_form_button").style.display = "none";
        document.getElementById("registerform").style.height = "10em";
    }
</script>