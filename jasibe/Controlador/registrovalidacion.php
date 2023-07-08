<?php
include("conexion.php");


if(isset($_POST['registro'])){

    if (strlen($_POST['nombre']) >=1 && strlen($_POST['apellidos']) >=1 && strlen($_POST['correo']) >=1 && strlen($_POST['password']) >=1) {
    $nombre=trim($_POST['nombre']);
    $apellidos=trim($_POST['apellidos']);
    $correo=trim($_POST['correo']);
    $password=trim($_POST['password']);
    $consulta="INSERT INTO usuarios(nombre, apellidos, correo, contraseña, id_rol) VALUES ('$nombre','$apellidos','$correo','$password','2')";
    $resultado=mysqli_query($conexion,$consulta);
    if($resultado){

        echo"Se a registrado correctamente";
        header("Refresh:1; url=../iniciocliente.html");
    }else{
        echo"Algo salio mal en el registro";
        header("Refresh:1; url=../registro.php");
    }
    }else{
        echo"Algun campo esta vacio";
        header("Refresh:1; url=../registro.php");
    }
}
?>