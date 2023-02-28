<?php

/**
 * Returns the list of images
 */
require 'config-food.php';

$images = [];

$sql = "SELECT  img_id, img_titre, img_src FROM images";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $images[$i]['img_id']   = $row['img_id'];
    $images[$i]['img_titre'] = $row['img_titre'];
    $images[$i]['img_src'] = $row['img_src'];
   
    
    $i++;
  }

  echo json_encode($images);
}
else
{
  http_response_code(404);
}

 

 


 

 ?>