<?php

$correo=$_POST['correo'];
$password=$_POST['password'];
session_start();
$_SESSION['correo']=$correo;

$conexion=mysqli_connect("localhost","root","","jasibe");

$sql="SELECT*FROM usuarios where correo='$correo' and contraseña='$password'";
$resultado=mysqli_query($conexion,$sql);

$filas=mysqli_fetch_array($resultado);

if($filas['id_rol']==1){
  header("location:../dashboard.php");
}else
if($filas['id_rol']==2){
  header("location:../iniciocliente.html");
}
else
{
  echo"Algunos de los datos es incorrecto"; 
  header("Refresh:2; url=../inciosesion.html");
}

?>
<?php

mysqli_free_result($resultado);
mysqli_close($conexion);

?>