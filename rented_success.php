<?php
    include_once('database/connection.php');
    include_once('database/house_q.php');
?>
<link href="css/style.css" rel="stylesheet">
<div id="Rent_success">
<?php
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if($email == false) {
        $email = NULL;
    }

    $id = NULL;
    if(preg_match("/^[1-9][0-9]*$/",$_POST['id'])){
        $id = $_POST['id'];
    }
    
    $checkin = NULL;
    $date = date_parse_from_format("d/m/Y", $_POST['checkin']);
    if (checkdate($date['day'], $date['month'], $date['year'])) {
        $checkin = isset($_POST['checkin']) ? ($_POST['checkin']) : '';
    }

    $checkout = NULL;
    $date = date_parse_from_format("d/m/Y", $_POST['checkout']);
    if (checkdate($date['day'], $date['month'], $date['year'])) {
        $checkout = isset($_POST['checkout']) ? ($_POST['checkout']) : '';
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
        else header("Location: .php");
    }
    else header("Location: index.php");
?>
</div>
