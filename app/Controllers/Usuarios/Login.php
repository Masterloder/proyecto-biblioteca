<?php

require_once("../../../public/Config/Database/Autoload.php");
require_once("../../../public/Config/Database/Conexion.php");
require_once("../../Models/Usuarios/Usuarios.php");

/* Validacion de datos*/
if (isset($_POST['Correo']) && isset($_POST['Contraseña'])) {
        function Validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $Correo = ($_POST['Correo']);
    $Contraseña = Validate($_POST['Contraseña']);

    if (empty($Correo)) {
        header('location: ../../Views/Usuarios/inicio_de_sesion.php?error=El Correo es requerido');
        exit();
    } elseif (empty($Contraseña)) {
        header("location: ../../Views/Usuarios/inicio_de_sesion.php?error=La Contraseña es requerida");
        exit();
    } else {

        $Contraseña= md5($Contraseña);

        /*Inicio de sesion*/
        $Usuario = new Inicio_sesion();

        $user = $Usuario->ValUsuario($Correo,$Contraseña);

            session_start();

            if ($user ['correo'] == $Correo && $user ['contraseña'] == $Contraseña) {
                $_SESSION["login"] = "OK";
                $_SESSION['Correo'] = $user['correo'];
                $_SESSION['nombre'] = $user['nombre'];
                $_SESSION['apellido'] = $user['apellido'];
                $_SESSION['Rol'] = $user['id_rol'];
                $_SESSION['id'] = $user['id_usuario'];
                Echo $_SESSION['Correo'];
                header("location: ../../Views/Usuarios/inicio.php");

                exit();
            } else {
                header("location: ../../../public/Config/inicio_de_sesion.php?error=El Correo o La contraseña Incorrecta");
                exit();
            }

    }
} else {
    header("location: ../../../public/Config/inicio_de_sesion.php");
    
    exit();
}
