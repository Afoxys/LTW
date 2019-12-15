<?php
  // Get image ID
  include_once('../database/house_q.php');
  $id = $_POST['id'];
  $is_active = $_POST['active'];
  echo $is_active;

  $msg = try_remove_house($id, $is_active);
  echo '<br>',$msg;

  header("Location: ../manage_my_houses.php")

?>
