<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        //importar datos
        require("../../../../setup/datosConexion.php");
        require("../../clases/producto.php");
        //
        $conex = new Conexion();
        $cn = $conex->conexion();
        //
        $sql = "SELECT * FROM producto";
        $consulta =$cn->prepare($sql);
        $consulta->execute();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $url = $_GET['direct'];
            $sqlDelete = "DELETE FROM producto WHERE id = $id";
            $sentencia = $cn->prepare($sqlDelete);
            $sentencia->execute();
            unlink($url);
            header("location:?");
        }
    ?>
    <table>
        <tr>
            <td>Nombre del producto:</td>
            <td>Precio:</td>
            <td>Disponibles:</td>  
            <td>Fecha de ingreso:</td>
            <td>Descuento:</td>
            <td>Eliminar:</td>
        </tr>
        <?php
            while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
                ?>
            <tr>
                <td><?php echo $registro['Nombre'];?></td>
                <td><?php echo $registro['Precio']."RD";?></td>
                <td><?php echo $registro['Disponible'];?></td>
                <td><?php echo $registro['fechaIngreso'];?></td>
                <td><?php echo $registro['Descuento'];?></td>
                <td><a href="?id=<?php echo $registro['id'];?>&direct=<?php echo $registro['foto'];?>">Eliminar</a></td>
                <td><a href="../mod-prod/mod-prod.php?id=<?php echo $registro['id'];?>">Modificar</a></td>
            </tr>
            <?php }
        ?>
    </table>
</body>
</html>