<?php
require_once("../../../public/Config/Database/Autoload.php");
require_once("../../../public/Config/Database/Conexion.php");

class Modificar_libro extends Conexion
{
    private $ISBN;
    private $titulo;
    private $ID_Autor;
    private $tema;
    private $editorial;
    private $disponibilidad;
    private $fechaEdicion;
    private $ID_libro;
    private $conexion;

    public function __construct()
    {

        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }
/*----------------------registro del Libro------------ */
    public function InsertLibro(string $ISBN, string $titulo, string $tema, string $editorial, string $disponibilidad,$fechaEdicion)
    {
        $this->ISBN = $ISBN;
        $this->titulo = $titulo;
        $this->tema = $tema;
        $this->editorial = $editorial;
        $this->disponibilidad = $disponibilidad;
        $this->fechaEdicion = $fechaEdicion;

        $sql = " INSERT INTO libro ( `ISBN`, `titulo`, `tema`, `editorial`, `disponibilidad`, `fechaEdicion`) VALUES ('$ISBN', '$titulo', '$tema', '$editorial', '$disponibilidad', '$fechaEdicion'); ";
        $insert = $this->conexion->query($sql);

        $idInsert = $this->conexion->lastInsertId();

        return $idInsert ;
    }
/*-----------------------Registro del Autor del Libro---------*/
    public function Insert_Aut_Libro($ID_Libro,$ID_Autor){
        $sql = " INSERT INTO `libro_autor` ( `id_libro`, `id_autor`) VALUES ('$ID_Libro', '$ID_Autor')";
        $insert = $this->conexion->query($sql);

        return 1;

    }
    /*----------------Informacion De libros Activos------------------*/
    public function getLibrosSolic($id_usuario)
    {
                    $sqlID = "SELECT * FROM libro 
                    JOIN libro_autor ON libro.id_libro = libro_autor.id_libro 
                    JOIN autor ON autor.id_autor = libro_autor.id_autor 
                    JOIN Solicitudes on Solicitudes.id_libro = libro_autor.id_libro 
                    where Solicitudes.Id_usuario = '$id_usuario'; 
                    ";
        $execute = $this->conexion->query($sqlID);
        $consult = $execute->fetchall(PDO::FETCH_ASSOC);
        return $consult;
    }
     /*----------------Informacion De libros Prestados------------------*/
     public function getLibrosPrest()
     {
                     $sqlID = "SELECT * FROM libro 
                     JOIN libro_autor ON libro.id_libro = libro_autor.id_libro 
                     JOIN autor ON autor.id_autor = libro_autor.id_autor 
                     JOIN Solicitudes on Solicitudes.id_libro = libro_autor.id_libro 
                     JOIN prestamo on prestamo.id_libro = libro_autor.id_libro
                     JOIN user on user.id_usuario = Solicitudes.Id_usuario
                     WHERE prestamo.estadoPrestamo = '1'; ";
         $execute = $this->conexion->query($sqlID);
         $consult = $execute->fetchall(PDO::FETCH_ASSOC);
         return $consult;
     }
    /*----------------Informacion De libros solicitados por el usuario activo------------------*/
    public function getLibros()
    {
                    $sqlID = "SELECT * FROM libro
                    JOIN libro_autor ON libro.id_libro = libro_autor.id_libro
                    JOIN autor ON autor.id_autor = libro_autor.id_autor where `estatus` != '0'
                    ";
        $execute = $this->conexion->query($sqlID);
        $consult = $execute->fetchall(PDO::FETCH_ASSOC);
        return $consult;
    }

/*-----------------Informacion de Libro a Actualizar-------------------------*/
    public function get2Libros($ID_Libro)
    {
    $sqlID = "SELECT * FROM libro 
                    JOIN libro_autor ON libro.id_libro = libro_autor.id_libro 
                    JOIN autor ON autor.id_autor = libro_autor.id_autor where libro.id_libro = '$ID_Libro'";
        $execute = $this->conexion->query($sqlID);
        $consult = $execute->fetchall(PDO::FETCH_ASSOC);
        return $consult;
    }
/*-----------------Eliminacion de Libro-------------------------*/
    public function ElimLibros(string $Eliminar)
    {

        $sqlID = "UPDATE `libro` SET `estatus` = '0' WHERE `libro`.`id_libro` = $Eliminar;  ";
        $this->conexion->query($sqlID);
        return 1;
    }
/*-----------------Actualizacion de Libro -------------------------*/

    public function ActLibro(string $ISBN, string $titulo, string $tema, string $editorial, string $disponibilidad,$fechaEdicion,$ID_libro ,$id_autor)
    {
        $sql = "UPDATE `libro` SET
        `ISBN` = '$ISBN',
        `titulo` = $titulo,
        `tema` = '$tema',
        `editorial` = '$editorial',
        `disponibilidad` = '$disponibilidad',
        `fechaEdicion` =  '$fechaEdicion'
        WHERE `libro`.`id_libro` = '$ID_libro';";
        $insert = $this->conexion->query($sql);

        $sql2 = "UPDATE `libro_autor`SET
                `id_libro`='$ID_libro',
                `id_autor`='$id_autor'
                WHERE `id_libro`='$ID_libro'; ";
         $insert2 = $this->conexion->query($sql2);
        return 1;
    }

}


