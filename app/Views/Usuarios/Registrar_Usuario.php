<?php
require_once("../../../public/Config/Database/Autoload.php");
require_once("../../../public/Config/Database/Conexion.php");
require_once "../../../public/Config/Database/Control.php";
include "../../../public/Config/Database/ControlAdmin.php";

session_start();
/*-----------Informacion del usuario------------ */
$Nombre = $_SESSION['nombre'];
$Correo = $_SESSION["Correo"];
$apellido = $_SESSION['apellido'];
/*----------------------------------------------*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
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
    <section class="Modulos">
        <div class="encabezado" style="margin: 16px 33px 33px 0px;;">
            <img src="../../../public/Assets/Img/book1.svg" class="icon" alt="">
            &nbsp;&nbsp;&nbsp;<h1>Registro de usuarios</h1>
        </div>
        <div class="caja">
            <div class=" Contenedor">
                <form action="../../Controllers/Usuarios/Modificar_user.php" method="post">

                    <div class="input-field">
                        <input type="text" value="" placeholder="Cédula" name="cedula" class="input"
                            maxlength="10"  pattern="^[0-9]+" required />
                    </div>
                    <div class="input-field">
                        <input type="text" value="" placeholder="Nombre" name="nombre" class="input"
                            maxlength="30" required />
                    </div>
                    <div class="input-field">
                        <input type="text" value="" placeholder="Apellido" name="apellido" class="input"
                            maxlength="30" required />
                    </div>
                    <div class="input-field">
                        <input type="email" value="" placeholder="@Gmail.com" name="email" class="input"
                            maxlength="30"  required>
                    </div>
                    <div class="input-field">
                        <input type="text" value="" placeholder="Dirección" name="direccion" class="input"
                            maxlength="50" required />
                    </div>
                    <div class="input-field">
                        <input type="text" value="" placeholder="Teléfono" name="telefono" class="input"
                            maxlength="11" pattern="^[0-9]+" required>
                    </div>

                    <div class="input-field">
                        <button type="submit" value="Registrar" name="Registrar"
                            class="submit">Registrar</button>

                    </div>
                </form>
            </div>

    </section>
</div>
    <script src="../../../public/Assets/js/15.js"></script>

</body>

</html>