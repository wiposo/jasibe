<?php
  include '../Config/bd.php';

  if(isset($_GET['txtID'])){
    $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia = $conexion->prepare("SELECT imagen FROM productos WHERE id_producto=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro_recuperado = $sentencia->fetch(PDO::FETCH_LAZY);

    if(isset($registro_recuperado["imagen"]) && $registro_recuperado["imagen"] != ""){
        if(file_exists("./".$registro_recuperado["imagen"])){
            unlink("./".$registro_recuperado["imagen"]);
        }
    }
    
    // $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia = $conexion->prepare("DELETE FROM productos WHERE id_producto=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    header("Location: index.php");
    

  }

  $sentencia = $conexion->prepare("SELECT * FROM productos");
  $sentencia->execute();
  $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jasibe - Admint</title>
  <link rel="stylesheet" href="../Assets/Css/aside.css">
  <link rel="stylesheet" href="../Assets/Css/dashboard.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
</head>
<body>

  <div class="container">
    <?php include '../templates/aside2.php' ?>

    <section>

      <?php include '../templates/nav.php' ?>
      <div class="table_container">
        <h1 class="table-h1">Productos</h1>
        <a class="new__producto" href="crear.php">Nuevo Producto</a>
        <table class="table">
          <thead>
            <tr>
              <th class="table__title">ID</th>
              <th class="table__title">Productos</th>
              <th class="table__title">Precio</th>
              <th class="table__title">Cantidad</th>
              <th class="table__title">Descripcion</th>
              <th class="table__title">Imagen</th>
              <th class="table__title">Actualizar</th>
              <th class="table__title">Eliminar</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($listaProductos as $listaProducto){ ?>
              
              <tr>
              <td class="table__text"><?php echo $listaProducto['id_producto'] ?></td>
              <td class="table__text"><?php echo $listaProducto['nombre_producto'] ?></td>
              <td class="table__text"><?php echo $listaProducto['precio'] ?></td>
              <td class="table__text"><?php echo $listaProducto['cantidad'] ?></td>
              <td class="table__text"><?php echo $listaProducto['descripcion'] ?></td>
              <td class="table__text"><img class="img_producto" src="<?php echo $listaProducto['imagen'] ?>" alt=""></td>
              <td class="table__text"><a href="editar.php?txtID=<?php echo $listaProducto['id_producto'] ?>"><span class="material-icons-sharp">edit</span></a></td>
              <td class="table__text"><a href="index.php?txtID=<?php echo $listaProducto['id_producto'] ?>"><span class="material-icons-sharp">delete</span></a></td>
            </tr>
              
              <?php
              }  ?>
            
          </tbody>
        </table>
      </div> 
    </section>
  </div>

</body>
</html>