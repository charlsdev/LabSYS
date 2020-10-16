<?php
   include ("../includes/DbConnect.php");
   include ("../includes/DbFuntion.php");

   $db = new DbConnect();
   $ver = new DbOperation;
   $con = $db->connect();

   //Datos insert laboratorista
   $cedula = (isset($_POST['cedulaUsuario'])) ? $_POST['cedulaUsuario'] : '';
   $passAntigua = (isset($_POST['passAntigua'])) ? $_POST['passAntigua'] : '';
   $encPassAnt = md5($passAntigua);

   $passNueva = (isset($_POST['passNueva'])) ? $_POST['passNueva'] : '';
   $encPassNue = md5($passNueva);

   $passConfir = (isset($_POST['passConfir'])) ? $_POST['passConfir'] : '';
   $encPassConf = md5($passConfir);

   if ($encPassNue === $encPassConf) {
      if ($encPassAnt === $encPassNue) {
         $res = '4';
         echo $res;
      } else {
         $res = $ver->exitPass($encPassAnt, $cedula);
         if ($res == true) {
            $ver->changePass($encPassNue, $cedula);
            $res = true;
            echo $res;
            
         } else {
            $res = '0';
            echo $res;
         }
      }
   } else {
      $res = '3';
      echo $res;      
   }
   

?>