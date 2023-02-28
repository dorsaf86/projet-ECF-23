<?php


// se connecter a la base de donnees
require 'config-food.php';

$postdata = file_get_contents("php://input");

if (isset($postdata) && !empty($postdata)) {


  $request = json_decode($postdata);

  $email = mysqli_real_escape_string($con, trim($request->email));
  $password = mysqli_real_escape_string($con, trim($request->password));
  $nbPersonnes = mysqli_real_escape_string($con, trim($request->nbPersonnes));
  $allergy =  mysqli_real_escape_string($con, trim($request->allergy));
  $username = mysqli_real_escape_string($con, trim($request->username));
  //hachage mot de passe

  $hash = trim(password_hash($password, PASSWORD_DEFAULT));

  $sql = "INSERT INTO `users`(     `email`,   `password`,     `nbPersonnes`,   `allergy`,     `username`) 
            VALUES ('{$email}', '{$hash}', '{$nbPersonnes}','{$allergy}','{$username}') ";


  if ($con->query($sql)  === TRUE) {

    $authdata =  [
      'email' => $email,
      'nbPersonnes' => $nbPersonnes,
      'allergy' => $allergy,
      'username' => $username,
      'idUsers'  => mysqli_insert_id($con),
      'ROLE'     => 'client'
    ];
    $row = array();
    $row[0]=$authdata;
    echo json_encode($row);
  }
}
