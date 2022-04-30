<?php
session_start();
require("../setup/datosConexion.php");

$conexion = new Conexion();
$conex = $conexion->conexion();


$usuario = $_POST['username'];
$cont = $_POST['password'];

$sql = "SELECT usuario,contraseña FROM ventas";
$llamar = $conex->prepare($sql);

#$username = $_GET['usuario'];
#$contraseña = $_GET['contraseña'];

$query = $conex->prepare("SELECT * FROM ulogin ");
$query->execute();

$result = $query->fetch(PDO::FETCH_ASSOC);

if($usuario = $result['usuario'] || $cont = $result['contraseña']){
	header("location:../Public/Index/index.php");
	$_SESSION['iniciado'] = true;
}else{
	header("location:../login.php");

}
?>