<?php
require_once("../../../public/Config/Database/Autoload.php");
require_once("../../../public/Config/Database/Conexion.php");
require_once "../../../public/Config/Database/Control.php";
include "../../../public/Config/Database/ControlAdmin.php";
require_once("../../Models/devoluciones/Devoluciones.php");
session_start();
/*-----------Informacion del usuario------------ */

$Correo = $_SESSION['Correo'];
$Nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];

/*----------------------------------------------*/


$consulta = new Devoluciones();
$Devoluciones = $consulta->getDevoluciones();;
$r = count($Devoluciones);
$i=0;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devoluciones</title>
    <link rel="stylesheet" href="../../../public/Assets/Css/Inicio_admin.css">
    <link href="../../../public/Assets/DataTables/datatables.min.css" rel="stylesheet">
</head>

<body>



<!----------header-------------->

<header>
<?php 
    include_once "../../../public/Config/Header.php"
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
            <img src="../../../public/Assets/Img/devolucion.png" class="icon" alt="">
            &nbsp;&nbsp;&nbsp;<h1> Devoluciones</h1>
        </div>

        <div class="Tabla_Resultados">
            <table class="Tabla" id="myTable">
                <thead class="Text_muted">
                    <th class="text-center">Titulo</th>
                    <th class="text-center">Autor</th>
                    <th class="text-center">Editorial</th>
                    <th class="text-center">Fecha del Prestamo</th>
                    <th class="text-center">Estado del Prestamo </th>
                    <th class="text-center">Nombre del Solicitante</th>
                    <th class="text-center">Disponibilidad</th>
                </thead>
                <tbody>
                    <?php while ($i<$r) { 
                        $row=$Devoluciones[$i];
                        ?>
                        <tr>
                            <td><?php echo $row['titulo']; ?> </td>
                            <td><?php echo $row['nombre_autor'] . " " . $row['apellido_autor']; ?> </td>
                            <td><?php echo $row['editorial']; ?> </td>
                            <td><?php echo $row['fechaPrestamo']; ?> </td>
                            <td style="text-align: center;">
                                <?php
                                if ($row['estadoPrestamo'] == 2) { ?>
                                    <img src="../../../public/Assets/Img/Devuelto.png" class="icon" style="height: 30px;"
                                        style="text-align: center ;">
                                    <?php
                                } else{ ?>
                                    <img src="../../../public/Assets/Img/NoDevuelto.png" class="icon" style="height: 30px;"
                                        style="text-align: center ;">
                                <?php } ?>
                            </td>
                            <td><?php echo $row['nombre'] . " " . $row['apellido']; ?> </td>
                            <td style="text-align: center;">
                                <?php
                                if ($row['disponibilidad'] == 0) { ?>
                                    <img src="../../../public/Assets/Img/rechazado.png" class="icon" style="height: 30px;"
                                        style="text-align: center ;">
                                    <?php
                                } else { ?>
                                    <img src="../../../public/Assets/Img/aprobar.png" class="icon" style="height: 30px;"
                                        style="text-align: center ;">
                                <?php } ?>
                            </td>
                        </tr>
                    <?php $i++;} ?>
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
        
    </script>

</body>

</html>