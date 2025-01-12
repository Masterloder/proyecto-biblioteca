<?php
session_start();

if (!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")) {
    header("Location: ../proyecto/inicio.php");
    exit;
} else {
    header("Location: ../proyecto/inicio de sesion.php");
}