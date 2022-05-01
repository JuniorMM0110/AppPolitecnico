<?php
    //Obtencion para el update
    require('../../../../../../setup/datosConexion.php');
    require("../../../../clases/empleado.php");
    session_start();
    //dato a cambiar
    $nuevoNivel = $_POST['nivel'];
    //empleado
    $empleado = $_SESSION['ObjetoEmpleado'];
    $idUser = $empleado->GetFkUser();
    //consulta
    $query = "UPDATE usuario SET Nivel = $nuevoNivel WHERE ID = $idUser";
    //conexion
    $conex = new Conexion();
    $cn = $conex->conexion();
    //
    $consulta = $cn->prepare($query);
    $consulta->execute();
    unset($_SESSION['ObjetoEmpleado']);
    header("location:../../../modEmpleados.php");
    ?>