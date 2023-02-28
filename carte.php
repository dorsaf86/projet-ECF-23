<?php

require 'config-food.php';


 $categories = [];
 $plats = [];
  

 $sql =  "SELECT plats.idPlat,
                 plats.titre,
                 plats.description,
                 plats.prix,
                 plats.idCategorie,
                 categories.name_categorie AS categories
          FROM plats
          INNER JOIN categories
          ON   plats.idCategorie = categories.idCategorie
          ORDER BY name_categorie ";
 
 if($result = mysqli_query($con,$sql))
 {
   $i = 0;

   while($row = mysqli_fetch_assoc($result))
   {
    
     $plats[$i]['idPlat']   = $row['idPlat'];
     $plats[$i]['titre'] = $row['titre'];
     $plats[$i]['description'] = $row['description'];
     $plats[$i]['prix'] = $row['prix'];
     $plats[$i]['idCategorie'] = $row['idCategorie'];
     $plats[$i]['name_categorie'] = $row['name_categorie'];
    
     
     $i++;
   }
 
   echo json_encode($plats);
 }
 else
 {
  echo('error');
   http_response_code(404);
 }
 ?>