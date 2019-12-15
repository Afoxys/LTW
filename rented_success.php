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

    if ($_SESSION['csrf'] !== $_POST['csrf']) {

        $error_msg = 'Your session seems to be corrupted, please retry this action.';

    }
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if($email == false) {
        $email = NULL;
    }

    $id = NULL;
    if(preg_match("/^[1-9][0-9]*$/",$_POST['id'])){
        $id = $_POST['id'];
    }
    
    $checkin = NULL;
    $date = date_parse_from_format("Y/m/d", $_POST['checkin']);
    if (checkdate($date['month'], $date['day'], $date['year'])) {
        $checkin = $_POST['checkin'];
    }

    $checkout = NULL;
    $date = date_parse_from_format("Y/m/d", $_POST['checkout']);
    if (checkdate($date['month'], $date['day'], $date['year'])) {
        $checkout = $_POST['checkout'];
    }
    
    $can_rent = check_rent_validity($id, $checkin, $checkout);
    if($can_rent === true) {
        $msg = try_rent_house($email, $id, $checkin, $checkout);
        if($msg === 'OK') {
            echo nl2br("Rented House successfuly with the following arguments:\n");
            echo "User: ",$email;
            echo nl2br("\n");
            echo "Rented with house wtih id: ",$id;
            echo nl2br("\n");
            echo "With the following check-in date: ",$checkin;
            echo nl2br("\n");
            echo "With the following check-out date: ",$checkout;
            echo nl2br("\n");
        }
        else {
            ?>
            <h1 id="warning_message">Your rent action seems to have failed, please retry this action.</h1>
            <?php
        }
    }
    else {
    ?>
    <h1 id="warning_message">Your rent action seems to be invalid, please retry this action.</h1>
    <?php }
?>
</div>
<?php include_once('templates/footer.php'); ?>
