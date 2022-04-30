<?php

session_start();
require("../setup/datosConexion.php");

$estado = $_POST['estado'];
$titulo = $_POST['titulo'];
$precio = $_POST['precio'];
$desc = $_POST['desc'];

$conexion = new Conexion();
$conex = $conexion->conexion();

$sql = "INSERT INTO `publicar` (`id`,  `estado`, `titulo`, `precio`, `descripcion`) VALUES (NULL, '$estado', '$titulo', '$precio', '$desc');";

$envio = $conex->query($sql);

if($envio){
    header("location:../public/index/index.php");
    $_SESSION['iniciado']= true;
}


?>