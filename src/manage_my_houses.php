<style>
    .house_simple {
        text-decoration: none;
        font-family: 'Roboto', sans-serif;
        grid-template-columns: 10% 10% 80%;
        grid-template-rows: 10% 80% 10%;
    }

    .house_simple:visited {
        color: black;
    }

    .house_simple:hover article{
        border-color: #e27d60;
    }

    .house_simple:active {
        color: #e27d60;
    }

    .house_simple article{
        border-width: 2px;
    }

    .house_simple header {
        font-size: 1.5em;
    }

    .house_simple h1 {
        grid-column-start: 1;
        grid-column-end: 2;
        grid-row-start: 1;
        grid-row-end: 2;
        margin: 0%;
        padding-left: 2%;
        font-weight: bold;
        color: black;
    }

    #active {
        grid-column-start: 2;
        grid-column-end: 3;
        grid-row-start: 2;
        grid-row-end: 3;
        color: black;
        padding-left: 2%;
        margin-top: 2em;
    }

    #active p{        
        margin: 0;
    }

    #true {
        color: green;
    }

    #false {
        color: red;
    }

    .house_simple #view_house_id {
        grid-column-start: 12;
        grid-column-end: 13;
        grid-row-start: 2;
        grid-row-end: 3;
        padding: 0;
        border-radius: 5px;
        margin: 0;
        max-width: 10em;
        border-width: 1px;
        text-align: right;
    }

    #house_selection {
        padding: 1em;
    }

</style>

<?php 

include_once('templates/header.php');
if(!isset($_SESSION['email'])) {
    header('Location: index.php');
}
include_once('templates/navbar.php');
include_once('database/house_q.php');

$houses = try_get_houses_by_owner_email($_SESSION['email']);

if (!empty($houses)) {
    foreach($houses as $house){
        $id = $house['houseID'];
        $active = $house['active'];
        $path = "images/houses/h$id/medium/h$id.jpg";
        ?> 
        <section>
            <div class="house_simple">
                <article>
                    <header><?php echo $house['title']?></header>
                    <img src="<?php echo $path?>" width="100" height="100"><br>
                    <div id="active">
                        <p>This house is </p>
                        <?php if($active == 'true') { ?>
                            <div id="true">
                                <p>active</p>
                            </div>
                        <?php }
                        else { ?>
                            <div id="false">
                                <p>inactive</p>
                            </div>
                        <?php } ?>
                    </div>
                    <form action="edit_house.php" method="post" id="view_house_id">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="hidden" name="active" value="<?php echo $active?>">
                        <input type="submit" id="house_selection" value="Edit this listing">
                    </form>
                </article>
            </div>
        </section>
    <?php
    }
}
else {
    ?>
    <div class="house_simple">
        <h1 class="house_simple">You have no active houses</h1>
    </div>
<?php
}
?>


<?php include_once('templates/footer.php'); ?>

<script>
    function rent_action() {
        console.log("You have rented this house successfully");
    }
</script>