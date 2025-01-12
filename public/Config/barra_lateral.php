<!------------------Barra lateral------------------------>
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
                    <!------------------Redireccion a Inicio------------------------>
                    <a href="../Usuarios/inicio.php">
                        <img class="icon" id="icon1" src="../../../public/Assets/Img/home1.svg">
                        <span>Inicio</span>
                    </a>
                </li>
                <li>
                    <!------------------Redireccion a gestion de usuarios------------------------>
                    <a a href="../Usuarios/Lista_Usuarios.php">
                        <img class="icon" id="icon2" src="../../../public/Assets/Img/usuario1.png">
                        <span>Gestión de Usuarios</span>
                    </a>
                </li>
                <li>
                    <!------------------Redireccion a gestion de libros------------------------>
                    <a a href="../Libros/Libros.php">
                        <img class="icon" id="icon3" src="../../../public/Assets/Img/book1.svg">
                        <span>Gestión de Libros </span>
                    </a>
                </li>
                <li>
                    <!------------------Redireccion a gestion de prestamos------------------------>
                    <a a href="../Prestamos/Lista_Prestamos.php">
                        <img class="icon" id="icon4" src="../../../public/Assets/Img/prestamo1.png">
                        <span>Préstamos</span>
                    </a>
                </li>
                <li>
                    <!------------------cerrar sesion activa------------------------>
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