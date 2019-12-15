<?php
  // Get image ID
  include_once('../database/house_q.php');
  $id = $_POST['id'];

  remove_house($id);

  header("Location: ../manage_my_houses.php")

?>
