<?php
require_once("../../../public/Config/Database/Autoload.php");
require_once("../../../public/Config/Database/Conexion.php");
require_once "../../../public/Config/Database/Control.php";
include "../../../public/Config/Database/ControlAdmin.php";
require_once("../../Models/Libros/Modificar_libros.php") ;
session_start();
/*-----------Informacion del usuario------------ */

$Nombre = $_SESSION['nombre'];
$Correo = $_SESSION["Correo"];
$apellido = $_SESSION['apellido'];
/*----------------------------------------------*/
$info = new Modificar_libro();
$row = $info->getLibros();
$libro = $row[1];
$r=count($row);
$i=0;
?>
<script>


</script></body>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Libros</title>
    <link rel="stylesheet" href="../../../public/Assets/Css/Inicio_admin.css">
    <link href="../../../public/Assets/DataTables/datatables.min.css" rel="stylesheet">
</head>

<body>

    <!----------header-------------->

    <header>
    <?php 

    include "../../../public/Config/Header.php";

    ?>
    </header>


    <div style="display:flex; height: 60rem" ;>
 <!------------- /*barra lateral------------------>
        <?php
        include "../../../public/Config/barra_lateral.php"
            ?>
 <!----------------------------------------------->


        <section class="Tabla_Libros">
            <div class="encabezado" style="margin: 16px 33px 33px 35px;  height: 45px;width: 45px;">
                <img src="../../../public/Assets/Img/book1.svg" class="icon" alt="">
                &nbsp;&nbsp;&nbsp; <h1> Libros</h1>
            </div>
            <div class="boton">
            <a href="Registro_libro.php">
            <button onclick="return confirmacion3()" style="position: absolute;left: 115px;top: 130px;">
                <img src="../../../public/Assets/Img/anadir.png" alt="" id="icon" style="height: 30px;">
            </button>
            </a>
        </div>
            <div class="Tabla_Resultados">
            <table class="Tabla" id="myTable">
                <thead class="Text_muted">
                    <th class="text-center">ISBM</th>
                    <th class="text-center">Titulo</th>
                    <th class="text-center">Autor</th>
                    <th class="text-center">Tema</th>
                    <th class="text-center">Editorial</th>
                    <th class="text-center">Disponibilidad</th>
                    <th class="text-center">Fecha Edicion</th>
                    <th class="text-center">Acciones</th>
                </thead>
                <tbody>
                    <?php while($i<$r){
                    $libro = $row[$i];
                        ?>
                        <tr>
                            <td><?php echo $libro['ISBN']; ?> </td>
                            <td><?php echo $libro['titulo']; ?> </td>
                            <td><?php echo $libro['nombre_autor'] . " " . $libro['apellido_autor']; ?> </td>
                            <td><?php echo $libro['tema']; ?> </td>
                            <td><?php echo $libro['editorial']; ?> </td>
                            <td style="text-align: center;" >
                            <?php
                            if ( $libro['disponibilidad'] == 0) { ?>
                                <img src="../../../public/Assets/Img/rechazado.png" class="icon" style="height: 30px;" style="text-align: center ;"   >
                            <?php
                            }else{ ?>
                                <img src="../../../public/Assets/Img/aprobar.png" class="icon" style="height: 30px;" style="text-align: center ;"   >
                               <?php } ?>
                            </td>
                            <td><?php echo $libro['fechaEdicion']; ?> </td>
                            <td>

                                <form action="../../Controllers/Libros/Modificaciones.php" method="post" name="Eliminar id="Modificar">

                                    <button onclick="return confirmacion()" type="submit" id="Eliminar" name="Eliminar" value="<?php echo $libro['id_libro']; ?>">
                                        <img src="../../../public/Assets/Img/basura.svg" alt="" id="icon" style="height: 30px;">
                                    </button>

                                    <button onclick="return confirmacion2()" formaction="Actualizacion_libro.php" type="submit" id="Eliminar"
                                        name="Modificar" value="<?php echo $libro['id_libro']; ?>">
                                        <img src="../../../public/Assets/Img/config.svg" alt="" id="icon" style="height: 30px;">
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php  $i++;}?>
                </tbody>
            </table>
        </div>
        </section>

    </div>

    <script src="../../../public/Assets/js/15.js"></script>
    <script src="../../../public/Assets/jquery.js"></script>
    <script src="../../../public/Assets/DataTables/datatables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });


        $('#myTable').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });

        function confirmacion() {
        var repuesta = confirm("¿Seguro desea eliminar este libro?");
        if (repuesta == true) {
            return true
        } else {
            return false
        }

    }
    function confirmacion2() {
        var repuesta = confirm("¿Seguro desea Modificar este libro?");
        if (repuesta == true) {
            return true
        } else {
            return false
        }

    }
    function confirmacion3() {
        var repuesta = confirm("¿Seguro desea Agregar Un libro?");
        if (repuesta == true) {
            return true
        } else {
            return false
        }

    }
    </script>
</body>

</html>