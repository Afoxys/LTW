<style>
    #warning_message {
        width: 60%;
        padding: 2em;
        margin: 5% 20%;
        background-color: #f0f0f0;
        border: solid;
        border-radius: 10px;
        text-align: center;
    }
</style>

<?php
    include_once('templates/header.php');
    include_once('database/connection.php');
    include_once('database/house_q.php');
    include_once('templates/navbar.php');
?>
<div id="Rent_success">
<?php

    $error_msg = 'OK';

    if ($_SESSION['csrf'] === $_POST['csrf']) {

        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

        if($email != false) {
            
            $id = NULL;
            if(preg_match("/^[1-9][0-9]*$/",$_POST['id'])) {
                $id = $_POST['id'];

                $checkin = NULL;
                $date = date_parse_from_format("Y/m/d", $_POST['checkin']);
                $checkin = (checkdate($date['month'], $date['day'], $date['year'])) ? $_POST['checkin'] : "";
                $date = date_parse_from_format("Y/m/d", $_POST['checkout']);
                $checkout = (checkdate($date['month'], $date['day'], $date['year'])) ? $_POST['checkout'] : "";

                $can_rent = check_rent_validity($id, $checkin, $checkout);
                if($can_rent === true) {
                    $msg = try_rent_house($email, $id, $checkin, $checkout);
                    if($msg === 'OK') {
                        ?>
                        <h1 id="warning_message"> <?php
                        echo nl2br("Rented House successfuly with the following arguments:\n");
                        echo "User: ",$email;
                        echo nl2br("\n");
                        echo "Rented house with id: ",$id;
                        echo nl2br("\n");
                        echo "With the following check-in date: ",$checkin;
                        echo nl2br("\n");
                        echo "With the following check-out date: ",$checkout;
                        echo nl2br("\n");
                        ?> </h1> <?php
                    }
                    else { $error_msg = 'Failed to rent.'; }
                } else { $error_msg = 'Rent period is invalid.'; }
            } else { $error_msg = 'Failed to rent.'; }
        } else { $error_msg = 'Failed to rent.'; }
    } else { $error_msg = 'Failed to rent.'; }

    if($error_msg !== 'OK') { ?>
        <h1 id="warning_message"><?php echo htmlentities($error_msg, ENT_QUOTES); ?></h1> <?php
    } ?>

</div>
<?php include_once('templates/footer.php'); ?>
