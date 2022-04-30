<?php
    //importanod datos
    require("../../../../clases/empleado.php");
    require("../../../../../../setup/datosConexion.php");
    //obtencion de datos
    $salario = $_POST['salario'];
    $horaS = $_POST['horaS'];
    $horaE = $_POST['horaE'];
    $direccion = $_POST['direccion'];
    //Sesion
    session_start();
    $objEmpleado = $_SESSION['ObjetoEmpleado'];
    $id = $objEmpleado->GetId();
    //condicionales
    if($salario != "" and $horaE != "" and $horaS != ""){
        if($horaE != $horaS){
            //conexion 
            $conex = new Conexion();
            $cn = $conex->conexion();
            //SQL
            $sqlUpdate = "UPDATE empleado SET salario = $salario,
            HoraEntrada = '$horaE', HoraSalida = '$horaS', Direccion = '$direccion'
            WHERE ID = $id";
            //preparacion
            $consulta = $cn->prepare($sqlUpdate);
            //ejecucion
            try{            
                $consulta->execute();
                unset($_SESSION['ObjetoEmpleado']);
                session_destroy();
                $cn = null;
                header("location:../../../msj/msj-actualizado.php");
            }catch(PDOException $e){
                unset($_SESSION['ObjetoEmpleado']);
                header("location:../../../msj/msj-error.php");
            }
        }
    }else{
        unset($_SESSION['ObjetoEmpleado']);
        header("location:../../../msj/msj-error.php");
    }
?>