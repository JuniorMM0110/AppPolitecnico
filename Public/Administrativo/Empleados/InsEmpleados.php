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
    <form action="" method="POST" id="formulario">
        <!--Nombre_empleado-->
        <div class="nombre">
            <label for="Name">Nombre del empleado</label>
            <input type="text" name="Nombre" autocomplete="off" id="">
        </div>
        <!--Apellido_empleado-->
        <div class="apellido">
            <label for="Apellido">Apellido:</label>
            <input type="text" name="Apellido" autocomplete="off" id="">
        </div>
        <!--Cedula-->
        <div class="cedula" id="cedula">
            <label for="Cedula">Cedula:</label>
            <input type="text" name="Cedula" autocomplete="off" id="">
        </div>
        <!--Salario-->
        <div class="monto" id="monto">
            <label for="salario">Salario:</label>
            <input type="text" name="salario">
        </div>
        <!--Hora_entrada-->
        <div class="horaE">
            <label for="HoraEntrada">Hora de entrada:</label>
            <input type="time" name="HoraEntrada" autocomplete="off" id="">
        </div>
        <!--Hora_salida-->
        <div class="horaH">
            <label for="HoraSalida"></label>
            <input type="time" name="HoraSalida" autocomplete="off" id="">
        </div>
        <!--NombreUsuario-->
        <div class="nombreUs" id="nombreUs">
            <label for="NombreUser">Nombre de usuario:</label>
            <input type="text" name="user" autocomplete="off" id="">
        </div>
        <!--Contraseña-->
        <div class="pass" id="password">
            <label for="Pass">Contraseña</label>
            <input type="password" autocomplete="off" name="pass" id="">
        </div>
        <div class="pass2" id="password2">
            <label for="Pass">Repita la contraseña:</label>
            <input type="password" autocomplete="off" name="pass2" id="">
        </div>

        <!--Correo-->
        <div class="correo" id="correo">
            <label for="Correo">Correo:</label>
            <input type="" autocomplete="off" name="correo" id="">
        </div>
        <!--Direcc-->
        <div class="direcc">
            <label for="Direccion">Direccion</label>
            <input type="text" autocomplete="off" name="direccion" placeholder="Direccion:">
        </div>
        <!--telefono-->
        <div class="telefono" id="telefono">
            <label for="telef">Telefono:</label>
            <input type="text" name="telef" id="">
        </div>
        <input type="submit" value="Enviar" name="Enviar">
        <!--Script para validar el formulario-->
       <!-- <script src="../../../JS/scripts/validar/empleado/validarCorreo.js"></script>-->
        <?php
            if(isset($_POST['Enviar'])){
                //obtencion de datos
                //datos para el usuario
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $pass2 = $_POST['pass2'];
                //datos para el correo
                $correo = $_POST['correo'];
                //datos para el empleado
                $nombre = $_POST['Nombre'];
                $apellido = $_POST['Apellido'];
                $cedula = $_POST['Cedula'];
                $salario = $_POST['salario'];
                $direccion = $_POST['direccion'];
                $horaEntrada = $_POST['HoraEntrada'];
                $horaSalida = $_POST['HoraSalida'];
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
                    $empleado = new Empleado($nombre,$apellido,$cedula,$salario,$direccion,$horaEntrada,$horaSalida,$objUser,$objCorreo);
                    try{
                        if($empleado->InsertarEmpleado() != false){
                        header("refresh:0");
                    
                        }
                    }catch(PDOException $e){
                        echo $e->getMessage();
                    }
                }
                //insertar prod

                //header('location:scripts/insertar.php');
            }
        ?>
    </form>
</body>
</html>