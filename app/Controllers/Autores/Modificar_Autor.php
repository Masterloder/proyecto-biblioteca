<?php 
session_start();
require_once("../../../public/Config/Database/Autoload.php");
require_once("../../../public/Config/Database/Conexion.php");
require_once "../../../public/Config/Database/Control.php";
require_once("../../Models/Autores/Autore.php");




    $Eliminar = ($_POST['Eliminar']);
    $Modificar = ($_POST['Modificar']);
    $Registrar = ($_POST['Registrar']);
    $Nombre = ($_POST['nombre']);
    $Apellido = ($_POST['apellido']);
    $Nacionalidad = ($_POST['nacionalidad']);
    Echo "holla";
    if (isset($_POST['Eliminar'])) {

        $eliminar = new Autores();
        $Delete = $eliminar->ElimAutor($Eliminar );
        header("location:  ../../Views/Autores/Lista_Autores.php");
        exit();

    }
    if (isset($_POST['Modificar'])) {

        $Actu = new Autores();
        $Actualizar = $Actu->Actu_Autor($Nombre,$Apellido,ID_nacionalidad: $Nacionalidad,id_autor: $Modificar );
        header("location:  ../../Views/Autores/Lista_Autores.php");
        exit();


    }
    if (isset($_POST['Registrar'])){
        $autor = new Autores();
        $insert = $autor->RegAutor(nombre: $Nombre,apellido: $Apellido, ID_nacionalidad: $Nacionalidad);
        $r=$insert;
        if ($r == 1) {
            header("location:  ../../Views/Autores/Lista_Autores.php");
            exit();
        }


    }


?>