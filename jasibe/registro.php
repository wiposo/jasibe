<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <link rel="stylesheet" href="Assets/Css/registros.css">
    <link rel="shortcut icon" href="logo/descarga (1).jfif" type="image/x-icon">
</head>

<body>
    <main class="contenedor">
        <form class="form" action="Controlador/Registrovalidacion.php" method="post">

            <img src="img/logo/descarga (1).jfif" alt="" class="form__logo">
            <?php

            include("Controlador/registrovalidacion.php");

            ?>
            <h2 class="form__title">Registro</h2>

            <div class="form__container">
                <div class="form__group">
                    <input type="text" name="nombre" id="" class="form__input" placeholder=" ">
                    <label for="" class="form__label">Nombre(s)</label>
                </div>
                <div class="form__group">
                    <input type="text" name="apellidos" id="" class="form__input" placeholder=" ">
                    <label for="" class="form__label">Apellidos</label>
                </div>
                <div class="form__group">
                    <input type="email" name="correo" id="" class="form__input" placeholder=" ">
                    <label for="" class="form__label">Correo</label>
                </div>
                <div class="form__group">
                    <input type="password" name="password" id="" class="form__input" placeholder=" ">
                    <label for="" class="form__label">Contraseña</label>
                </div>
                <input class="form__submit" type="submit" value="registrar" name="registro">
            </div>

        </form>
    </main>


</body>

</html>