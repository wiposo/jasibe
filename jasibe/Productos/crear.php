<?php
    include '../Config/bd.php';

    if($_POST){

        $nombre_producto=(isset($_POST["nombre_producto"])?$_POST["nombre_producto"]:"");
        $precio=(isset($_POST["precio"])?$_POST["precio"]:"");
        $cantidad=(isset($_POST["cantidad"])?$_POST["cantidad"]:"");
        $descripcion=(isset($_POST["descripcion"])?$_POST["descripcion"]:"");
        $imagen=(isset($_FILES["imagen"]['name'])?$_FILES["imagen"]['name']:"");

        $sentencia = $conexion->prepare("INSERT INTO productos
            (id_producto, nombre_producto, precio, cantidad, descripcion, imagen)
            VALUES (NUll,:nombre_producto,:precio,:cantidad,:descripcion,:imagen)");

        $sentencia->bindParam(":nombre_producto", $nombre_producto);
        $sentencia->bindParam(":precio", $precio);
        $sentencia->bindParam(":cantidad", $cantidad);
        $sentencia->bindParam(":descripcion", $descripcion);

        $fecha_image = new DateTime();
        $nombre_foto = ($imagen != '') ? $fecha_image->getTimestamp()."_".$_FILES["imagen"]['name']:"";
        $tmp_imagen = $_FILES["imagen"]['tmp_name'];
        if($tmp_imagen != ''){
            move_uploaded_file($tmp_imagen, "./".$nombre_foto);
        }

        $sentencia->bindParam(":imagen", $nombre_foto);
        
        $sentencia->execute();
        header("Location: index.php");
        


    }


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Productos</title>
    <link rel="stylesheet" href="../Assets/Css/dashboard.css">
    <link rel="stylesheet" href="../Assets/Css/form.css">
</head>
<body>
    <div class="container">
        <?php include '../templates/aside2.php' ?>


        <section>
            <?php include '../templates/nav.php' ?>


            <form class="contenedor__form" action="" method="post" enctype="multipart/form-data">
                <h1 class="form-title">Añadir Producto</h1>
                <div class="contenedor-form">
                <div class="contenedor__input">
                    <label for="nombre_producto">Producto</label>
                    <input class="input__text" type="text" name="nombre_producto" id="">
                </div>
                <div class="contenedor__input">
                    <label for="precio">Precio</label>
                    <input class="input__text" type="text" name="precio" id="">
                </div>
                <div class="contenedor__input">
                    <label for="cantidad">Cantidad</label>
                    <input class="input__text" type="text" name="cantidad" id="">
                </div>
                <div class="contenedor__input">
                    <label for="descripcion">Descripcion</label>
                    <input class="input__text" type="larabel" name="descripcion" id="">
                </div>
                <div class="contenedor__input">
                    <label for="imagen">Imagen</label>
                    <input class="img__input" type="file" name="imagen" id="imagen" aria-describedby="helpid" placeholder="imagen">
                </div>
                <div class="contenedor__submit">
                    <input class="enviar" type="submit" value="Añadir">
                    <a class="cancelar" href="<?php echo $url_base;?>/Productos/index.php">Cancelar</a>
                </div>
            </form>
        </section>
    </div>
</body>
</html>