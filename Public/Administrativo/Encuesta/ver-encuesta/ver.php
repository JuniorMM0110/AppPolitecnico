<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuestas disponibles</title>
</head>
<body>
    <a href="../dashboard-encuesta/dashboard.php">Volver</a>
    <?php
        require("../../clases/encuesta.php");
        require("../../../../setup/datosConexion.php");
        comprobarFecha();
        $conex = new Conexion();
        $cn = $conex->conexion();
        $sql = "SELECT * FROM encuesta";
        $query = $cn->prepare($sql);
        $query->execute();
        if(isset($_GET['id'])){
            $valorElim = $_GET['id'];
            $sqlDelete = "DELETE FROM encuesta where id = $valorElim";
            $sentencia = $cn->prepare($sqlDelete);
            $sentencia->execute();
            header("location:?");
        }
    ?>
    <table>
        <tr>
            <td>Pregunta:</td>
            <td>Respuesta correcta:</td>
            <td>Eliminar:</td>
        </tr>
        <?php
        while($registro = $query->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <td><?php echo $registro['pregunta'];?></td>
            <td><?php echo $registro['respuesta-correcta'];?></td>
            <td><a href="?id=<?php echo$registro['id'];?>">Eliminar</a></td>
        </tr>
        <?php }
        ?>
    </table>
</body>
</html>