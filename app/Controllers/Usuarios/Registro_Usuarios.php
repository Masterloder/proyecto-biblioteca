<?php 
session_start();
require_once("../../../public/Config/Database/Conexion.php");
require_once("../../Models/Usuarios/Usuarios.php");


$Nombre = ($_POST['Nombre']);
$Apellido = ($_POST['Apellido']);
$direccion = ($_POST['direccion']);
$telefono = ($_POST['telefono']);
$cedula = ($_POST['cedula']);
$email = ($_POST['Correo']);
$Contraseña = md5($_POST['Contraseña']);


if (empty($Nombre or $Apellido )) {
    header('location: ../../Views/Usuarios/Registro_de_usuario.php?error=El Nombre y Apellido es requerido');
    exit();
} elseif (empty($Contraseña)) {
    header("location: ../../Views/Usuarios/Registro_de_usuario.php?error=La Contraseña es requerida");
    exit();
}elseif (empty($email)) {
    header("location: ../../Views/Usuarios/Registro_de_usuario.php?error=El Correo es requerido");
    exit();
}elseif (empty($cedula)) {
    echo "hola";
}  else{

    $Usuario = new Inicio_sesion();
    $correo = $Usuario->Valcorreo($email);
    if ($correo == 1) {
        header("location: ../../../public/Config/inicio_de_sesion.php?error=El Correo ingresado ya esta registrado");
        exit();
    }else {
        $Registro = new Inicio_sesion();
    $regis = $Registro->RegisUsuario($cedula,$Nombre ,$Apellido,$email,$direccion,$telefono,$Contraseña);
    $r=$regis;
    if ($r == 1) {
        header("location:  ../../../public/Config/inicio_de_sesion.php?error=Usuario Creado Correctamente");
        exit();
    }
    }
}
?>