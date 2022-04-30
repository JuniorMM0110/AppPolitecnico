<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nivel de usuario</title>
</head>
<body>
    <?php
        //importar datos 
        require("../../../../../setup/datosConexion.php");
        require("../../../clases/empleado.php");
        //conexion 
        $conex = new Conexion();
        $cn = $conex->conexion();
        //iniciando sesion 
        session_start();
        //objeto empelado
        $empleado = $_SESSION['ObjetoEmpleado'];
        //consulta para niveles de usuario
        $sqlNiveles = "SELECT * FROM `niveles-usuario`";
        //preparar la consulta
        $consulta = $cn->prepare($sqlNiveles);
        $consulta->execute();
    ?>
    <div class="info">
        <form action="scripts/script-nivel.php" method="POST">

            <div class="form-label">
                <label for="id">ID:</label>
                <input type="text" name="id" value="<?php echo $empleado->GetId();?>"disabled id="">
            </div>

            <div class="form-label">
                <label for="user">Nombre de usuario:</label>
                <input type="text" name="user" value="<?php echo $empleado->GetUser();?>"disabled id="">
            </div>

            <div class="form-label">
                <label for="nivel">Nivel de usuario:</label>
                <select name="nivel" id="">
                    <option value="null">
                    <?php echo $empleado->GetNivel();?>
                    </option>
                    <?php
                        while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
                            ?>
                            <option value="<?php echo $registro['id']?>">
                                <?php echo $registro['Nivel']?>
                            </option>
                       <?php }
                    ?>
                </select>
            </div>
                            
            <div>
                <input type="submit" value="Enviar">
            </div>
        </form>
    </div>
</body>
</html>