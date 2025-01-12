<?php
require_once("../../../public/Config/Database/Autoload.php");
require_once("../../../public/Config/Database/Conexion.php");
require_once "../../../public/Config/Database/Control.php";
include "../../../public/Config/Database/ControlAdmin.php";
require_once("../../Models/Autores/Autore.php");
session_start();
/*-----------Informacion del usuario------------ */

$Nombre = $_SESSION['nombre'];
$Correo = $_SESSION["Correo"];
$apellido = $_SESSION['apellido'];
/*----------------------------------------------*/
$Autores = new Autores();
$row = $Autores->getNac();

$r = count($row);
$i = 0;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Autores</title>
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
            &nbsp;&nbsp;&nbsp;<h1> Registro de Autores</h1>
        </div>
        <div class="caja">
            <div class=" Contenedor">
                <form action="../../Controllers/Autores/Modificar_Autor.php" method="post">
                    <hr>
                    <?php
                    if (isset($_GET['error'])) {

                        ?>
                        <p class="error">
                            <?php
                            echo $_GET['error'];
                            ?>
                        </p>

                        <?php
                    }
                    ?>
                    <hr>
                    <div class="input-field">
                        <input type="text" placeholder="nombre" name="nombre" class="input" maxlength="30" />
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="apellido" name="apellido" class="input" maxlength="30"
                            required />
                    </div>
                    <div class="input-field">
                    <select class="select-css" name="nacionalidad">
                                <option value="0" selected disabled>Nacionalidad</option>
                                <?php while ($i < $r) {
                                    $Autor = $row[$i];
                                    $DatosNac = $row[$i];
                                    ?>
                                <option value="<?php echo $DatosNac['ID_nacionalidad']; ?>">
                                    <?php echo $DatosNac['PAIS_NAC'];  ?>
                                </option>

                                <i></i>
                                <?php
                                $i++;
                                } ?>
                    </div>
                    <div class="input-field">
                        <input type="submit" name="Registrar"  value="Registrar" class="submit">
                    </div>
                </form>
            </div>

    </section>
</div>
    

<script src="../../../public/Assets/js/15.js"></script>

</body>

</html>