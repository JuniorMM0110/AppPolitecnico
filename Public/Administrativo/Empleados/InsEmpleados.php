<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- El input de texto en direccion es temporal hasta que se introduzca
        el script para la ubicacion, cada input va acompañado con su propio label.-->
    <form action="" method="POST">
        <label for="Name">Nombre del empleado</label>
        <input type="text" name="Nombre" id="">

        <label for="Apellido">Apellido:</label>
        <input type="text" name="Apellido" id="">

        <label for="Cedula">Cedula:</label>
        <input type="text" name="Cedula" id="">

        <label for="HoraEntrada">Hora de entrada:</label>
        <input type="time" name="HoraEntrada" id="">

        <label for="HoraSalida"></label>
        <input type="time" name="HoraSalida" id="">

        <label for="NombreUser">Nombre de usuario:</label>
        <input type="text" name="NombreUser" id="">
        
        <label for="Pass">Contraseña</label>
        <input type="text" name="pass" id="">

        <label for="Correo">Correo:</label>
        <input type="text" name="correo" id="">

        <input type="submit" value="Enviar" name="Enviar">

        <?php
            if(isset($_POST['Enviar'])){
                //obtencion de datos
                //datos para el usuario
                $user = $_POST['NombreUser'];
                $pass = $_POST['pass'];
                //datos para el correo
                $correo = $_POST['correo'];
                //datos para el empleado
                $nombre = $_POST['Nombre'];
                $apellido = $_POST['Apellido'];
                $cedula = $_POST['Cedula'];
                $horaEntrada = $_POST['HoraEntrada'];
                $horaSalida = $_POST['HoraSalida'];
                //probando recibir datos
                   
                //header('location:scripts/insertar.php');
            }
        ?>
    </form>
</body>
</html>