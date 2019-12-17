<?php

include_once('connection.php');

function try_insert_user($email, $first, $last, $phone, $pwd) {

    if($email === NULL || $first === NULL || $last === NULL || $phone === NULL || $pwd === NULL)
        return NULL;

    global $db;
    $options = ['cost' => 12];
    $stmt = $db->prepare('INSERT INTO User VALUES (?, ?, ?, ?, ?)');
    try {
        $stmt->execute(array(
            $email,
            $first,
            $last,
            $phone,
            password_hash($pwd, PASSWORD_DEFAULT, $options))
        );
        return 'OK';
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            return "Duplicate Email";
        } else {
            throw $e;
        }
    }
}

function try_authentification($email, $pwd) {

    if($email === NULL || $pwd === NULL)
        return NULL;

    global $db;
    $stmt = $db->prepare('SELECT * FROM User WHERE email = ?');
    $stmt->execute(array($email));
    $userData = $stmt->fetch();
    if ($userData !== false && password_verify($pwd, $userData['hash']))
        return $userData;
    else
        return NULL;
}

function try_get_user($email) {

    if($email === NULL)
        return NULL;

    global $db;
    $stmt = $db->prepare('SELECT * FROM User WHERE email = ?');
    $stmt->execute(array($email));
    $user_data = $stmt->fetch();
    if ($user_data !== false)
        return $user_data;
    else
        return NULL;
}

function try_update_user($email, $first, $last, $phone, $pwd) {
    if($email === NULL || $first === NULL || $last === NULL || $phone === NULL || $pwd === NULL)
        return NULL;

    global $db;
    $stmt = $db->prepare('UPDATE User SET firstname=?, lastname=?, phone=?, hash=? WHERE email = ?');
    $stmt->execute(array(
        $first,
        $last,
        $phone,
        $pwd,
        $email
    ));

    return 'OK';
}

?>
