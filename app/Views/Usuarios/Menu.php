<?php
include "../../../public/Config/Database/Control.php";
include "../../../public/Config/Database/ControlUser.php";
/*-----------Informacion del usuario------------ */

$Correo = $_SESSION['Correo'];
$Nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];


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

<!------------- /*barra lateral------------------>
<div style="display:flex; height:60rem" ;>
<aside class="Barra_lateral ">
       <div class="contenidos">
       <div id="Menu" style="display: flex;justify-content: center;" >
            <div class="boton">
                <img class="mas" src="../../../public/Assets/Img/mas1.png" id="Mas" alt="">
            </div>
        </div>

        <nav class="navegation">
            <ul>
                <li>
                    <a href="Menu.php">
                        <img class="icon" id="icon1" src="../../../public/Assets/Img/home1.svg">
                        <span>Inicio</span>
                    </a>
                </li>
                <li>
                    <a a href="../Libros/Lista_de_libros.php">
                        <img class="icon" id="icon2" src="../../../public/Assets/Img/book1.svg">
                        <span>Lista de libros</span>
                    </a>
                </li>
                <li>
                    <a a href="../Prestamos/Lista_de_solicitudes.php">
                        <img class="icon" id="icon3" src="../../../public/Assets/Img/book1.svg">
                        <span>Lista De solicitudes</span>
                    </a>
                </li>
                <li>
                    <a a href="../Prestamos/Gestion_de_prestamos.php">
                        <img class="icon" id="icon4" src="../../../public/Assets/Img/prestamo1.png">
                        <span>Lista de prestamos</span>
                    </a>
                </li>
                <li>
                    <a href="../../../public/Config/Database/Cerrarsesion.php">
                        <img class="icon" id="icon5" src="../../../public/Assets/Img/cerrar1.svg">
                        <span>Cerrar Sesión</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div>
            <div class="linea"></div>

            <div class="modo-oscuro">
                <div class="info">
                    <img class="Icon" id="Icon" src="../../../public/Assets/Img/moon.svg">
                    <span>Modo Oscuro</span>
                </div>
                <div class="switch">
                    <div class="base">
                        <div class="circulo">

                        </div>
                    </div>
                </div>
            </div>

        </div>

       </div>
    </aside>
    <section class="Modulos">
        <div class="encabezado" >
            <img src="../../../public/Assets/Img/home1.svg" class="icon" alt="">
            &nbsp;&nbsp;&nbsp;<h1> Inicio</h1>
        </div>
        <div class="Contenido">
        <div class="Modulo">
                <div class="sub-modulos">
                    <img src="../../../public/Assets/Img/book1.svg" class="icon" id="icon3" srcset="">
                </div>

            <div id="sub-modulos"> <a href="../Libros/Lista_de_libros.php">
                    &nbsp;&nbsp;&nbsp;Lista de libros
                </a></div>
            </div>
            <div class="Modulo">
                <div class="sub-modulos">
                    <img src="../../../public/Assets/Img/solicitudes.png" class="icon" id="icon3" srcset="">
                </div>

            <div id="sub-modulos"> <a href="../Prestamos/Lista_de_solicitudes.php">
                    &nbsp;&nbsp;&nbsp;Lista de solicitudes
                </a></div>
            </div>
            <div class="Modulo">
                <div class="sub-modulos">
                    <img src="../../../public/Assets/Img/devolucion.png" class="icon" srcset="">
                </div>
                <div id="sub-modulos">
                <a href="../Prestamos/Prestamos_usuarios.php">
                    &nbsp;&nbsp;&nbsp;Lista de prestamos
                </a>
                </div>

            </div>
            <div class="Modulo">
                <div class="sub-modulos">
                    <img src="../../../public/Assets/Img/devolucion.png" class="icon" srcset="">
                </div>
                <div id="sub-modulos">
                <a href="../devoluciones/Libros_devueltos.php">
                    &nbsp;&nbsp;&nbsp;Devoluciones
                </a>
                </div>

            </div>
        </div>
    </section>
</div>

    <script src="../../../public/Assets/js/15.js"></script>

</body>

</html>