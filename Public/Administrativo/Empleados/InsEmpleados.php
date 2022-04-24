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
        require("../clases/empleado.php");
    ?>
    <!-- El input de texto en direccion es temporal hasta que se introduzca
        el script para la ubicacion, cada input va acompañado con su propio label.-->
    <form action="" method="POST">
        <label for="Name">Nombre del empleado</label>
        <input type="text" name="Nombre" autocomplete="off" id="">

        <label for="Apellido">Apellido:</label>
        <input type="text" name="Apellido" autocomplete="off" id="">

        <label for="Cedula">Cedula:</label>
        <input type="text" name="Cedula" autocomplete="off" id="">

        <label for="HoraEntrada">Hora de entrada:</label>
        <input type="time" name="HoraEntrada" autocomplete="off" id="">

        <label for="HoraSalida"></label>
        <input type="time" name="HoraSalida" autocomplete="off" id="">

        <label for="NombreUser">Nombre de usuario:</label>
        <input type="text" name="NombreUser" autocomplete="off" id="">
        
        <label for="Pass">Contraseña</label>
        <input type="password" autocomplete="off" name="pass" id="">

        <label for="Correo">Correo:</label>
        <input type="" autocomplete="off" name="correo" id="">

        <label for="Direccion">Direccion</label>
        <input type="text" autocomplete="off" name="direccion" placeholder="Direccion:">

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
                $direccion = $_POST['direccion'];
                $horaEntrada = $_POST['HoraEntrada'];
                $horaSalida = $_POST['HoraSalida'];
                echo $pass;
                //comprobacion (temporal luego sera reemplazada por js)
                if($user == "" or $pass == "" or $correo =="" or $nombre =="" or $apellido == ""
                or $cedula == "" or $horaEntrada =="" or $horaSalida == ""){
                    echo "Introduzca bien los campos";
                }else{
                    //creacion de objetos
                    //usuario
                    $objUser= new Usuario($user,$pass);
                    //correo
                    $objCorreo = new Correo($correo,$pass);
                    $objCorreo->insertarCorreo();
                    $objUser->insertar(1);
                    //empleado
                    $empleado = new Empleado($nombre,$apellido,$cedula,$direccion,$horaEntrada,$horaSalida,$objUser,$objCorreo);
                    try{
                        if($empleado->InsertarEmpleado() != false){
                            echo "Empleado insertado correctamente";
                        }
                    }catch(PDOException $e){
                        echo $e->getMessage();
                    }
                }
                //insertar prod

                //header('location:scripts/insertar.php');
            }
        ?>
        <script src="../../../JS/scripts/validar/empleado/validarCorreo.js"></script>
    </form>
</body>
</html>