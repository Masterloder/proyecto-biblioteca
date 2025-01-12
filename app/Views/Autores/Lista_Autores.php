<?php
require_once("../../../public/Config/Database/Autoload.php");
require_once("../../../public/Config/Database/Conexion.php");
require_once "../../../public/Config/Database/Control.php";
include "../../../public/Config/Database/ControlAdmin.php";
require_once("../../Models/Autores/Autore.php");
session_start();

$Autores = new Autores();
$row = $Autores->getAutor();

$r = count($row);
$i = 0;

/*-----------Informacion del usuario------------ */
$Nombre = $_SESSION['nombre'];
$Correo = $_SESSION["Correo"];
$apellido = $_SESSION['apellido'];
/*-----------------------------------------------*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autores</title>
    <link href="../../../public/Assets/DataTables/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../public/Assets/Css/Inicio_admin.css">
</head>

<body>



<!----------header-------------->

<header>
<?php 
    include_once "../../../public/Config/Header.php"
    ?>
</header>

<div style="display:flex; height:60rem" ;>
<!------------- /*barra lateral------------------>
    <?php 
    include "../../../public/Config/barra_lateral.php"
    ?>
<!----------------------------------------------->
    <section class="Tabla_Libros">
        <div class="encabezado" style="margin: 16px 33px 33px 35px;  height: 45px;width: 45px;">
            <img src="../../../public/Assets/Img/book1.svg" class="icon" alt="">
            &nbsp;&nbsp;&nbsp;<h1> Autores</h1>
        </div>
        <div class="boton">
            <a href="Registro_Autor.php">
            <button onclick="return confirmacion3()" style="position: absolute;left: 115px;top: 130px;">
                <img src="../../../public/Assets/Img/anadir.png" alt="" id="icon" style="height: 30px;">
            </button>
            </a>
        </div>
        <div class="Tabla_Resultados" >
            <table class="Tabla" id="myTable" >
                <thead >
                    <th >nombre</th>
                    <th >apellido</th>
                    <th >nacionalidad</th>
                    <th >Acciones</th>
                </thead>
                <tbody>
                    <?php while ($i<$r) { 
                        $Autor=$row[$i];
                        $row2 = $Autores->get2Nac($Autor['ID_nacionalidad']);
                        $DatosNac = $row2[0];

                        ?>
                        <tr>
                            <td><?php echo $Autor['nombre_autor']; ?></td>
                            <td><?php echo $Autor['apellido_autor']; ?></td>
                            <td><?php echo $DatosNac['GENTILICIO_NAC']; ?></td>
                            <td>

                                <form action="../../Controllers/Autores/Modificar_Autor.php" method="post" id="Modificar">

                                    <button onclick="return confirmacion()" type="submit" id="Eliminar" name="Eliminar" value="<?php echo $Autor['id_autor']; ?>">
                                        <img src="../../../public/Assets/Img/basura.svg" alt="" id="icon" style="height: 30px;">
                                    </button>

                                    <button onclick="return confirmacion2()" formaction="Actualizacion_Autor.php" type="submit" id="Eliminar"
                                        name="Modificar" value="<?php echo $Autor['id_autor']; ?>">
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
        var repuesta = confirm("¿Seguro desea eliminar este Autor?");
        if (repuesta == true) {
            return true
        } else {
            return false
        }

    }
    function confirmacion2() {
        var repuesta = confirm("¿Seguro desea Modificar este Autor?");
        if (repuesta == true) {
            return true
        } else {
            return false
        }

    }
    function confirmacion3() {
        var repuesta = confirm("¿Seguro desea Agregar Un Nuevo Autor?");
        if (repuesta == true) {
            return true
        } else {
            return false
        }

    }
    </script>
</body>

</html>