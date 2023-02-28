<?php

require 'config-food.php';
// Get the posted data.
$postdata = file_get_contents("php://input");

if (isset($postdata) && !empty($postdata)) {

    $maxPlace = 15;

    // Extract the data.
    $request = json_decode($postdata);
    $date = mysqli_real_escape_string($con, trim($request->date));
    //  verifier si il ya des palces
    $sql = $con->prepare("SELECT * FROM `reservation` WHERE date =  ? ");
    $sql->bind_param('s', $date);
    $sql->execute();
    $result = $sql->get_result();
    $Personnes = 0;
    $i = 0;
    while ($dataRow = $result->fetch_assoc()) {
        $Personnes += $dataRow['nb_personnes'];
        $i++;
    }
    if ($Personnes == $maxPlace) {
        $message = "malhesement y as plus des places disponibles";
        echo json_encode($message);
    } else {
        $placeRester = $maxPlace - $Personnes;
        $message = "Il reste $placeRester place";
        echo json_encode($message);
    }
}
