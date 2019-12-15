<style>
    .house_simple {
        text-decoration: none;
        font-size: 1.5em;
        font-family: 'Roboto', sans-serif;
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
        border-style: solid;
        border-width: 2px;
        border-color: black;
        border-radius: 5px;
        margin: 1%;
        padding: 1%;
        display: grid;
        grid-template-columns: 100px auto auto;
        grid-template-rows: 10% 80% 10%;
    }

    .house_simple img {
        grid-column-start: 1;
        grid-column-end: 2;
        grid-row-start: 1;
        grid-row-end: 4;
    }

    .house_simple header {
        grid-column-start: 1;
        grid-column-end: 2;
        grid-row-start: 1;
        grid-row-end: 2;
        margin: 0%;
        padding-left: 2%;
        font-weight: bold;
    }

    .house_simple #view_house_id {
        grid-column-start: 12;
        grid-column-end: 12;
        grid-row-start: 2;
        grid-row-end: 3;
        padding: 0;
        border-radius: 5px;
        margin: 0;
        max-width: 10em;
        border-width: 1px;
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

foreach($houses as $house){
    $id = $house['houseID'];
    $path = "images/houses/h$id/medium/h$id.jpg";
    ?> 
    <section>
        <div class="house_simple">
            <article>
            <header><?php echo $house['title']?></header>
            <img src="<?php echo $path?>" width="100" height="100"><br>
            <form action="edit_house.php" method="post" id="view_house_id">
                <input type="hidden" name="id" value="<?php echo $id?>">
                <input type="submit" id="house_selection" value="Edit this listing">
            </form>
            </article>
        </div>
    </section>
<?php
}
?>

<?php include_once('templates/footer.php'); ?>

<script>
    function rent_action() {
        console.log("You have rented this house successfully");
    }
</script>