<?php
require 'config-food.php';

// Get the posted data.
if(isset($_POST['edit'])) {
  
    $ouverture = $_POST['ouverture'];
    $fermeture = $_POST['fermeture'];
}

 
  // Update.
  $sql = "UPDATE `horaire` SET ouverture = '$ouverture', fermeture= '$fermeture'
  
   WHERE id_horaire = '$id_horaire'  ";

  if(mysqli_query($con, $sql))
  {
    http_response_code(204);
  }
  else
  {
    return http_response_code(422);
  } 