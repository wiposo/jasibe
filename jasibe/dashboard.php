<?php
  include 'Config/bd.php';

  if(isset($_GET['txtID'])){

    $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia = $conexion->prepare("DELETE FROM productos WHERE id_producto=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    

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
  <link rel="stylesheet" href="Assets/Css/aside.css">
  <link rel="stylesheet" href="Assets/Css/dashboard.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
</head>
<body>

  <div class="container">
    <?php include 'templates/aside.php' ?>

    <section>
      <?php include 'templates/nav.php' ?>
      <h1>Bienvenido Administrador</h1>

    </section>
  </div>

</body>
</html>