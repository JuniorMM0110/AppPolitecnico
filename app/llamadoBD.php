<?php

$conxion = new Conexion();
$conex = $conxion->conexion();

$sql= "SELECT * FROM publicar";
$envio = $conex->prepare($sql);
$envio->execute();
$envio = $query->fetch(PDO::FETCH_ASSOC);


?>