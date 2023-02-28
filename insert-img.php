<?php
require 'config-food.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);


  
 
  $img_titre = mysqli_real_escape_string($con, trim($request->img_titre));
  $img_src = mysqli_real_escape_string($con, $request->img_src);


  // Create.
  $sql = "INSERT INTO `images`(
    `img_titre`,
    `img_src`
    ) VALUES
    ('{$img_titre}',
    '{$img_src}')
    ";

    if(mysqli_query($con,$sql))
    {
      http_response_code(201);
    }
    else
  {
    http_response_code(422);
  }
}
?>