<?php

// se connecter a la base de donnees
require_once("config-food.php");

$postdata = file_get_contents("php://input");

if (isset($postdata) && !empty($postdata)) {
  $request = json_decode($postdata);

  $password = mysqli_real_escape_string($con, trim($request->password));
  $email = mysqli_real_escape_string($con, trim($request->email));

  $sql = $con->prepare("SELECT * FROM `users` WHERE email = ? ");
  $sql->bind_param('s', $email);
  $sql->execute();
  if ($result = $sql->get_result()) {
    $row = array();
    $i = 0;
    //S'il y a un résultat, vérifiez si le mot de passe correspond en utilisant password_verify();
    $dataRow = $result->fetch_assoc();
    $verify = password_verify($password, trim($dataRow['password']));
    if ($verify) {
      // echo "connexion reussi!";
      $row[$i]['idUsers'] = $dataRow['idUsers'];
      $row[$i]['nbPersonnes'] = $dataRow['nbPersonnes'];
      $row[$i]['allergy'] = $dataRow['allergy'];
      $row[$i]['username'] = $dataRow['username'];
      $row[$i]['email'] = $dataRow['email'];
      $row[$i]['ROLE'] = $dataRow['ROLE'];
      echo json_encode($row);
    } else {
      echo ('password not verify');
    }
  } else {
    http_response_code(404);
    echo json_encode('error 404');
  }
}
