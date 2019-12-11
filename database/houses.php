<?php

  function getAllHousesByCity($city) {
    global $db;
    $stmt = $db->prepare('
      SELECT * From House WHERE city = ?
      ');
    $stmt->execute(array($city));
    return $stmt->fetchAll();
  }

  function getHouseById($id) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM House  WHERE houseID = ?');
    $stmt->execute(array($id));
    return $stmt->fetch();
  }

?>

<!--
  function getRatingForHouse($id) {
    global $db;
    $stmt = $db->prepare('
      
      ');
    $stmt->execute();
    return $stmt->fetchAll();
  }
  -->
