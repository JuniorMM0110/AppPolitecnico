<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
</head>
<body>
    <a href="../ver-prod/verProd.php">Volver</a>
    <?php
        //importando datos
        require("../../../../setup/datosConexion.php");
        require("../../clases/producto.php");
        //sesion 
        session_start();
        $_SESSION['id'] = $_GET['id'];
        $id = $_SESSION["id"];
        $prod = GenerarProducto($_SESSION['id']);
        //
        if(isset($_POST['Enviar'])){
            //
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            //
            $conex = new Conexion();
            $cn = $conex->conexion();
            $sql = "UPDATE producto SET Nombre = '$nombre', 
            Precio = $precio WHERE id = $id ";
            $consulta = $cn->prepare($sql);
            $consulta->execute();
            unset($_SESSION['id']);
            session_destroy();
            header("location:../ver-prod/verProd.php");
        }
    ?>
    <form action="" method="POST">
        <label for="id">Id:</label>
        <input type="text" name="" value="<?php echo $prod->GetId();?>" disabled>

        <label for="Nombre">Nombre del producto:</label>
        <input type="text" name="nombre" value="<?php echo $prod->GetNombre()?>">

        <label for="precio">Precio:</label>
        <input type="text" name="precio" value="<?php echo $prod->GetPrecio();?>">

        <input type="submit" value="Enviar" name="Enviar">
    </form>
</body>
</html>