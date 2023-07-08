<?php
    $servidor = "localhost";
    $bd = "jasibe";
    $user = "root";
    $password = "";

    try{
        $conexion = new PDO("mysql:host=$servidor;dbname=$bd", $user, $password);

    }catch(Exception $e){
        echo $e->getMessage();
    }

?>