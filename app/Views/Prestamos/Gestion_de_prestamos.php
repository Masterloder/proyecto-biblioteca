<?php
include "../../../public/Config/Database/Control.php";
/*-----------Informacion del usuario------------ */

$Correo = $_SESSION['Correo'];
$Nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];

/*----------------------------------------------*/

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
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
    include "../../../public/Config/BarralateralUser.php"
    ?>
<!----------------------------------------------->
      <section class="Modulos">
        <div class="encabezado" style="margin: 16px 33px 33px 0px;;">
            <img src="../../../public/Assets/Img/book1.svg" class="icon" alt="">
            &nbsp;&nbsp;&nbsp; <h1> Gestión de Libros </h1>
        </div>
        <div class="Contenido">
            <div class="Modulo">
                <div class="sub-modulos"><img src="../../../public/Assets/Img/lista_libros.png" class="icon" srcset=""></div>
                <div id="sub-modulos">
                    <a href="Lista_Prestamos.php">

                        &nbsp;&nbsp;&nbsp;lista de solicitudes
                    </a>
                </div>
            </div>
            <div class="Modulo">
                <div class="sub-modulos">

                    <img src="../../../public/Assets/Img/registro_libro.png" class="icon" srcset="">
                </div>
                <div id="sub-modulos">
                    <a href="Lista_solicitude_admin.php">
                        &nbsp;&nbsp;&nbsp;Lista de Prestamos
                    </a>
                </div>

            </div>
        </div>
    </section>
</div>

<script src="../../../public/Assets/js/15.js"></script>

</body>

</html>