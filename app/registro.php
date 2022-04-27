<?php

require("../setup/conexion2.php");


$usuario = $_POST['username'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "INSERT INTO `ulogin` (`id`, `usuario`, `fullname`, `email`, `contraseña`) VALUES (NULL, '$usuario', '$fullname', '$email', '$password');";

$envio = mysqli_query($conexion, $sql);

if($envio){
	echo "funciono";
}else{
	echo "no funciono";
}
?>