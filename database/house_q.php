<?php

function try_insert_house($title, $price, $city, $region, $country, $street, $door, $floor, $postal, $description, $beds,
                        $pet, $kitchen, $wifi, $air_con, $low_mobility, $washing) {

    // check if any param is null here


    global $db;
    $options = ['cost' => 12];
    $stmt = $db->prepare('INSERT INTO House VALUES (?, ?, ?, ?,     ?, ?, ?, ?, ?, ?, ?,     ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    try {
        $stmt->execute(array(

            NULL,
            $_SESSION['email'],
            1000,
            2000,

            $city,
            $region,
            $country,
            $street,
            $door,
            $floor,
            $postal,

            $title,
            $price,
            $beds,
            $pet,
            $kitchen,
            $wifi,
            $air_con,
            $low_mobility,
            $washing,
            0,
            $description
        ));
        return 'OK';
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            return "Duplicate Address";
        } else {
            throw $e;
        }
    }
}

?>
