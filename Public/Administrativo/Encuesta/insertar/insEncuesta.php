<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear encuesta</title>
</head>
<body>
    <?php
        require("../../../../setup/datosConexion.php");
        require("../../clases/encuesta.php");
        //--
        if(isset($_POST['enviar'])){
            $pregunta = $_POST['pregunta'];
            $respC = $_POST['respC'];
            $respI1 = $_POST['respI1'];
            $respI2 = $_POST['respI2'];
            $fecha = $_POST['fecha'];
            //
            if($pregunta == "" || $respC == "" || $respI1 == "" || $respI2 == "" || $fecha == ""){
                ?>
                <div class="msj-error">
                    <p>Rellenar campos.</p>
                </div>
                <?php
            }else{
                $encuesta = new Encuesta($pregunta,$respC,$respI1,$respI2,$fecha);
                $encuesta->InsertarEncuesta();
            }
        
        }
    ?>
    <a href="../dashboard-encuesta/dashboard.php">Volver</a>
    <form action="" method="POST">

        <label for="Pregunta">Formula una pregunta:</label>
        <input type="text" name="pregunta">

        <label for="respC">Introduce la respuesta correcta</label>
        <input type="text" name="respC">

        <label for="respI1">respuesta incorrecta 1:</label>
        <input type="text" name="respI1">

        <label for="respI2">respuesta incorrecta 2:</label>
        <input type="text" name="respI2">

        <label for="fecha">Fecha de expiracion</label>
        <input type="date" name="fecha"> <!--DD//MM//aaaa-->
        <input type="submit" value="Registrar pregunta" name="enviar">
    </form>
</body>
</html>