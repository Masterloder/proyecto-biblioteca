<?php
session_start();
/*comprobacion que tipo de usuario eres*/
if ( $_SESSION['Rol'] == 2 ) {
  header("Location: ../../../app/Views/Usuarios/Menu.php");
  exit;
}


