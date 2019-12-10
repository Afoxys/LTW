<?php

function debug_insertUser($email, $pwd) {
    global $db;
    $options = ['cost' => 12];
    $stmt = $db->prepare('INSERT INTO Utilizador VALUES (?, ?, ?, ?)');
    $stmt->execute(array(
      $email,
      'Nelson',
      'Gregório',
      password_hash($pwd, PASSWORD_DEFAULT, $options))
    );
}

function try_insert_user($email, $first, $last, $phone, $pwd) {

    if($email === NULL || $first === NULL || $last === NULL || $phone === NULL || $pwd === NULL)
        return NULL;

    global $db;
    $options = ['cost' => 12];
    $stmt = $db->prepare('INSERT INTO Utilizador VALUES (?, ?, ?, ?, ?)');
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
    $stmt = $db->prepare('SELECT * FROM Utilizador WHERE email = ?');
    $stmt->execute(array($email));
    $userData = $stmt->fetch();
    if ($userData !== false && password_verify($pwd, $userData['hash']))
        return $userData;
    else
        return NULL;
}

?>
