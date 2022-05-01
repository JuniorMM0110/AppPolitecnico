<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajustes</title>
</head>
<body>
    <?php
        //importando datos
        require("../../../../setup/datosConexion.php");     
        require("../../clases/empleado.php");
        
        //ajustes
        $id = $_GET['id'];
        $empleadoModif = GenerarEmpleado($id);
        //start session
        session_start();
        //añadiendo variables
        $_SESSION['ObjetoEmpleado'] = $empleadoModif;
        //obj
        $empleado = $_SESSION['ObjetoEmpleado'];
    ?>
    <div class="ajustes">
        <div class="info-empleado">
            <p>Id del empleado: <?php echo $empleado->GetId()?></p>
            <p>Modificando datos de: <?php echo $empleado->GetNombreC()?></p>
        </div>
        <div class="btn">
            <a href="modificar-niveluser/modNivelUser.php">Modificar nivel de usuario</a>
            <a href="Modificar-empleado/modDatos.php">Modificar datos del empleado</a>
            <a href="Modificar-correo/modCorreo.php">Cambiar correo</a>
        </div>
    </div>
</body>
</html>