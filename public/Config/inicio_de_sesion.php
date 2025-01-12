<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="../Assets/Css/inicio de sesion1.css">
</head>

<body>
    <form action="../../app/Controllers/Usuarios/Login.php" method="post">
        <div class="Caja">
            <div class="Contenedor">
                <div class="titulo">
                    <header>Inicio de Sesión</header>
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
                    <input type="email" placeholder="Ingrese Correo Gmail" name="Correo" pattern="^([a-zA-Z0-9_\-\.]+)@gmail.com" class="input" maxlength="30" required >
                </div>
                <div class="input-field">
                    <input type="password" placeholder="Contraseña" name="Contraseña"  class="input"  maxlength="10" required>
                </div>
                <div class="input-field">
                    <input type="submit" value="Acceder" class="submit">
                </div>
                <div class="Registro">
                    <label><a href="Registro_de_usuario.php">¿No tienes cuenta? Registrate</a></label>
                </div>
            </div>
        </div>
    </form>
</body>

</html>