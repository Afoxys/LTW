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

function try_authentification($email, $pwd) {

    if($email === NULL || $pwd === NULL)
        return false;

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
