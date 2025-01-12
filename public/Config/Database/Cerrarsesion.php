<?php
session_start();
session_unset();
session_destroy();
header("location: ../inicio_de_sesion.php");
?>