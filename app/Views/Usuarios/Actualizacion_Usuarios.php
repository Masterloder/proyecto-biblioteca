<?php
require_once("../../../public/Config/Database/Autoload.php");
require_once("../../../public/Config/Database/Conexion.php");
require_once "../../../public/Config/Database/Control.php";
include "../../../public/Config/Database/ControlAdmin.php";
require_once("../../Models/Usuarios/Usuarios.php");
session_start();
/*-------informacion del usuario a Actualizar-----*/
$id_usuario = $_POST['Modificar'];
$consulta = new Inicio_sesion();
$dato=$consulta->Get2Usuario($id_usuario);
$datos = $dato[0];

print_r($dato);
$r = count($dato);
$i=0;

/*-----------Informacion del usuario------------ */

$Nombre = $_SESSION['nombre'];
$Correo = $_SESSION["Correo"];
$apellido = $_SESSION['apellido'];
/*----------------------------------------------*/
?>
<script>
    function confirmacion() {
        var repuesta = confirm("¿Seguro desea eliminar este libro?");
        if (repuesta == true) {
            return true
        } else {
            return false
        }

    }


</script>
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
    <section class="Modulos">
        <div class="encabezado" style="margin: 16px 33px 33px 0px;;">
            <img src="../../../public/Assets/Img/user.svg" class="icon" alt="">
            &nbsp;&nbsp;&nbsp;<h1>Modificación de Usuarios</h1>
        </div>
        <div class="caja">
            <div class=" Contenedor">
                <form action="../../Controllers/Usuarios/Modificar_user.php" method="post">

                    <div class="input-field">
                        <input type="text" value="<?php echo $datos['cedula']; ?>" placeholder="Cedula" name="cedula" class="input"
                            maxlength="30"  required />
                    </div>
                    <div class="input-field">
                        <input type="text" value="<?php echo $datos['nombre']; ?>" placeholder="Nombre" name="nombre" class="input"
                            maxlength="30" required />
                    </div>
                    <div class="input-field">
                        <input type="text" value="<?php echo $datos['apellido']; ?>" placeholder="Apellido" name="apellido" class="input"
                            maxlength="30" />
                    </div>
                    <div class="input-field">
                        <input type="text" value="<?php echo $datos['direccion']; ?>" placeholder="Direccion" name="direccion" class="input"
                            maxlength="30" required />
                    </div>
                    <div class="input-field">
                        <input type="text" value="<?php echo $datos['telefono']; ?>" placeholder="telefono" name="telefono" class="input"
                            maxlength="11"  required>
                    </div>

                    <div class="input-field">
                        <button type="submit" value="<?php echo $datos['id_usuario']; ?>" name="Modificar"
                            class="submit">Modificar</button>

                    </div>
                </form>
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