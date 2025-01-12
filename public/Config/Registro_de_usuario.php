<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro</title>
    <link rel="stylesheet" href="../Assets/Css/inicio de sesion1.css">
</head>

<body>
    <form action="../../app/Controllers/Usuarios/Registro_Usuarios.php" method="post">
        <div class="Caja">
            <div class="Contenedor">
                <div class="titulo">
                    <header>Registro</header>
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
                </div>
                <div class="input-field">
                    <input type="text" pattern="\d*" placeholder="Cedula" name="cedula" class="input" minlength="7" maxlength="10" required/>
                </div>
                <div class="input-field">
                    <input type="text" placeholder="Nombre" name="Nombre" class="input" maxlength="30" required/>
                </div>
                <div class="input-field">
                    <input type="text" placeholder="Apellido" name="Apellido" class="input" maxlength="30" />
                </div>
                <div class="input-field">
                    <input type="email" placeholder="Ingrese Correo Gmail" name="Correo" pattern="^([a-zA-Z0-9_\-\.]+)@gmail.com" class="input" maxlength="30" required />
                </div>
                <div class="input-field">
                    <input type="password" placeholder="Contraseña" name="Contraseña" class="input" maxlength="10" required>
                </div>
                <div class="input-field">
                    <input type="password" placeholder="Repetir Contraseña" name="Repetir_Contraseña" class="input" maxlength="10" required>
                </div>
                <div class="input-field">
                    <input type="submit" value="Registrar" name="Registrar" class="submit">
                </div>

                <div class="Iniciar_Sesion">
                    <label><a href="inicio_de_sesion.php">¿Ya tienes cuenta?  Acceder</a></label>
                </div>
            </div>
        </div>
    </form>
</body>

</html>