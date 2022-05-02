<?php
require("../setup/datosConexion.php");

$id = $_POST['id'];
$estado = $_POST['estado'];
$titulo = $_POST['titulo'];
$precio = $_POST['precio'];
$desc = $_POST['desc'];

$conexion = new Conexion();
$conex = $conexion->conexion();

$sql = "INSERT INTO `publicar` (`id`,  `estado`, `titulo`, `precio`, `descripcion`) VALUES ($id, '$estado', '$titulo', '$precio', '$desc');";

$envio = $conex->query($sql);
$SentenciaSQL="SELECT id from publicar WHERE id = $id";
$query = $conex->query($SentenciaSQL);


foreach($query as $buscar){

    if($envio){
        header("location:../public/index/index.php");
        $path = "../public/administrativo/Productos/publicaciones/".$buscar['id'] ;
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
    }
    
}

?>