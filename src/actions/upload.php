<?php
  // Get image ID
  include_once('../database/house_q.php');
  $id = $_POST['id'];
  $count = try_get_image_count_by_id($id);

  $pathOriginals = "../images/houses/h$id/originals";
  $pathMedium = "../images/houses/h$id/medium";
  
  if(!is_dir($pathOriginals)) {
	mkdir($pathOriginals,0777,true);
  }
  if(!is_dir($pathMedium)) {
	mkdir($pathMedium,0777,true);
  }

  // Generate filenames for original and medium files
  if($count == 0) {
	$originalFileName = "$pathOriginals/h$id.jpg";
	$mediumFileName = "$pathMedium/h$id.jpg";
  }
  else {
	$originalFileName = "$pathOriginals/h$id-$count.jpg";
	$mediumFileName = "$pathMedium/h$id-$count.jpg";
  }

  // Move the uploaded file to its final destination
  move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);
  // Crete an image representation of the original image
  $original = imagecreatefromjpeg($originalFileName);

  $width = imagesx($original);     // width of the original image
  $height = imagesy($original);    // height of the original image
  $square = min($width, $height);  // size length of the maximum square

  // Calculate width and height of medium sized image (max width: 400)
  $mediumwidth = $width;
  $mediumheight = $height;
  if ($mediumwidth > 400) {
	$mediumwidth = 400;
	$mediumheight = $mediumheight * ( $mediumwidth / $width );
  }

  // Create and save a medium image
  $medium = imagecreatetruecolor($mediumwidth, $mediumheight);
  imagecopyresized($medium, $original, 0, 0, 0, 0, $mediumwidth, $mediumheight, $width, $height);
  imagejpeg($medium, $mediumFileName);
  
  echo ($count + 1);
  $msg = update_image_count_by_id($id, ($count+1));

  header("Location: ../manage_my_houses.php");

?>
