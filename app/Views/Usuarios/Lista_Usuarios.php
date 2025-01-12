<?php
require_once("../../../public/Config/Database/Autoload.php");
require_once("../../../public/Config/Database/Conexion.php");
require_once "../../../public/Config/Database/Control.php";
include "../../../public/Config/Database/ControlAdmin.php";
require_once("../../Models/Usuarios/Usuarios.php");
session_start();
$consulta = new Inicio_sesion();
$dato=$consulta->GetUsuario();

$r = count($dato);
$i=0;

/*-----------Informacion del usuario------------ */

$Nombre = $_SESSION['nombre'];
$Correo = $_SESSION["Correo"];
$apellido = $_SESSION['apellido'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
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
        <div class="encabezado" style="margin: 16px 33px 33px 35px;  ">
            <img src="../../../public/Assets/Img/user.svg" class="icon" alt="">
            &nbsp;&nbsp;&nbsp;<h1> Gestión de Usuarios</h1>
        </div>
        <div class="boton">
        </div>
        <div class="Tabla_Resultados">
            <table class="Tabla" id="myTable">
                <thead class="Text_muted">
                    <th class="text-center">Cédula</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Apellido</th>
                    <th class="text-center">Dirección</th>
                    <th class="text-center">Teléfono</th>
                    <th class="text-center">Acciones</th>
                </thead>
                <tbody>
                    <?php while ($i <$r) { 
                        $row = $dato[$i];
                        ?>
                        <tr>
                            <td><?php echo $row['cedula']; ?> </td>
                            <td><?php echo $row['nombre']; ?> </td>
                            <td><?php echo $row['apellido'] ?> </td>
                            <td><?php echo $row['direccion']; ?> </td>
                            <td><?php echo $row['telefono']; ?> </td>
                            <td>

                                <form action="../../Controllers/Usuarios/Modificar_user.php" method="post" id="Modificar">

                                    <button type="submit" id="Eliminar" name="Eliminar" onclick="return confirmacion()"
                                        value="<?php echo $row['id_usuario']; ?>">
                                        <img src="../../../public/Assets/Img/basura.svg" alt="" id="icon" style="height: 30px;">
                                    </button>
                                    <button name="Modificar" formaction="Actualizacion_Usuarios.php" onclick="return confirmacion2()" type="submit"
                                        value="<?php echo $row['id_usuario']; ?>">
                                        <img src="../../../public/Assets/Img/config.svg" alt="" id="icon" style="height: 30px;">
                                    </button>

                                </form>
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
        function confirmacion() {
        var repuesta = confirm("¿Seguro desea eliminar este Usuario?");
        if (repuesta == true) {
            return true
        } else {
            return false
        }

    }
    function confirmacion2() {
        var repuesta = confirm("¿Seguro desea Modificar este Usuario?");
        if (repuesta == true) {
            return true
        } else {
            return false
        }

    }
    function confirmacion3() {
        var repuesta = confirm("¿Seguro desea Agregar Un Nuevo Usuario?");
        if (repuesta == true) {
            return true
        } else {
            return false
        }

    }
    </script>

</body>

</html>