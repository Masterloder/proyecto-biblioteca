<?php
require_once("../../../public/Config/Database/Autoload.php");
require_once("../../../public/Config/Database/Conexion.php");
require_once "../../Models/Prestamos/Prestamos.php";
include "../../../public/Config/Database/Control.php";
include "../../../public/Config/Database/ControlUser.php";
session_start();
/*-----------Informacion del usuario------------ */
echo "hola";
$Nombre = $_SESSION['nombre'];
$Correo = $_SESSION["Correo"];
$apellido = $_SESSION['apellido'];
$id_usuario = $_SESSION['id'];

$Prestamo = new Prestamos();
$row = $Prestamo->GetInfoPres($id_usuario);

$r=count($row);
$i=0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Préstamos</title>
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
<!------------------------------------------------>

    <section class="Tabla_Libros">
        <div class="encabezado" style="margin: 16px 33px 33px 35px;  height: 45px;width: 45px;">
            <img src="../../../public/Assets/Img/prestamo_libro.png" class="icon" alt="">
            &nbsp;&nbsp;&nbsp;<h1> Gestion de Préstamos</h1>
        </div>
        <div class="boton">
            
        </div>
        <div class="Tabla_Resultados">
            <table class="Tabla" id="myTable">
                <thead class="Text_muted">
                    <th class="text-center">Titulo</th>
                    <th class="text-center">Autor</th>
                    <th class="text-center">Editorial</th>
                    <th class="text-center">Fecha del Prestamo</th>
                    <th class="text-center">Fecha de devolucion</th>
                </thead>
                <tbody>
                    <?php while ($i<$r) { 
                    $dato = $row[$i];
                    ?>
                        <tr>
                            <td><?php echo $dato['titulo']; ?> </td>
                            <td><?php echo $dato['nombre_autor'] . " " . $dato['apellido_autor']; ?> </td>
                            <td><?php echo $dato['editorial']; ?> </td>
                            <td><?php echo $dato['fechaPrestamo']; ?> </td>
                            <td><?php echo $dato['fechaDevolucion']; ?> </td>
                        </tr>
                    <?php $i++; } ?>
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