<?php
include "../../../public/Config/Database/Control.php";
include "../../../public/Config/Database/ControlAdmin.php";
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
                <div id="Menu" style="display: flex;justify-content: center;">
                    <div class="boton">
                        <img class="mas" src="../../../public/Assets/Img/mas1.png" id="Mas" alt="">
                    </div>
                </div>

                <nav class="navegation">
                    <ul>
                        <li>
                            <a href="inicio.php">
                                <img class="icon" id="icon1" src="../../../public/Assets/Img/home1.svg">
                                <span>Inicio</span>
                            </a>
                        </li>
                        <li>
                            <a a href="Lista_Usuarios.php">
                                <img class="icon" id="icon2" src="../../../public/Assets/Img/usuario1.png">
                                <span>Gestión de Usuarios</span>
                            </a>
                        </li>
                        <li>
                            <a a href="../Libros/Libros.php">
                                <img class="icon" id="icon3" src="../../../public/Assets/Img/book1.svg">
                                <span>Gestión de Libros </span>
                            </a>
                        </li>
                        <li>
                            <a a href="../Prestamos/Lista_Prestamos.php">
                                <img class="icon" id="icon4" src="../../../public/Assets/Img/prestamo1.png">
                                <span>Gestión de Préstamos</span>
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
                        <!------------------modo oscuro-------desabilitado-------
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
                --------->
                    </div>

                </div>

            </div>
        </aside>
        <section class="Modulos">
            <div class="encabezado">
                <img src="../../../public/Assets/Img/home1.svg" class="icon" alt="">
                &nbsp;&nbsp;&nbsp;<h1> Inicio</h1>
            </div>
            <div class="Contenido">
                <a id="link" href="../Libros/Libros.php">
                    <div class="Modulo">
                        <div class="sub-modulos">
                            <img src="../../../public/Assets/Img/registro_libro.png" class="icon" id="icon3" srcset="">
                        </div>
                        <div id="sub-modulos">

                            Gestión de Libros

                        </div>
                    </div>
                </a>
                <a id="link" href="../Prestamos/Gestion_de_prestamos.php">
                    <div class="Modulo">
                        <div class="sub-modulos">
                            <img src="../../../public/Assets/Img/prestamo_libro.png" class="icon" id="icon3" srcset="">
                        </div>

                        <div id="sub-modulos">

                            Gestion de Préstamos

                        </div>
                    </div>
                </a>
                <a id="link" href="../devoluciones/Lista_Devoluciones.php">
                    <div class="Modulo">
                        <div class="sub-modulos">
                            <img src="../../../public/Assets/Img/devolucion.png" class="icon" srcset="">
                        </div>
                        <div id="sub-modulos">

                            Devoluciones

                        </div>

                    </div>
                </a>
                <a id="link" href="Lista_Usuarios.php">
                    <div class="Modulo">
                        <div class="sub-modulos">
                            <img src="../../../public/Assets/Img/user.svg" class="icon" srcset="">
                        </div>
                        <div id="sub-modulos">

                            Gestión de Usuarios

                        </div>

                    </div>
                </a>
            </div>
        </section>
    </div>

    <script src="../../../public/Assets/js/15.js"></script>

</body>

</html>