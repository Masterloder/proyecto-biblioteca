<?php
require_once("../../../public/Config/Database/Autoload.php");
require_once("../../../public/Config/Database/Conexion.php");
require_once "../../../public/Config/Database/Control.php";
include "../../../public/Config/Database/ControlAdmin.php";
require_once "../../Models/Libros/Modificar_libros.php";
require_once("../../Models/Usuarios/Usuarios.php");
require_once("../../Models/Prestamos/Prestamos.php");
session_start();
/*-----------Informacion del usuario------------ */
$Nombre = $_SESSION['nombre'];
$Correo = $_SESSION["Correo"];
$apellido = $_SESSION['apellido'];
/*----------------------------------------------*/
$ID_prestamo = $_POST['Modificar'];

$Libros = new Prestamos();
$DatoLibros = $Libros->get2Prestamos($ID_prestamo);
$datos = $DatoLibros[0];


$Libros2 = new Modificar_libro();
$DatosLibros = $Libros2->getLibros();
$rL=count($DatosLibros);
$i=0;


$Usuarios = new Inicio_sesion();
$DatosUsuarios= $Usuarios->GetUsuario();
$rU=count($DatosUsuarios);
$u=0;
/*-------Optencion de la informacion de la fecha------------*/
$hoy = getdate();
$fecha = $hoy['year'] . "-" . $hoy['mon'] . "-0" . $hoy['mday'];
$mes = $hoy['mon'] . "+1";
$mes_proximo = $mes + 1;
$fecha_proxima = $hoy['year'] . "-" . $mes_proximo . "-0" . $hoy['mday'];
echo $fecha_proxima;
/*---------------------------------------------------------*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificación de Préstamos</title>
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
            &nbsp;&nbsp;&nbsp;<h1>Modificación de Préstamos</h1>
        </div>
        <div class="caja">
            <div class=" Contenedor">
                <form action="../../Controllers/Prestamos/Modificaciones_Prestamos.php" method="post">

                    <div class="input-field">
                        <input type="date" value="<?php echo $datos['fechaPrestamo']; ?>" placeholder="Fecha del Prestamo"
                            name="fechaPrestamo" class="input" maxlength="30" min="2024-01-01" required />
                    </div>
                    <div class="input-field">
                        <input type="date" value="<?php echo $datos['fechaDevolucion']; ?>" placeholder="Fecha de Devolucion"
                            name="fechaDevolucion" class="input" maxlength="30" required />
                    </div>
                    <div class="input-field1" style="display: flex;padding: 0px 0px 15px;">
                        <select class="select-css" name="Estadodelprestamo" required>
                            <option value="" selected disabled>Seleccione</option>
                            <option value="1"> Prestado</option>
                            <option value="0"> No Prestado</option>
                            <i></i>
                        </select><br>
                    </div>
                    <div class="input-field1" style="display: flex;padding: 0px 0px 15px;">
                        <select class="select-css" name="id_libro" required>

                            <option value="<?php echo $datos['id_libro']; ?>" selected ><?php echo $datos['titulo'] . "  Editorial .  " . $datos['editorial']; ?></option>
                            <?php while ($i<$rL) {
                                $libro=$DatosLibros[$i];
                                ?>
                                <option value="<?php echo $libro['id_libro']; ?>">
                                    <?php echo $libro['titulo'] . "  Editorial.  " . $libro['editorial']; ?></option>
                            <?php $i++;} ?>
                            <i></i>
                        </select><br>
                    </div>
                    <div class="input-field1" style="display: flex;padding: 0px 0px 15px;">
                        <select class="select-css" name="cedula" required>
                            <option value="<?php echo $datos['cedula']; ?>" selected ><?php echo $datos['nombre'] . " " . $datos['apellido']; ?></option></option>
                            <?php while ($u<$rU) {
                                $usuario=$DatosUsuarios[$u];
                                ?>
                                <option value="<?php echo $usuario['cedula']; ?>">
                                    <?php echo $usuario['nombre'] . " " . $usuario['apellido']; ?></option>
                            <?php $u++;} ?>
                            <i></i>
                        </select><br>
                    </div>
                    <div class="input-field">
                        <button type="submit" value="<?php echo $datos['id_prestamos']; ?>" name="Modificar" class="submit" >Modificar</button>

                    </div>
                </form>
            </div>

    </section>
</div>
    

    <script src="../../../public/Assets/js/15.js"></script>

</body>

</html>