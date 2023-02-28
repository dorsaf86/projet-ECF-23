<?php

try {

  require 'config-food.php';
  $postdata = file_get_contents("php://input");

  if (isset($postdata) && !empty($postdata)) {
    // Extract the data.
    $request = json_decode($postdata);

    $idCategorie = mysqli_real_escape_string($con, trim($request->idCategorie));
    $titreAutre = mysqli_real_escape_string($con, trim($request->titreAutre));
    $prix = mysqli_real_escape_string($con, $request->prix);
    $description = mysqli_real_escape_string($con, $request->description);
    $titre= mysqli_real_escape_string($con, $request->titre);
    $prix = intval($prix);

    if ($idCategorie === '0') {
      $sql = $con->prepare("INSERT INTO categories (name_categorie) VALUES (?)");
      $sql->bind_param('s', $titreAutre);
      if ($sql->execute()) {
        $idCategorie= $con->insert_id;
        $sqlPla = $con->prepare("INSERT INTO plats(titre, description, prix, idCategorie ) VALUES(?,?,?,?)");
        $sqlPla->bind_param('issi',  $titre, $description, $prix, $idCategorie);
        $sqlPla->execute();
        if ($sqlPla->execute()) {
          echo json_encode("categorie ajouter avec success");
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
      }
    } else {
      $idCategorie = intval($idCategorie);
      $sqlPla= $con->prepare("INSERT INTO plats(titre, prix, description,idCategorie ) VALUES(?,?,?,?)");
      $sqlPla->bind_param('issi',$titre, $prix, $description, $idCategorie);
      if ($sqlPla->execute()) {
        echo json_encode("categrorie ajouter avec success");
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
