<?php 
session_start();
require_once("../../../public/Config/Database/Autoload.php");
require_once("../../../public/Config/Database/Conexion.php");
require_once "../../../public/Config/Database/Control.php";
require_once("../../Models/Prestamos/Solicitudes_Models.php");

    $ID_libro = ($_POST['Solicitar']);
    $id_usuario = $_SESSION['id'];
    $Registrar = ($_POST['Registrar']);
    $ISBN = ($_POST['ISBN']);
    $fechaEdicion = ($_POST['fechaEdicion']);
    $editorial = ($_POST['editorial']);
    $disponibilidad = ($_POST['disponibilidad']);
    $titulo = ($_POST['titulo']);
    $tema = ($_POST['tema']);
    $ID_Autor = ($_POST['Autores']);
echo ($_POST['Solicitar']);

    if (isset($_POST['Modificar'])) {

        $Act_libro = new solicitudes();
        $Actualizar = $Act_libro->Modif_Solicitud();

        header("location:  ../../Views/Libros/Lista_de_libros.php");
        exit();

    }
    if (isset($_POST['Solicitar'])){

        $Solicitar = new solicitudes();

        $result= $Solicitar->RegisSolicitud($ID_libro,$id_usuario);


        header("location:  ../../Views/Libros/Lista_de_libros.php");


    }


?>