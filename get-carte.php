<?php
require 'config-food.php';
try {

    $sql = $con->prepare("SELECT * FROM `categories`");
    // $sql->bind_param();
    $sql->execute();
    $result = $sql->get_result();

    // $dataRow = $result->fetch_row();
    $categories= [];
    $i = 0;
    while($dataRow = $result->fetch_assoc()){
        // echo($dataRow[0]);
        $categories[$i]['name_categorie'] = $dataRow['name_categorie'];
        $categories[$i]['idCategorie'] = $dataRow['idCategorie'];
        $i++;
    }

    echo json_encode($categories);
} catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}
?>