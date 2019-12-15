<style>
    #house_info {
        font-family: 'Open Sans', sans-serif;
        margin: 1em 0em;
        width:100%;
        padding: 0.5em;
        background:#f5f5f5;
        border-radius: 10px;
        border-style: solid;
        border-width: 2px;
        border-color: black;
    }

    #rent_info {
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
    }

    #title {
        font-size: 1.2em;
        font-weight: bold;
    }
    #count {
        font-family: 'Open Sans', sans-serif;
        color: #e27d60;
    }
</style>

<?php
	include_once('templates/header.php');
	include_once('templates/navbar.php');
	include_once('database/connection.php');
    include_once('database/house_q.php');
    
    $email = $_SESSION['email'];
    $houses = try_get_houses_by_owner_email($email);

    
    foreach($houses as $house) {
        $rents = try_get_rents_by_house($house['houseID']);


        $title = $house['title'];
        $id = $house['houseID'];
        $path = "images/houses/h$id/medium/h$id.jpg";
        $count = count($rents);
        if($count > 0){
            ?>
            <h1 id="count"> This house has been rented <?php echo $count ?> times! </h1>
            <div id="house_info">
                <header id="title"><?=$title?></header>
                <img src="<?php echo $path?>" width="200" height="200">
            <?php
            foreach($rents as $rent) {
            $tenant = $rent['user'];
            $checkin = date('d/m/Y', $rent['rent_start']);
            $checkout = date('d/m/Y', $rent['rent_end']);
            ?>
                <div id="rent_info">
                    <p id="tenant">Tenant: <?=$tenant?></p>
                    <p id="checkin">Check-In: <?=$checkin?></p>
                    <p id="checkin">Check-Out: <?=$checkout?></p>
                </div>
            <?php
            }
            ?></div><?php
        }
    }

    include_once('templates/footer.php');
?>