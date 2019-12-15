<?php
    include_once('database/connection.php');
    include_once('database/house_q.php');
?>
<link href="css/style.css" rel="stylesheet">
<div id="Rent_success">
<?php
    echo nl2br("Rented House successfuly with the following arguments:\n");
    $email = $_POST['email'];
    echo "User: ",$email;
    echo nl2br("\n");
    $id = $_POST['id'];
    echo "Rented with house wtih id: ",$id;
    echo nl2br("\n");
    $checkin = isset($_POST['checkin']) ? ($_POST['checkin']) : '';
    echo "With the following check-in date: ",$checkin;
    echo nl2br("\n");
    $checkout = isset($_POST['checkout']) ? ($_POST['checkout']) : '';
    echo "With the following check-out date: ",$checkout;
    echo nl2br("\n");
    $msg = try_rent_house($email, $id, $checkin, $checkout);
    if($msg === 'OK') {
        $success = true;
    }
    else {
        $success = false;
    }
?>
</div>
