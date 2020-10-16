<?php
   include ("../includes/DbConnect.php");

   $db = new DbConnect();
   $con = $db->connect();
   
   // $query = "SELECT * FROM user ORDER BY apellidos";
   $query = "SELECT
               `user`.cedula,
               `user`.apellidos,
               `user`.nombres,
               `user`.edad,
               `user`.direccion,
               `user`.genero,
               `user`.telefono,
               `user`.email,
               `user`.codigo,
               login.privilegio,
               login.estado 
            FROM
               `user`
               INNER JOIN login ON `user`.cedula = login.username 
            ORDER BY apellidos ASC";
   $resultado = mysqli_query($con, $query);

   if (!$resultado) {
      die("ERROR");
   } else {
      $arreglo["data"] = [];
      while($data = mysqli_fetch_assoc($resultado)) {
         $arreglo["data"][] = $data;
      }

      echo json_encode($arreglo);
   }

   mysqli_free_result($resultado);
   mysqli_close($con);

?>