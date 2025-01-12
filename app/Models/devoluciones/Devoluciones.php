<?php
require_once("../../../public/Config/Database/Autoload.php");
require_once("../../../public/Config/Database/Conexion.php");

class Devoluciones extends Conexion
{
    private $conexion;

    public function __construct()
    {

        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();

    }
    /*--------------Informacion de las Devoluciones------------*/
    public function getDevoluciones()
    {

        $sql = "SELECT * FROM prestamo
                    JOIN libro on libro.id_libro = prestamo.id_libro
                    JOIN libro_autor on libro_autor.id_libro = libro.id_libro
                    JOIN autor ON autor.id_autor = libro_autor.id_autor
                    JOIN user ON user.cedula = prestamo.cedula_usuario
                    WHERE `estadoPrestamo`!='1';";
        $execute = $this->conexion->query($sql);
        $consult = $execute->fetchall(PDO::FETCH_ASSOC);
        return $consult;

    }
    /*--------------Informacion de las Devoluciones------------*/
    public function get2Devoluciones()
    {

        $sql = "SELECT * FROM prestamo
                    JOIN libro on libro.id_libro = prestamo.id_libro
                    JOIN libro_autor on libro_autor.id_libro = libro.id_libro
                    JOIN autor ON autor.id_autor = libro_autor.id_autor
                    JOIN user ON user.cedula = prestamo.cedula_usuario
                    WHERE `estatus_prestamo`!='1';";
        $execute = $this->conexion->query($sql);
        $consult = $execute->fetchall(PDO::FETCH_ASSOC);
        return $consult;

    }


    }



?>