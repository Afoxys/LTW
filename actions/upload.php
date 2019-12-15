<?php
  // Get image ID
  include_once('../database/house_q.php');
  $id = $_POST['id'];
  $count = try_get_image_count_by_id($id);
  echo $count;
  
  
  // Generate filenames for original and medium files
  if($count == 0) {
    $originalFileName = "../images/houses/originals/$id.jpg";
    $mediumFileName = "../images/houses/thumbs_medium/$id.jpg";
  }
  else {
    $originalFileName = "../images/houses/originals/$id-$count.jpg";
    $mediumFileName = "../images/houses/thumbs_medium/$id-$count.jpg";
  }

  // Move the uploaded file to its final destination
  move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);
  // Crete an image representation of the original image
  $original = imagecreatefromjpeg($originalFileName);
  echo $original;

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

?>
