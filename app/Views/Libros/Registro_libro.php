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
$row = $Autores->getAutor();

$r = count($row);
$i = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Libros</title>
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
                &nbsp;&nbsp;&nbsp;<h1>Registro de Libros</h1>
            </div>
            <div class="caja">
                <div class=" Contenedor">
                    <form action="../../Controllers/Libros/Modificaciones.php" method="post">
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
                            <input type="text" pattern="\d*" minlength="10" maxlength="13" placeholder="ISBN" name="ISBN" class="input"  required />
                        </div>
                        <div class="input-field">
                            <input type="text" placeholder="titulo" name="titulo" class="input" maxlength="30" required />
                        </div>
                        <div class="input-field1" style="display: flex;padding: 0px 0px 15px;">
                            <select class="select-css" name="Autores">
                                <option value="0" >Seleccion un Autor</option>
                                <?php while ($i < $r) {
                                    $Autor = $row[$i];
                                    ?>
                                <option value="<?php echo $Autor['id_autor']; ?>">
                                    <?php echo $Autor['nombre_autor'] . " " . $Autor['apellido_autor']; ?>
                                </option>

                                <i></i>
                                <?php
                                $i++;
                                } ?>
                            </select><br>
                        </div>
                        <div class="input-field">
                            <input type="text" placeholder="tema" name="tema" class="input" pattern="[A-Za-z]+" minlength="5" maxlength="30" required />
                        </div>
                        <div class="input-field">
                            <input type="text" placeholder="editorial" name="editorial" class="input" pattern="[A-Za-z]+" maxlength="30"
                                required />
                        </div>
                        <div class="input-field">
                                <select class="select-css" name="disponibilidad">
                                <option value="0" selected disabled>Disponibilidad</option>
                                <option value="0" >No Disponible</option>
                                <option value="1" >Disponible</option>
                            </select><br>
                        </div>
                        <div class="input-field">
                            <input type="date" placeholder="fecha de Edicion" name="fechaEdicion" class="input"
                                maxlength="10" required>
                        </div>
                        <div class="input-field">
                            <input name="Registrar" type="submit" value="Registrar" class="submit">
                        </div>
                    </form>
                </div>

        </section>
    </div>


    <script src="../../../public/Assets/js/15.js"></script>

</body>

</html>