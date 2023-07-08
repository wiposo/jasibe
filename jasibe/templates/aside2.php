<?php
    require('../Config/url.php')
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jasibe</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet">

      <link rel="stylesheet" href="../Assets/Css/aside.css">
</head>
<body>
    <aside>
        <div class="top">
            <div class="logo">
                <img src="../img/logo/logo.png" alt="Jasibe">
                <h2>JAS<span class="danger">IBE</span></h2>
            </div>
            <div class="close">
            <span class="material-icons-sharp">close</span>
            </div>
        </div>

        <div class="sidebar">
                    <a href="<?php echo $url_base;?>dashboard.php">
            <span class="material-icons-sharp">grid_view</span>
            <h3>Dashboard</h3>
            </a>
            <a href="<?php echo $url_base?>/Productos/index.php">
            <span class="material-icons-sharp">inventory</span>
            <h3>Productos</h3>
            </a>
            <a href="#">
            <span class="material-icons-sharp">local_offer</span>
            <h3>Ofertas</h3>
            </a>
            <a href="#">
            <span class="material-icons-sharp">account_circle</span>
            <h3>Cuentas</h3>
            </a>
            <a href="#">
            <span class="material-icons-sharp">credit_score</span>
            <h3>Metodos de pago</h3>
            </a>
            <a href="#">
            <span class="material-icons-sharp">calendar_month</span>
            <h3>Calendario</h3>
            </a>
            <a href="#">
            <span class="material-icons-sharp">add</span>
            <h3>Add Productos</h3>
            </a>
            <a href="<?php echo $url_base;?>">
            <span class="material-icons-sharp">logout</span>
            <h3>Cerrar sesion</h3>
            </a>
        </div>
    </aside>
</body>
</html>