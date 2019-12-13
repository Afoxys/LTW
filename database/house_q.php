<?php

include_once('connection.php');


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
    $stmt = $db->prepare('
      SELECT * From House WHERE city = ?
      ');
    $stmt->execute(array($city));
    return $stmt->fetchAll();
  }

?>
