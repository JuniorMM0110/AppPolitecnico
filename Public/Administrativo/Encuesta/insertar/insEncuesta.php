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
        require("../../../../setup/datosConexion.php");
        require("../../clases/encuesta.php");
        //--
        if(isset($_POST['enviar'])){
            $pregunta = $_POST['pregunta'];
            $respC = $_POST['respC'];
            $respI1 = $_POST['respI1'];
            $respI2 = $_POST['respI2'];
            //
            if($pregunta == "" || $respC == "" || $respI1 == "" || $respI2 == ""){
                ?>
                <div class="msj-error">
                    <p>Rellenar campos.</p>
                </div>
                <?php
            }else{
                $encuesta = new Encuesta($pregunta,$respC,$respI1,$respI2);
                $encuesta->InsertarEncuesta();
            }
        
        }
    ?>
    <form action="" method="POST">

        <label for="Pregunta">Formula una pregunta:</label>
        <input type="text" name="pregunta">

        <label for="respC">Introduce la respuesta correcta</label>
        <input type="text" name="respC">

        <label for="respI1">respuesta incorrecta 1:</label>
        <input type="text" name="respI1">

        <label for="respI2">respuesta incorrecta 2:</label>
        <input type="text" name="respI2">
        
        <input type="submit" value="Registrar pregunta" name="enviar">
    </form>
</body>
</html>