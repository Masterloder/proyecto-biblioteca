<?php 
session_start();
require_once("../../../public/Config/Database/Autoload.php");
require_once("../../../public/Config/Database/Conexion.php");
require_once "../../../public/Config/Database/Control.php";
require_once("../../Models/Libros/Modificar_libros.php");

    $Eliminar = ($_POST['Eliminar']);
    $ID_libro = ($_POST['Modificar']);
    $Registrar = ($_POST['Registrar']);
    $ISBN = ($_POST['ISBN']);
    $fechaEdicion = ($_POST['fechaEdicion']);
    $editorial = ($_POST['editorial']);
    $disponibilidad = ($_POST['disponibilidad']);
    $titulo = ($_POST['titulo']);
    $tema = ($_POST['tema']);
    $ID_Autor = ($_POST['Autores']);


    if (isset($_POST['Eliminar'])) {

        $libros = new Modificar_libro();
        $Eliminar = $libros->ElimLibros($Eliminar );

        header("location:  ../../Views/Libros/Lista_Libros.php");
        exit();
    }
    if (isset($_POST['Modificar'])) {
           $titulo1= '"'."$titulo".'"';

        $Act_libro = new Modificar_libro();
        $Actualizar = $Act_libro->ActLibro( $ISBN, $titulo1,$tema, $editorial,$disponibilidad,$fechaEdicion,$ID_libro,$ID_Autor );

        header("location:  ../../Views/Libros/Lista_Libros.php");
        exit();

    }
    if (isset($_POST['Registrar'])){

        $Registro = new Modificar_libro();
        $result= $Registro->InsertLibro(ISBN: $ISBN,titulo: $titulo,tema:$tema,editorial: $editorial,disponibilidad:$disponibilidad,fechaEdicion:$fechaEdicion);
        $ID_libro = $result;

        $Autor_libro = $Registro->Insert_Aut_Libro($ID_libro,$ID_Autor);

        header("location:  ../../Views/Libros/Lista_Libros.php");


    }


?>