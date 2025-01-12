<?php 
session_start();
require_once("../../../public/Config/Database/Autoload.php");
require_once("../../../public/Config/Database/Conexion.php");
require_once "../../../public/Config/Database/Control.php";
require_once("../../Models/Usuarios/Usuarios.php");

$Eliminar = ($_POST['Eliminar']);
$Modificar = ($_POST['Modificar']);
$Registrar = ($_POST['Registrar']);
$Nombre = ($_POST['nombre']);
$Apellido = ($_POST['apellido']);
$direccion = ($_POST['direccion']);
$telefono = ($_POST['telefono']);
$cedula = ($_POST['cedula']);
$email = ($_POST['email']);
$Contraseña = ($_POST['Contraseña']);

echo $Eliminar ;
Echo "hola:1";

if (isset($_POST['Eliminar'])) {
    $Eliminacion = new Inicio_sesion();
    Echo "hola:2";
    $eliminacion = $Eliminacion->ElimUsuario($Eliminar);
    Echo "hola:3";
        $r=$eliminacion;
        if ($r == 1) {
            header("location: ../../Views/Usuarios/Lista_Usuarios.php");
            exit();
        }
}
if (isset($_POST['Modificar'])) {

    $Actualizar = new Inicio_sesion();
    $actu = $Actualizar->ActuUsuario($cedula,$Nombre,$Apellido,$direccion,$telefono,$Modificar);
    
    $r=$actu;
    if ($r == 1) {
        header("location:  ../../Views/Usuarios/Lista_Usuarios.php");
        exit();
    }
}
?>