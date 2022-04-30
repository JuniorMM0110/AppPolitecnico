<?php
    //importando datos
    require("../../../../../../setup/datosConexion.php");
    require("../../../../clases/empleado.php");
    //obtencion de datos
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];
    //sesion
    session_start();
    $empleado = $_SESSION['ObjetoEmpleado'];
    if($correo != "" and $pass != ""){
        //conexion
        $conex = new Conexion();
        $cn = $conex->conexion();
        //sql
        $sqlUpdate = "UPDATE correo SET correo = '$correo', contraseña = '$pass' ";
        //sentencia
        $consulta = $cn->prepare($sqlUpdate);
        //ejecucion
        try{
            $consulta->execute();
             $cn = null;
             unset($_SESSION['ObjetoEmpleado']);
             session_destroy();
             header("location:../../../msj/msj-actualizado.php");
        }catch(PDOException $e){

        }
    }
?>