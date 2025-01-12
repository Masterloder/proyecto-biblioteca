<?php
require_once("../../../public/Config/Database/Autoload.php");
require_once("../../../public/Config/Database/Conexion.php");
require_once "../../../public/Config/Database/Control.php";
include "../../../public/Config/Database/ControlAdmin.php";
require_once("../../Models/Libros/Modificar_libros.php");
require_once("../../Models/Autores/Autore.php");

session_start();

/*-----------Informacion del usuario------------ */

$Correo = $_SESSION['Correo'];
$Nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];

/*----------------------------------------------*/

$Autores = new Autores();
$ID_Libro = $_POST['Modificar'];




$Libros = new Modificar_libro();
$libros1 = $Libros->get2Libros($ID_Libro);
$libro = $libros1['0'];
if ($libro['disponibilidad']==1) {
    $disponibilidad = "Disponible";
    $disponibilidad2 = "No Disponible";
    $dis =0;
}else {
    $disponibilidad = 'No Disponible';
    $disponibilidad2 = "Disponible";
    $dis = 1;
}
$row = $Autores->get2Autor($libro['id_autor'] );

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
                &nbsp;&nbsp;&nbsp;<h1>Actualizacion de Libros</h1>
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
                            <input type="text" value="<?php echo $libro['ISBN']; ?>"  placeholder="ISBN" name="ISBN"  class="input" maxlength="30" required />
                        </div>
                        <div class="input-field">
                            <input type="text" value="<?php echo $libro['titulo']; ?>"  placeholder="titulo" name="titulo" class="input" maxlength="30"
                                required />
                        </div>
                        <div class="input-field1" style="display: flex;padding: 0px 0px 15px;">
                            <select class="select-css" name="Autores">
                                <option value="<?php echo $libro['id_autor']; ?>" ><?php echo $libro['nombre_autor'] . " " . $libro['apellido_autor']; ?></option>
                                <?php while ($i < $r) {
                                    $Autor = $row[$i];
                                    ?>
                                    <option value="<?php echo $Autor['id_autor']; ?>">
                                        <?php echo $Autor['nombre_autor'] . " " . $Autor['apellido_autor']; ?></option>

                                    <i></i>
                                    <?php
                                    $i++;
                                } ?>
                            </select><br>
                        </div>
                        <div class="input-field">
                            <input type="text" value="<?php echo $libro['tema']; ?>"  placeholder="tema" name="tema" class="input" maxlength="30" />
                        </div>
                        <div class="input-field">
                            <input type="text" value="<?php echo $libro['editorial']; ?>"  placeholder="editorial" name="editorial" class="input" maxlength="30"
                                required />
                        </div>
                        <div class="input-field">
                                <select class="select-css" name="disponibilidad">
                                <option value="<?php echo $libro['disponibilidad'];?> "><?php echo $disponibilidad;?></option>
                                <option value="<?php echo $dis;?> "><?php echo $disponibilidad2;?></option>
                                ?>
                            </select><br>
                        </div>
                        <div class="input-field">
                            <input type="date" value="<?php echo $libro['fechaEdicion']; ?>"  placeholder="fecha de Edicion" name="fechaEdicion" class="input"
                                maxlength="10" required>
                        </div>
                        <div class="input-field">
                        <button type="submit" value="<?php echo $libro['id_libro'] ;?>" name="Modificar" class="submit">Modificar</button>
                        </div>
                    </form>
                </div>

        </section>
    </div>


    <script src="../../../public/Assets/js/15.js"></script>

</body>

</html>