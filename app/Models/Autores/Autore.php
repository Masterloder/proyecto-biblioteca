<?php
require_once("../../../public/Config/Database/Autoload.php");
require_once("../../../public/Config/Database/Conexion.php");

class Autores extends Conexion
{
    private $conexion;

    public function __construct()
    {

        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();

    }
    /*----------------------------Informacion del Autor--------------- */
    public function getAutor()
    {

        $sql = "SELECT * FROM autor WHERE `Status_autor` !=0  ;";
        $execute = $this->conexion->query($sql);
        $consult =$execute->fetchall(PDO::FETCH_ASSOC);
        return $consult;


    }
/*----------------------------Informacion de la Nacionalidad--------------- */
    public function getNac()
    {

        $sql = "SELECT * FROM `nacionalidad` ;";
        $execute = $this->conexion->query($sql);
        $consult =$execute->fetchall(PDO::FETCH_ASSOC);
        return $consult;


    }
    /*----------------------------Informacion de la Nacionalidad especifica--------------- */
    public function get2Nac($ID_nacionalidad)
    {

        $sql = "SELECT * FROM `nacionalidad` WHERE `ID_nacionalidad`= '$ID_nacionalidad' ;";
        $execute = $this->conexion->query($sql);
        $consult =$execute->fetchall(PDO::FETCH_ASSOC);
        return $consult;


    }
    /*----------------------------Informacion de la Nacionalidad excluyendo una en especifico--------------- */
    public function get3Nac($ID_nacionalidad)
    {

        $sql = "SELECT * FROM `nacionalidad` WHERE `ID_nacionalidad` != '$ID_nacionalidad' ;";
        $execute = $this->conexion->query($sql);
        $consult =$execute->fetchall(PDO::FETCH_ASSOC);
        return $consult;


    }
/*----------------------------Informacion del Autor excluyendo una en especifico --------------- */
    public function get2Autor($id_autor)
    {

        $sql = "SELECT * FROM autor WHERE `Status_autor`!=0 AND `id_autor` !='$id_autor' ;";
        $execute = $this->conexion->query($sql);
        $consult =$execute->fetchall(PDO::FETCH_ASSOC);
        return $consult;


    }
    /*----------------------------Informacion del Autor excluyendo una en especifico --------------- */
    public function get4Autor($id_autor)
    {

        $sql = "SELECT * FROM autor WHERE `Status_autor`!=0 AND `id_autor`='$id_autor' ;";
        $execute = $this->conexion->query($sql);
        $consult =$execute->fetchall(PDO::FETCH_ASSOC);
        return $consult;


    }
    /*----------------------------Informacion del Autor especifico--------------- */
    public function get3Autor($ID_Libro)
    {

        $sql = "SELECT `id_autor` FROM `libro_autor` WHERE `id_libro` = '$ID_Libro' ;";
        $execute = $this->conexion->query($sql);
        $consult =$execute->fetchall(PDO::FETCH_ASSOC);
        return $consult;


    }
/*----------------------------Registro del Autor--------------- */
    public function RegAutor(string $nombre,string $apellido,string $ID_nacionalidad)
    {

        $sql2 = "INSERT INTO `autor` (`nombre_autor`,`apellido_autor`, `ID_nacionalidad`, `Status_autor`) VALUES ('$nombre','$apellido','$ID_nacionalidad','1')";
        $execute = $this->conexion->query($sql2);
        return 1;


    }
/*----------------------------Actualizacion del Autor--------------- */
    public function Actu_Autor(string $nombre,string $apellido,string $ID_nacionalidad,$id_autor)
    {

        $sql2 = "UPDATE `autor` SET 
                    `nombre_autor` = '$nombre', 
                    `apellido_autor` = '$apellido', 
                    `ID_nacionalidad` = '$ID_nacionalidad' 
                    WHERE `autor`.`id_autor` = '$id_autor'";
        $execute = $this->conexion->query($sql2);
        return 1;


    }
/*----------------------------Eliminacion del Autor--------------- */
    public function ElimAutor(string $Eliminar)
    {

        $sqlID = "UPDATE `autor` SET `Status_autor` = '0' WHERE `autor`.`id_autor` = $Eliminar; ";
        $this->conexion->query($sqlID);
        return 1;
    }

}




?>