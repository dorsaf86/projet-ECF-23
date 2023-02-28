<?php
require 'config-food.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);

  // Validate.
  if ((int)$request->img_id< 1 || trim($request->img_titre) == '' || (float)$request->img_src< 0) {
    return http_response_code(400);
  }

  // Sanitize.
  $id    = mysqli_real_escape_string($con, (int)$request->img_id);
  $img_titre = mysqli_real_escape_string($con, trim($request->img_titre));
  $img_src = mysqli_real_escape_string($con, (float)$request->img_src);

  // Update.
  $sql = "UPDATE `images` SET `img_titre`='$img_titre',`img_src`='$img_src' WHERE `img_id` = '{$id}' LIMIT 1";

  if(mysqli_query($con, $sql))
  {
    http_response_code(204);
  }
  else
  {
    return http_response_code(422);
  }  
}