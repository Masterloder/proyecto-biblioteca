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

/*-------------------Busqueda de informacion del autor------------ */
$Autores = new Autores();
$ID_Autor = $_POST['Modificar'];

$row = $Autores->get2Autor($ID_Autor);
$row2 = $Autores->get4Autor($ID_Autor);
$Autor = $row2 ['0'];
$r = count($row);
$i = 0;
print_r($row2 );
$datosNac = $Autor['ID_nacionalidad'];
$row3 = $Autores->get2Nac($datosNac);
$datosNac2 = $row3[0];
$row4 = $Autores->get3Nac($datosNac);
$RO = $row4;
$r = count($row4);
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
            &nbsp;&nbsp;&nbsp;<h1> Modificacion de Autores</h1>
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
                        <input type="text" value="<?php echo $Autor["nombre_autor"];  ?>" placeholder="nombre" name="nombre" class="input" maxlength="30" />
                    </div>
                    <div class="input-field">
                        <input type="text" value="<?php echo $Autor["apellido_autor"];  ?>" placeholder="apellido" name="apellido" class="input" maxlength="30"
                            required />
                    </div>
                    <div class="input-field">
                    <select class="select-css" name="nacionalidad">
                        <option value="<?php echo $datosNac2['ID_nacionalidad']; ?>"><?php echo $datosNac2["PAIS_NAC"];  ?></option>
                                    <?php while ($i < $r) {
                                        $datosNac1 = $RO[$i];
                                        ?>
                                    <option value="<?php echo $datosNac1['ID_nacionalidad']; ?>">
                                        <?php echo $datosNac1['PAIS_NAC'];  ?>
                                    </option>

                                    <i></i>
                                    <?php
                                    $i++;
                                    } ?>
                                    </select><br>
                    </div>
                    <div class="input-field">
                        <button type="submit" value="<?php echo $Autor["id_autor"] ;?>" name="Modificar" class="submit">Modificar</button>
                    </div>
                </form>
            </div>

    </section>
</div>

<script src="../../../public/Assets/js/15.js"></script>

</body>

</html>