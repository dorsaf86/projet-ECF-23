
<?php

require_once 'config-food.php';


// Extract, validate and sanitize the id.
$id = ($_GET['img_id'] !== null && (int)$_GET['img_id'] > 0)? mysqli_real_escape_string($con, (int)$_GET['img_id']) : false;

if(!$id)
{
  return http_response_code(400);
}

// Delete.
$sql = "DELETE FROM `images` WHERE `img_id` ='{$id}' LIMIT 1";

if(mysqli_query($con, $sql))
{
  http_response_code(204);
}
else
{
  return http_response_code(422);
}
?>