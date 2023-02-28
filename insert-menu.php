<?php
try {

  require 'config-food.php';
  $postdata = file_get_contents("php://input");

  if (isset($postdata) && !empty($postdata)) {
    // Extract the data.
    $request = json_decode($postdata);

    $idMenu = mysqli_real_escape_string($con, trim($request->idMenu));
    $titreAutre = mysqli_real_escape_string($con, trim($request->titreAutre));
    $prix = mysqli_real_escape_string($con, $request->prix);
    $description = mysqli_real_escape_string($con, $request->description);
    $formule_name = mysqli_real_escape_string($con, $request->nom_formule);
    $prix = intval($prix);

    if ($idMenu === '0') {
      $sql = $con->prepare("INSERT INTO menu (titre) VALUES (?)");
      $sql->bind_param('s', $titreAutre);
      if ($sql->execute()) {
        $idMenu = $con->insert_id;
        $sqlForm = $con->prepare("INSERT INTO formules(prix, description,formule_name,idMenu ) VALUES(?,?,?,?)");
        $sqlForm->bind_param('issi', $prix, $description, $formule_name, $idMenu);
        $sqlForm->execute();
        if ($sqlForm->execute()) {
          echo json_encode("formule ajouter avec success");
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
      }
    } else {
      $idMenu = intval($idMenu);
      $sqlForm = $con->prepare("INSERT INTO formules(prix, description, formule_name,idMenu ) VALUES(?,?,?,?)");
      $sqlForm->bind_param('issi', $prix, $description, $formule_name, $idMenu);
      if ($sqlForm->execute()) {
        echo json_encode("formule ajouter avec success");
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
      }
    }
  } else {
    echo ('error postdata');
  }
} catch (Exception $e) {
  echo 'Exception reçue : ',  $e->getMessage(), "\n";
}
?>