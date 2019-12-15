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
//     $stmt = $db->prepare("SELECT houseID FROM House
//                         WHERE houseID NOT IN 
//                         (SELECT house FROM Rent WHERE (? < ?) AND (? <= rent_end AND ? >= rent_start))
//                         AND availability_start <= ? AND availability_end > ?
//                         AND n_beds >= ? AND city LIKE '%?%' AND region LIKE '%?%' AND country LIKE '%?%'"
//     );
//     $stmt->execute(array(
//         $checkin,
//         $checkout,
//         $checkin,
//         $checkout,
//         $checkin,
//         $checkout,
//         $guests,
//         $location,
//         $location,
//         $location
//     ));
//     return $stmt->fetchAll();
// }

// function getAllHousesBySearch($location, $checkin, $checkout, $guests) {
//     global $db;    
//     $stmt = $db->prepare("SELECT houseID FROM House
//                         WHERE houseID NOT IN 
//                         (SELECT house FROM Rent WHERE (:checkin < :checkout) AND (:checkin <= rent_end AND :checkout >= rent_start))
//                         AND availability_start <= :checkin AND availability_end > :checkout
//                         AND n_beds >= :guests AND city LIKE '%:location%' AND region LIKE '%:location%' AND country LIKE '%:location%'"
//     );
//     $stmt->bindParam(':location', $location);
//     $stmt->bindParam(':checkin', $checkin);
//     $stmt->bindParam(':checkout', $checkout);
//     $stmt->bindParam(':guests', $guests);
//     $stmt->execute();
//     return $stmt->fetchAll();
// }

function getAllHousesByTimedSearch($location, $checkin, $checkout, $guests) {
    echo $location;
    echo $checkin;
    echo $checkout;
    echo $guests;
    global $db;    
    $stmt = $db->prepare("SELECT houseID FROM House
                        WHERE houseID NOT IN 
                        (SELECT house FROM Rent WHERE (:checkin < :checkout) AND (:checkin <= rent_end AND :checkout >= rent_start))
                        AND availability_start <= :checkin AND availability_end > :checkout
                        AND n_beds >= :guests"
    );
    $stmt->bindParam(':checkin', $checkin);
    $stmt->bindParam(':checkout', $checkout);
    $stmt->bindParam(':guests', $guests);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getAllHousesBySearch($location, $guests) {
    echo $location;
    echo $guests;
    global $db;    
    $stmt = $db->prepare("SELECT * FROM House
                        WHERE n_beds >= :guests
                        AND availability_end > strftime('%s','now')"
    );
    $stmt->bindParam(':guests', $guests);
    $stmt->execute();
    return $stmt->fetchAll();
}

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

function try_rent_house($email, $id, $checkin, $checkout) {
    global $db;

    $stmt = $db->prepare('INSERT INTO Rent VALUES (?, ?, ?, ?, NULL, NULL)');
    $stmt->execute(array(
        $email,
        $id,
        $checkin,
        $checkout
    ));
    return 'OK'; 
}

function try_get_rents_by_owner_email($email) {

    if($email === NULL)
        return NULL;

    global $db;
    $stmt = $db->prepare('SELECT house,rent_start,rent_end,user FROM House INNER JOIN Rent ON houseID=house WHERE owner= ?');
    $stmt->execute(array($email));
    $houses_rent_data = $stmt->fetchAll();
    if ($houses_rent_data !== false)
        return $houses_rent_data;
    else
        return NULL;
}

function try_get_rent_count($id) {

    if($id === NULL)
        return NULL;

    global $db;
    $stmt = $db->prepare('SELECT COUNT(house) AS rent_count FROM Rent WHERE house= ?');
    $stmt->execute(array($id));
    $count = $stmt->fetch();
    if ($count !== false)
        return $count['rent_count'];
    else
        return NULL;
}

function try_get_rents_by_house($id) {

    if($id === NULL)
        return NULL;

    global $db;
    $stmt = $db->prepare('SELECT * FROM Rent WHERE house= ?');
    $stmt->execute(array($id));
    $rent_listings = $stmt->fetchAll();
    if ($rent_listings !== false)
        return $rent_listings;
    else
        return NULL;
}
?>