<?php 
require_once("../../../public/Config/Database/Autoload.php");
require_once("../../../public/Config/Database/Conexion.php");
include "../../../public/Config/Database//Control.php";
require_once("../../Models/Prestamos/Prestamos.php");

/*---------------Obtencion de la fecha de prestamo y devolucion-------------*/
$hoy = getdate();
$fecha = $hoy['year'] . "-" . $hoy['mon'] . "-0" . $hoy['mday'];
$mes = $hoy['mon'];
$dia = $hoy['mday'];
$año = $hoy['year'];
$datoAño =$año;
if ($mes == 12) {
    $mes_proximo = '01';
    $datoAño = $año +1;
}else{
    $mes_proximo = $mes+1;
}
if (1<=$mes || 9>=$mes ) {
    $fecha = $hoy['year'] . "-0" . $hoy['mon'] . "-" . $hoy['mday'];
    $fecha_proxima = $datoAño . "-0" . $mes_proximo . "-" . $hoy['mday'];
    if (1<=$dia || 9>=$dia ) {
        $fecha = $hoy['year'] . "-0" . $hoy['mon'] . "-0" . $hoy['mday'];
    $fecha_proxima = $datoAño . "-0" . $mes_proximo . "-0" . $hoy['mday'];
    }
}
if (1<=$dia || 9>=$dia ) {
    $fecha = $hoy['year'] . "-" . $hoy['mon'] . "-0" . $hoy['mday'];
$fecha_proxima = $datoAño . "-" . $mes_proximo . "-0" . $hoy['mday'];
}

/*-------------------------------------------- */

    
    if (isset($_POST['Aceptar'])) {
        $Array = unserialize(base64_decode($_POST['Aceptar']));
        $Info = $Array[0];
        $id_libro = $Array['id_libro'];
        $cedula_usuario = $Array['cedula'];
        $Id_solicitud = $Array['Id_solicitud'];
    };
    if (isset($_POST['Registrar'])) {
        $Registrar = $_POST['Registrar'];
    };
    if (isset($_POST['Rechazar'])) {
        $Rechazar= $_POST['Rechazar'];
    };
    if (isset($_POST['Recibido'])) {
        $devolver = $_POST['Recibido'];
    };
    
    $fechaPrestamo = $fecha;
    $fechaDevolucion = $fecha_proxima;
    $Estadodelprestamo = 1;



    if (isset($_POST['Rechazar'])) {
        
        $solicitud = new Prestamos();
        $aceptar= $solicitud->RechazoSolic($Rechazar);
        $r=$aceptar;
        if ($r == 1) {
            header("location: ../../Views/Prestamos/Lista_Prestamos.php");
            exit();
        }

    }
    if (isset($_POST['Aceptar'])) {

        $Registrar= new Prestamos();
        $registro = $Registrar->Regis_Prestamo($fechaPrestamo,$fechaDevolucion,$Estadodelprestamo,$id_libro,$cedula_usuario);
        $r=$registro;
        $aceptar= $Registrar->AceptarSolic($Id_solicitud);
        if ($r == 1) {
            header("location: ../../Views/Prestamos/Lista_Prestamos.php");
            exit();
        }
    
    }
    if (isset($_POST['Recibido'])) {
        
        $Rechazar = new Prestamos();
        $aceptar= $Rechazar->DevolucLibro($devolver );
        $r=$aceptar;
        if ($r == 1) {
            header("location: ../../Views/Prestamos/Lista_solicitude_admin.php");
            exit();
        }

    }
?>