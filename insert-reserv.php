<?php
require 'config-food.php';
// Get the posted data.
$postdata = file_get_contents("php://input");

if (isset($postdata) && !empty($postdata)) {
  $maxPlace = 15;
  try {
    // Extract the data.
    $request = json_decode($postdata);

    $email = mysqli_real_escape_string($con, trim($request->email));
    $username = mysqli_real_escape_string($con, $request->username);
    $date = mysqli_real_escape_string($con, trim($request->date));
    $time = mysqli_real_escape_string($con, $request->time);
    $allergy = mysqli_real_escape_string($con, trim($request->allergy));
    $nbPersonnes = mysqli_real_escape_string($con, trim($request->nbPersonnes));
    $sql = $con->prepare("SELECT * FROM `reservation` WHERE email =  ? and date = ? ");
    $sql->bind_param('ss', $email, $date);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->fetch_row()) {
      $message = "l'email existant";
      echo json_encode($message);
    } else {
      //  verifier si il ya des palces
      $sql = $con->prepare("SELECT * FROM `reservation` WHERE date =  ? ");
      $sql->bind_param('s', $date);
      $sql->execute();
      $result = $sql->get_result();
      $Personnes = $nbPersonnes;
      $i = 0;
      while ($dataRow = $result->fetch_assoc()) {
        $Personnes += $dataRow['nb_personnes'];
        $i++;
      }
      if ($Personnes >= $maxPlace) {
        $message = "malhesement y as plus des places disponibles";
        echo json_encode($message);
      } else {
        $sql = "INSERT INTO `reservation`(      `username`,      `email`,      `date`,      `time`,      `allergy`,      `nb_personnes`) 
         VALUES (      '{$username}',      '{$email}',      '{$date}',      '{$time}',      '{$allergy}',      '{$nbPersonnes}') ";
         
        if (mysqli_multi_query($con, $sql)) {
          echo json_encode("resarvation ajouter avec success");
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
      }
    }
  } catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
}
