<?php 
    include '../Config/bd.php';
if(isset($_GET['txtID'])){
    $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia = $conexion->prepare("SELECT * FROM productos WHERE id_producto=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);


    $nombre_producto = $registro["nombre_producto"];
    $precio = $registro["precio"];
    $cantidad = $registro["cantidad"];
    $descripcion = $registro["descripcion"];
    $imagen = $registro["imagen"];
}

if($_POST){

    $txtID = (isset($_POST['id']))?$_POST['id']:"";
    $nombre_producto=(isset($_POST["nombre_producto"])?$_POST["nombre_producto"]:"");
    $precio=(isset($_POST["precio"])?$_POST["precio"]:"");
    $cantidad=(isset($_POST["cantidad"])?$_POST["cantidad"]:"");
    $descripcion=(isset($_POST["descripcion"])?$_POST["descripcion"]:"");

    $sentencia = $conexion->prepare("
        UPDATE productos SET nombre_producto=:nombre_producto,
        precio=:precio,
        cantidad=:cantidad,
        descripcion=:descripcion
        WHERE id_producto=:id ");

    $sentencia->bindParam(":nombre_producto", $nombre_producto);
    $sentencia->bindParam(":precio", $precio);
    $sentencia->bindParam(":cantidad", $cantidad);
    $sentencia->bindParam(":descripcion", $descripcion);
    $sentencia->bindParam(":id", $txtID);
    
    $sentencia->execute();

    $imagen=(isset($_FILES["imagen"]['name'])?$_FILES["imagen"]['name']:"");

    $fecha_image = new DateTime();
        $nombre_foto = ($imagen != '') ? $fecha_image->getTimestamp()."_".$_FILES["imagen"]['name']:"";
        $tmp_imagen = $_FILES["imagen"]['tmp_name'];
        if($tmp_imagen != ''){
            move_uploaded_file($tmp_imagen, "./".$nombre_foto);
            
            $sentencia = $conexion->prepare("SELECT imagen FROM productos WHERE id_producto=:id");
            $sentencia->bindParam(":id",$txtID);
            $sentencia->execute();
            $registro_recuperado = $sentencia->fetch(PDO::FETCH_LAZY);

            if(isset($registro_recuperado["imagen"]) && $registro_recuperado["imagen"] != ""){
                if(file_exists("./".$registro_recuperado["imagen"])){
                    unlink("./".$registro_recuperado["imagen"]);
                }
            }

            $sentencia = $conexion->prepare("UPDATE productos SET imagen=:imagen WHERE id_producto=:id ");
            $sentencia->bindParam(":imagen", $nombre_foto);
            $sentencia->bindParam(":id", $txtID);
            $sentencia->execute();
        }

    
    header("Location: index.php");
    


}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="../Assets/Css/dashboard.css">
    <link rel="stylesheet" href="../Assets/Css/form.css">
</head>
<body>
    <div class="container">
        <?php include '../templates/aside2.php'; ?>
        <section>
            <?php include '../templates/nav.php' ?>
            <form action="" method="post" enctype="multipart/form-data">
                <h1 class="form-title">Editar Productos</h1>
                <div class="contenedor-form">
                <div class="contenedor__input">
                    <input class="input__text" type="hidden" readonly name="id" value="<?php echo $txtID ?>">
                </div>
                <div class="contenedor__input">
                    <label for="nombre_producto">Producto</label>
                    <input class="input__text" type="text" name="nombre_producto" id="" value="<?php echo $nombre_producto ?>">
                </div>
                <div class="contenedor__input">
                    <label for="precio">Precio</label>
                    <input class="input__text" type="text" name="precio" id="" value="<?php echo $precio ?>">
                </div>
                <div class="contenedor__input">
                    <label for="cantidad">Cantidad</label>
                    <input class="input__text" type="text" name="cantidad" id="" value="<?php echo $cantidad ?>">
                </div>
                <div class="contenedor__input">
                    <label for="descripcion">Descripcion</label>
                    <input class="input__text" type="larabel" name="descripcion" id="" value="<?php echo $descripcion ?>">
                </div>
                <div class="contenedor__input">
                    <label for="imagen">Imagen</label>
                    <img class="img_producto" src="<?php echo $imagen ?>" alt="">
                    <input class="img__input" type="file" name="imagen" id="imagen" aria-describedby="helpid" placeholder="imagen">
                </div>
                <div class="contenedor__submit">
                    <input class="enviar" type="submit" value="Actualizar">
                    <a class="cancelar" href="<?php echo $url_base; ?>/Productos/index.php">Cancelar</a>
                </div>
                </div>
            </form>
        </section>
    </div>
</body>
</html>