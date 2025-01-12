<?php
require_once("../../../public/Config/Database/Autoload.php");
require_once("../../../public/Config/Database/Conexion.php");

class Prestamos extends Conexion
{
    private $conexion;

    public function __construct()
    {

        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();

    }
/*---------Informacion del Prestamo-------------*/
    public function getPrestamos()
    {

        $sql = "SELECT * FROM prestamo
                    JOIN libro on libro.id_libro = prestamo.id_libro
                    JOIN libro_autor on libro_autor.id_libro = libro.id_libro
                    JOIN autor ON autor.id_autor = libro_autor.id_autor
                    JOIN user ON user.cedula = prestamo.cedula_usuario
                    WHERE `estatus_prestamo`!='0';";
        $execute = $this->conexion->query($sql);
        $consult = $execute->fetchall(PDO::FETCH_ASSOC);
        return $consult;

    }
/*---------Eliminacion del Prestamo-------------*/
    public function Elim_Prestamo($ID_prestamo)
    {

        $sql = "UPDATE `prestamo`
            SET `estatus_prestamo` = '0'
            WHERE `prestamo`.`id_prestamos` = '$ID_prestamo';";
        $this->conexion->query($sql);
        return 1;

    }
/*---------Registro  del Prestamo-------------*/
    public function Regis_Prestamo($fechaPrestamo, $fechaDevolucion, $Estadodelprestamo, $id_libro,$cedula_usuario)
    {

        $sql = "INSERT INTO `prestamo`(
            `id_prestamos`,
            `fechaPrestamo`,
            `fechaDevolucion`,
            `estadoPrestamo`,
            `id_libro`,
            `cedula_usuario`,
            `estatus_prestamo`
        )
        VALUES(
            NULL,
            '$fechaPrestamo',
            '$fechaDevolucion',
            '$Estadodelprestamo',
            '$id_libro ',
            '$cedula_usuario',
            '1'
        );";
        $this->conexion->query($sql);
        return 1;

    }
/*---------Actualizacion del Prestamo-------------*/
    public function ActuPrestamo($Modificar, $fechaPrestamo, $fechaDevolucion, $Estadodelprestamo, $id_libro, $cedula_usuario)
    {
        $sql = "UPDATE `prestamo` SET
        `fechaPrestamo` = '$fechaPrestamo',
        `fechaDevolucion` = '$fechaDevolucion',
        `estadoPrestamo` = '$Estadodelprestamo',
        `id_libro` = '$id_libro',
        `cedula_usuario` = '$cedula_usuario',
        `estatus_prestamo` = '1'
        WHERE `id_prestamos` = '$Modificar' ";
        $this->conexion->query($sql);
        return 1;
    }
/*---------Informacion para la lista de Prestamo-------------*/
    public function get2Prestamos($ID_prestamo)
    {
        $sql = "SELECT * FROM prestamo
                JOIN libro on libro.id_libro = prestamo.id_libro
                JOIN libro_autor on libro_autor.id_libro = libro.id_libro
                JOIN autor ON autor.id_autor = libro_autor.id_autor
                JOIN user ON user.cedula = prestamo.cedula_usuario
                WHERE  `id_prestamos`='$ID_prestamo';";
        $execute = $this->conexion->query($sql);
        $consult1 = $execute->fetchall(PDO::FETCH_ASSOC);
        return $consult1;

    }


/*---------Informacion de Libros prestados al usuario activo-------------*/
public function GetInfoLibr($Id_usuario)
{

$sql = "SELECT * FROM libro 
                JOIN libro_autor ON libro.id_libro = libro_autor.id_libro 
                JOIN autor ON autor.id_autor = libro_autor.id_autor 
                JOIN Solicitudes on Solicitudes.id_libro = libro_autor.id_libro 
                where Solicitudes.Id_usuario = '$Id_usuario' ";
$execute = $this->conexion->query($sql);
$consult = $execute->fetchall(PDO::FETCH_ASSOC);
return $consult;
}
/*---------Informacion de prestados al usuario activo-------------*/
public function GetInfoPres($Id_usuario)
{

$sql = "SELECT* FROM libro
                JOIN libro_autor ON libro.id_libro = libro_autor.id_libro 
                JOIN autor ON autor.id_autor = libro_autor.id_autor 
                JOIN Solicitudes on Solicitudes.id_libro = libro_autor.id_libro 
                JOIN prestamo on prestamo.id_libro = libro_autor.id_libro
                where Solicitudes.Id_usuario = '$Id_usuario'; ";
$execute = $this->conexion->query($sql);
$consult = $execute->fetchall(PDO::FETCH_ASSOC);
return $consult;
}
/*---------Informacion de las solicitudes del Usuario -------------*/
    public function GetInfoSolic()
    {

    $sql = "SELECT * FROM libro 
                    JOIN libro_autor ON libro.id_libro = libro_autor.id_libro 
                    JOIN autor ON autor.id_autor = libro_autor.id_autor 
                    JOIN Solicitudes on Solicitudes.id_libro = libro_autor.id_libro 
                    JOIN user ON user.id_usuario = Solicitudes.Id_usuario
                    WHERE Solicitudes.estatus_solicitud ='0';";
    $execute = $this->conexion->query($sql);
    $consult = $execute->fetchall(PDO::FETCH_ASSOC);
    return $consult;
    }


/*---------Informacion Libro Necesaria para El registro del prestamo-------------*/
public function Get2InfoSolic($id_libro,$Id_usuario)
{

$sql = "SELECT * FROM libro 
                JOIN libro_autor ON libro.id_libro = libro_autor.id_libro 
                JOIN autor ON autor.id_autor = libro_autor.id_autor 
                JOIN Solicitudes on Solicitudes.id_libro = libro_autor.id_libro 
                where Solicitudes.Id_usuario = '$Id_usuario' AND Solicitudes.id_libro = '$id_libro';";
$execute = $this->conexion->query($sql);
$consult = $execute->fetchall(PDO::FETCH_ASSOC);
return $consult;
}
/*---------Aceptacion del Prestamo-------------*/
public function AceptarSolic($Id_solicitud)
{
    $sql = "UPDATE `Solicitudes` SET `estatus_solicitud` = '1' WHERE `Solicitudes`.`Id_solicitud` = '$Id_solicitud'; ";
    $this->conexion->query($sql);
    return 1;
}
/*---------Rechazo del prestamo del Prestamo-------------*/
public function RechazoSolic($Id_solicitud)
{
    $sql = "UPDATE `Solicitudes` SET `estatus_solicitud` = '2' WHERE `Solicitudes`.`Id_solicitud` = '$Id_solicitud'; ";
    $this->conexion->query($sql);
    return 1;
}
/*---------devolucion de libro-------------*/
public function DevolucLibro($id_prestamos)
{
    $sql = "UPDATE `prestamo` SET `estadoPrestamo` = '2' WHERE `prestamo`.`id_prestamos` = '$id_prestamos'; ";
    $this->conexion->query($sql);
    return 1;
}

}
?>