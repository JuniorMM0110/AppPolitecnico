<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del empleado</title>
</head>
<body>
    <?php
        require('../../../clases/empleado.php');
        //obtencion datos
        session_start();
        $empleado = $_SESSION['ObjetoEmpleado'];
    ?>
    <form action="scripts/script-empleado.php" method="POST">

        <label for="nombreC">Nombre completo:</label>
        <input type="text" disabled value="<?php echo $empleado->GetNombrec();?>">

        <label for="cedula">Cedula:</label>
        <input type="text" disabled value="<?php echo $empleado->GetCedula();?>">

        <label for="salario">Salario: </label>
        <input type="text" name="salario" value="<?php echo $empleado->GetSalario();?>">

        <label for="fechaS">Hora de salida:</label>
        <input type="time" name="horaS"value="<?php echo $empleado->GetHoraS();?>">

        <label for="fecha">Hora de entrada:</label>
        <input type="time" name="horaE"value="<?php echo $empleado->GetHoraE();?>">

        <label for="direccion">Direccion:</label>
        <input type="text" name="direccion" value="<?php echo $empleado->GetDireccion();?>">
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>