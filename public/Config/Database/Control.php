<?php
session_start();
/*comprobacion de si hay una sesion iniciada */
if (!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")) {
  header("Location: ../../../public/Config/Index.php");
  exit;
}



?>