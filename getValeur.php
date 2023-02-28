<?php

require 'config-food.php';
// Get the posted data.
$postdata = file_get_contents("php://input");

if (isset($postdata) && !empty($postdata)) {


// chercher les valeurs par défaut nbPersonnes et allergy dans la table users
$request = json_decode($postdata);

$allergy = mysqli_real_escape_string($con, trim($request->allergy));
$nbPersonnes = mysqli_real_escape_string($con, trim($request->nbPersonnes));
$sql = $con->prepare("SELECT * FROM `users` WHERE email = ?");

$sql->execute();
$result = $sql->get_result();

$users = [];
$i = 0;

while($dataRow = $result->fetch_assoc()){
    
    $users[$i]['nbPersonnes'] = $dataRow['nbPersonnes'];
    $users[$i]['allergy'] = $dataRow['allergy'];
    
    $i++;
}
}