<?php

include_once('connection.php');


function try_insert_house($title, $price, $city, $region, $country, $street, $door, $floor, $postal,
                        $description, $beds, $start, $end,
                        $pet, $kitchen, $wifi, $air_con, $low_mobility, $washing) {

    // check if any param is null here


    global $db;
    $options = ['cost' => 12];
    $stmt = $db->prepare('INSERT INTO House VALUES (?, ?, ?, ?,     ?, ?, ?, ?, ?, ?, ?,     ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    try {
        $stmt->execute(array(

            NULL,
            $_SESSION['email'],
            $start,
            $end,

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

function try_get_house_by_id($id) {

    if($id === NULL)
        return NULL;

    global $db;
    $stmt = $db->prepare('SELECT * FROM House WHERE houseID = ?');
    $stmt->execute(array($id));
    $house_data = $stmt->fetch();
    if ($house_data !== false)
        return $house_data;
    else
        return NULL;
}

function try_get_house_rating_by_id($id) {

    if($id === NULL)
        return NULL;

    global $db;
    $stmt = $db->prepare('SELECT AVG(rating) as avg_rat FROM Rent INNER JOIN House ON house = houseID WHERE house = ?');
    $stmt->execute(array($id));
    $house_data = $stmt->fetch();
    if ($house_data !== false)
        return $house_data;
    else
        return NULL;
}

function getAllHousesByCity($city) {
    global $db;
    $stmt = $db->prepare('SELECT * From House WHERE city = ?');
    $stmt->execute(array($city));
    return $stmt->fetchAll();
}

// function getAllHousesBySearch($location,$checkin,$checkout,$guests) {
//     global $db;
//     $stmt = $db->prepare('SELECT * From House WHERE city = ?');
//     $stmt->execute(array($city));
//     return $stmt->fetchAll();
// }

function try_get_houses_by_owner_email($email) {

    if($email === NULL)
        return NULL;

    global $db;
    $stmt = $db->prepare('SELECT * FROM House WHERE owner = ?');
    $stmt->execute(array($email));
    $houses_data = $stmt->fetchAll();
    if ($houses_data !== false)
        return $houses_data;
    else
        return NULL;
}

function get_last_house_id() {
    global $db;
    $stmt = $db->prepare('SELECT seq FROM sqlite_sequence WHERE name="House"');
    $stmt->execute();
    $house_id = $stmt->fetch();
    if ($house_id !== false)
        return $house_id['seq'];
    else
        return 0;
}

?>
