<?php

require 'config-food.php';


 $menu = [];
 $formules = [];
  

 $sql =  "SELECT formules.idFormule,
                 formules.prix,
                 formules.description,
                 formules.formule_name,
                 formules.idMenu,
                 menu.titre AS titre
          FROM formules
          INNER JOIN menu
          ON   formules.idMenu = menu.idMenu
          ORDER BY titre";
 
 if($result = mysqli_query($con,$sql))
 {
   $i = 0;
   while($row = mysqli_fetch_assoc($result))
   {
    
     $formules[$i]['idFormule']   = $row['idFormule'];
     $formules[$i]['prix'] = $row['prix'];
     $formules[$i]['description'] = $row['description'];
     $formules[$i]['formule_name'] = $row['formule_name'];
     $formules[$i]['idMenu'] = $row['idMenu'];
     $formules[$i]['titre'] = $row['titre'];
    
     
     $i++;
   }
 
   echo json_encode($formules);
 }
 else
 {
  echo('error');
   http_response_code(404);
 }
