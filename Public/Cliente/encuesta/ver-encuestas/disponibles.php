<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuestas disponibles</title>
</head>
<body>
    <?php
        require("../../../Administrativo/clases/encuesta.php");
        require("../../../../setup/datosConexion.php");
        comprobarFecha();
        $conex = new Conexion();
        $cn = $conex->conexion();
        $sql = "SELECT * FROM encuesta";
        $query = $cn->prepare($sql);
        $query->execute();
    ?>
    <table>
        <tr>
            <td>Disponible:</td>
            <td>Fecha de vencimiento:</td>
        </tr>
        <?php
        $encuestas = false;
        while($registro = $query->fetch(PDO::FETCH_ASSOC)){
            $contador = 1;
            $encuestas = true;
            ?>
            <tr>
                <td>Encuesta número:<?php echo $contador;?></td>
                <td> <?php echo $registro['fecha-expiracion'];?></td> 
                <td><a href="">Participar</a></td>
            </tr>
            <?php 
            $contador++;
        }
        ?>
    </table>
    <?php 
      if($encuestas==false){
        ?>
        <div class="msj-sinEncuestas">
            <p>Ahora mismo no hay encuestas disponibles, regrese más tarde!.</p>
        </div>
        <?php
    }?>


</body>
</html>