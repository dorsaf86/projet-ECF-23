<?php
require 'config-food.php';
try {

    $sql = $con->prepare("SELECT * FROM `menu`");

    $sql->execute();
    $result = $sql->get_result();

    
    $menu = [];
    $i = 0;
    while($dataRow = $result->fetch_assoc()){
        
        $menu[$i]['titre'] = $dataRow['titre'];
        $menu[$i]['idMenu'] = $dataRow['idMenu'];
        $i++;
    }

    echo json_encode($menu);
} catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}
?>