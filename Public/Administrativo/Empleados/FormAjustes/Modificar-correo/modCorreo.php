<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar correo</title>
</head>
<body>
    <?php
        //importando datos
        require("../../../clases/empleado.php");
        require("../../../../../setup/datosConexion.php");
        //sesion
        session_start();
        $empleado = $_SESSION['ObjetoEmpleado'];    
    ?>
    <form action="scripts/script-correo.php" method="POST">
        <label for="Correo">Correo:</label>
        <input type="text" name="correo" value="<?php echo $empleado->GetCorreo();?>">
        
        <label for="pass">Contraseña:</label>
        <input type="text" name="pass" value="<?php echo $empleado->GetPassCorreo()?>">

        <input type="submit" value="Actualizar">
    </form>
</body>
</html>