<!----------------barra superior--------------------->
<div class="header">
    <a id="link" href="../Usuarios/inicio.php">
        <div class="Nombre_Paguina">
            <img class="Icono" id="Icono" src="../../../public/Assets/Img/libros2.png" alt="">
            <span>Biblioteca <br> UNEFA</span>
        </div>
    </a>
    <div class="usuario">
        <div class="info-usuario">
            <div class="nombre-email">
                <!------------------Informacion del usuario activo------------------------>
                <span class="nombre"><?php echo "$Nombre" . " " . "$apellido"; ?></span>
                <span class="email"><?php echo "$Correo"; ?></span>
            </div>
        </div>
        <img id="Avatar" src="../../../public/Assets/Img/User1.png" alt="">

    </div>
</div>