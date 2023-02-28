<?php

/**
 * Returns the list of images
 */
require 'config-food.php';

$tables = [];

$sql = "SELECT  id_Reservation, email, username, date, time, allergy, nb_personnes FROM reservation";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $tables[$i]['id_Reservation'] = $row['id_Reservation'];
    $tables[$i]['email'] = $row['email'];
    $tables[$i]['username'] = $row['username'];
    $tables[$i]['date'] = $row['date'];
    $tables[$i]['time'] = $row['time']; 
    $tables[$i]['allergy'] = $row['allergy'];
    $tables[$i]['nb_personnes'] = $row['nb_personnes'];
    
    $i++;
  }

  echo json_encode($tables);
}
else
{
  http_response_code(404);
}

 

 


 

 ?>