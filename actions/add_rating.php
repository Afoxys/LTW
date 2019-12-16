<?php
	session_start();

    include_once('../database/house_q.php');

    $id = $_POST['id'];
    $rent_start = $_POST['rent_start'];
    $rating_value = $_POST['rating_value'];
    $rating_comment = $_POST['rating_comment'];
    echo 'id: ',$id;
    echo 'start: ',$rent_start;
    echo 'rating: ',$rating_value;
    echo 'comment: ',$rating_comment;
    $msg = try_add_rating($id, $rent_start, $rating_value, $rating_comment);
    echo "MSG: ",$msg;
?>
