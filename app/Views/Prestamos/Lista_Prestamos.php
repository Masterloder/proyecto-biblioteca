<?php
require_once("../../../public/Config/Database/Autoload.php");
require_once("../../../public/Config/Database/Conexion.php");
require_once "../../Models/Prestamos/Prestamos.php";
include "../../../public/Config/Database/Control.php";
session_start();
/*-----------Informacion del usuario------------ */

$Nombre = $_SESSION['nombre'];
$Correo = $_SESSION["Correo"];
$apellido = $_SESSION['apellido'];
/* 
 */
$Prestamo = new Prestamos();
$row = $Prestamo->GetInfoSolic();

$r=count($row);
$i=0;
/*---------------Obtencion de la fecha de prestamo y devolucion-------------*/
$hoy = getdate();
$fecha = $hoy['year'] . "-" . $hoy['mon'] . "-0" . $hoy['mday'];
$mes = $hoy['mon'];
$dia = $hoy['mday'];
$año = $hoy['year'];
$datoAño =$año;
if ($mes == 12) {
    $mes_proximo = '01';
    $datoAño = $año +1;
}else{
    $mes_proximo = $mes+1;
}
if (1<=$mes || 9>=$mes ) {
    $fecha = $hoy['year'] . "-0" . $hoy['mon'] . "-" . $hoy['mday'];
    $fecha_proxima = $datoAño . "-0" . $mes_proximo . "-" . $hoy['mday'];
    if (1<=$dia || 9>=$dia ) {
        $fecha = $hoy['year'] . "-0" . $hoy['mon'] . "-0" . $hoy['mday'];
    $fecha_proxima = $datoAño . "-0" . $mes_proximo . "-0" . $hoy['mday'];
    }
}
if (1<=$dia || 9>=$dia ) {
    $fecha = $hoy['year'] . "-" . $hoy['mon'] . "-0" . $hoy['mday'];
$fecha_proxima = $datoAño . "-" . $mes_proximo . "-0" . $hoy['mday'];
}

/*-------------------------------------------- */
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
            &nbsp;&nbsp;&nbsp;<h1>Solicitudes de Préstamos</h1>
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
                    <th class="text-center">Fecha a devolver </th>
                    <th class="text-center">Nombre del Solicitante</th>
                    <th class="text-center">Disponibilidad</th>
                    <th class="text-center">Aceptar|Rechazar</th>
                </thead>
                <tbody>
                    <?php while ($i<$r) { 
                    $dato = $row[$i];
                    ?>
                        <tr>
                            <td><?php echo $dato['titulo']; ?> </td>
                            <td><?php echo $dato['nombre_autor'] . " " . $dato['apellido_autor']; ?> </td>
                            <td><?php echo $dato['editorial']; ?> </td>
                            <td><?php echo $fecha ?> </td>
                            <td><?php echo $fecha_proxima ?> </td>
                            <td><?php echo $dato['nombre'] . " " . $dato['apellido']; ?> </td>
                            <td style="text-align: center;">
                                <?php
                                if ($dato['disponibilidad'] == 0) { ?>
                                    <img src="../../../public/Assets/Img/rechazado.png" class="icon" style="height: 30px;"
                                        style="text-align: center ;">
                                    <?php
                                } else { ?>
                                    <img src="../../../public/Assets/Img/aprobar.png" class="icon" style="height: 30px;"
                                        style="text-align: center ;">
                                <?php } ?>
                            </td>
                            <td>

                                <form action="../../Controllers/Prestamos/Modificaciones_Prestamos.php" method="post" id="Rechazar">

                                    <button  onclick="return confirmacion()" type="submit" id="Aceptar" name="Aceptar" value="<?php echo base64_encode(serialize($dato = $row[$i]));?>">
                                        <img src="../../../public/Assets/Img/aprobar.png" alt="" id="icon" style="height: 30px;">
                                    </button>

                                    <button  onclick="return confirmacion2()" formaction="../../Controllers/Prestamos/Modificaciones_Prestamos.php" type="submit"  name="Rechazar" value="<?php echo $dato['Id_solicitud']; ?>">
                                        <img src="../../../public/Assets/Img/rechazar.png" alt="" id="icon" style="height: 30px;">
                                    </button>
                                </form>

                            </td>
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
        function confirmacion() {
        var repuesta = confirm("¿Seguro de Aceptar este Prestamo?");
        if (repuesta == true) {
            return true
        } else {
            return false
        }

    }function confirmacion2() {
        var repuesta = confirm("¿Seguro de Rechazar este Prestamo?");
        if (repuesta == true) {
            return true
        } else {
            return false
        }

    }
    </script>

</body>

</html>