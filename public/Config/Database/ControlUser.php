<?php
session_start();
/*comprobacion que tipo de usuario eres*/
if ( $_SESSION['Rol'] == 1 ) {
  header("Location: ../../../app/Views/Usuarios/inicio.php");
  exit;
}



?>