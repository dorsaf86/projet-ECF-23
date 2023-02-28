<?php

/**
 * Returns the list of horaire
 */
require 'config-food.php';

$horaire = [];

$sql = "SELECT  id_horaire, jour, ouverture, fermeture FROM horaire";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $horaire[$i]['id_horaire']   = $row['id_horaire'];
    $horaire[$i]['jour'] = $row['jour'];
    $horaire[$i]['ouverture'] = $row['ouverture'];
    $horaire[$i]['fermeture'] = $row['fermeture'];
   
    
    $i++;
  }

  echo json_encode($horaire);
}
else
{
  http_response_code(404);
}

 

 


 

 ?>