<?php 
   session_start();
   if($_SESSION['user']){
      
   }else{
      header("location: inicio_sesion.php");
   }

?>