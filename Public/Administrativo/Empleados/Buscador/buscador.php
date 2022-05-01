<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        require("../../../../setup/datosConexion.php");
        require("../../clases/empleado.php");
    ?>
</head>
<body>
    <a href="../modEmpleados.php">Volver</a>
    <form action="" method="GET">
        <div class="buscador">
            <h3>Buscar</h3>
            <input type="text" class="buscador" name="buscador">
            <select name="filtro" id="">
                <option value="usuario">Nombre de usuario</option>
                <option value="empleado">Nombre</option>
                <option value="correo">Correo electronico</option>
            </select>
        </div>
        <div class="btn-buscar">
            <input type="submit" value="Buscar" name="btn-buscar">
        </div>
    </form>
    <?php
        include("script-buscar.php");
        if(isset($_GET['btn-buscar'])){
            Buscador($_GET['filtro'],$_GET['buscador']);
        }
    ?>
</body>
</html>