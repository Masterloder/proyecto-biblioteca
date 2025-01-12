<?php
require_once("../../../public/Config/Database/Autoload.php");
require_once("../../../public/Config/Database/Conexion.php");

class Inicio_sesion extends Conexion
{
    private $Contraseña;
    private $Correo;
    private $conexion;

    public function __construct()
    {

        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();

    }
/*---------------Registro de nuevo Usuario --------------------*/

public function RegisUsuario($cedula,$Nombre ,$Apellido,$email,$direccion,$telefono,$Contraseña)
{

    $sql = "INSERT INTO `user`(`cedula`,`nombre`,`apellido`,`correo`,`direccion`,`telefono`,`contraseña`,`id_rol`,`id_usuario`,`estatus_user`)
    VALUES('$cedula','$Nombre ','$Apellido','$email','$direccion','$telefono','$Contraseña','2',NULL,'1');";
    $execute = $this->conexion->query($sql);
    $consult =$execute->fetchall(PDO::FETCH_ASSOC);
    return 1;


}
    /*------------------Validacion de Correo y contraseña de Usuario --------------------*/

    public function ValUsuario(string $Correo,string $Contraseña)
    {

        $sql = "SELECT * FROM user WHERE correo = '$Correo' AND contraseña = '$Contraseña' ";
        $execute = $this->conexion->query($sql);
        $consult =$execute->fetchall(PDO::FETCH_ASSOC);
        $result = $consult['0'];
        return $result ;


    }/*------------------Validacion de Correo  --------------------*/

    public function Valcorreo($correo)
    {

        $sql = "SELECT * FROM `user` WHERE correo = '$correo'";
        $execute = $this->conexion->query($sql);
        $consult =$execute->fetchall(PDO::FETCH_ASSOC);
        $r = count($consult);
        return $r ;


    }
/*------------------Informacion de Usuario Activos--------------------*/
    public function GetUsuario(){

        $sql = "SELECT * FROM `user` WHERE `estatus_user`!='0' AND `id_rol`!='1'; ";
        $execute2 = $this->conexion->query($sql);
        $consult =$execute2->fetchall(PDO::FETCH_ASSOC);
        return $consult;
    }
/*------------------Informacion de Usuario para Modificar --------------------*/
    public function Get2Usuario($id_usuario){

        $sql = "SELECT * FROM `user` WHERE `id_usuario` = $id_usuario ; ";
        $execute2 = $this->conexion->query($sql);
        $consult =$execute2->fetchall(PDO::FETCH_ASSOC);
        return $consult;
    }

/*------------------Eliminacion de Usuario--------------------*/
    public function ElimUsuario($Eliminar){

        $sql = "UPDATE `user`
                SET `estatus_user` = '0'
                WHERE `user`.`id_usuario` = '$Eliminar ';";
        $execute2 = $this->conexion->query($sql);
        $consult =$execute2->fetchall(PDO::FETCH_ASSOC);
        return 1;
    }
/*------------------Actualizacion de Usuario--------------------*/
    public function ActuUsuario($cedula,$Nombre ,$Apellido ,$direccion,$telefono,$Modificar){

        $sql = "UPDATE
                `user` SET
                `cedula` = '$cedula ',
                `nombre` = '$Nombre ',
                `apellido` = '$Apellido ',
                `direccion` = '$direccion',
                `telefono` = '$telefono'
                WHERE `user`.`id_usuario` = $Modificar;";
        $execute2 = $this->conexion->query($sql);
        $consult =$execute2->fetchall(PDO::FETCH_ASSOC);
        return 1;
    }






}




?>