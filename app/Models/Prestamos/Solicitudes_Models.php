<?php
require_once("../../../public/Config/Database/Autoload.php");
require_once("../../../public/Config/Database/Conexion.php");

class solicitudes extends Conexion
{
    private $conexion;

    public function __construct()
    {

        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();

    }
/*---------Informacion de las solicitudes-------------*/
    public function getSolicitud()
    {

        $sql = "SELECT * FROM `Solicitudes` WHERE `estatus_solicitud` ='0'; ";
        $execute = $this->conexion->query($sql);
        $consult = $execute->fetchall(PDO::FETCH_ASSOC);
        return $consult;

    }
/*---------Informacion de las solicitudes del Usuario Activo-------------*/
public function get2Solicitud($Id_usuario)
{

    $sql = "SELECT * FROM `Solicitudes` WHERE `Id_usuario` ='$Id_usuario'; ";
    $execute = $this->conexion->query($sql);
    $consult = $execute->fetchall(PDO::FETCH_ASSOC);
    return $consult;

}
/*---------Informacion del estado de las solicitudes del Usuario Activo-------------*/
public function get3Solicitud($id_libro,$Id_usuario)
{

    $sql = "SELECT * FROM `Solicitudes` WHERE `Id_usuario` ='$Id_usuario' AND 'id_libro' ='$id_libro' ; ";
    $execute = $this->conexion->query($sql);
    $consult = $execute->fetchall(PDO::FETCH_ASSOC);
    return $consult;

}


/*---------Registro de las solicitudes-------------*/
public function RegisSolicitud($id_libro,$Id_usuario)
{

    $sql = "INSERT INTO `Solicitudes` (`Id_solicitud`, `id_libro`, `Id_usuario`, `estatus_solicitud`) VALUES (NULL, '$id_libro', '$Id_usuario', '0'); ";
    $execute = $this->conexion->query($sql);
    $consult = $execute->fetchall(PDO::FETCH_ASSOC);
    return 1;

}
/*---------modificacion de las solicitudes-------------*/
public function Modif_Solicitud($New_idlibro,$id_libro,$Id_usuario)
{

    $sql = "UPDATE `Solicitudes` SET
            `id_libro`='$New_idlibro',
             WHERE `Id_usuario` ='$Id_usuario' AND 'id_libro' ='$id_libro' ; ";
    $execute = $this->conexion->query($sql);
    $consult = $execute->fetchall(PDO::FETCH_ASSOC);
    return $consult;

}
/*---------aceptacion o negacion de las solicitudes-------------*/
public function Acep_NegacSolic($id_libro,$Id_usuario,$estatus)
{

    $sql = "UPDATE `Solicitudes` SET 
                `estatus_solicitud`='$estatus'
                 WHERE `id_libro`= '$id_libro' AND `Id_usuario`= '$Id_usuario';  ";
    $execute = $this->conexion->query($sql);
    $consult = $execute->fetchall(PDO::FETCH_ASSOC);
    return $consult;

}



}
?>