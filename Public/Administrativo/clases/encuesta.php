<?php
    function comprobarFecha(){
        $fecha = date("Y-m-d");
        $conex = new Conexion();
        $cn = $conex->conexion();
        $sql = "DELETE FROM encuesta where `fecha-expiracion` = '$fecha'";
        $consulta = $cn->prepare($sql);
        $consulta->execute();
    }
    class Encuesta{
        function __construct($pregunta,$respuestaC,$inc1,$inc2,$date)
        {
            $this->pregunta = $pregunta;
            $this->respuestaC = $respuestaC;
            $this->inc1 = $inc1;
            $this->inc2 = $inc2;
            $this->fecha = $date;
        }
        //crear encuestas
        function InsertarEncuesta(){
            $conex = new Conexion();
            $cn = $conex->conexion();
            $sql = "INSERT INTO encuesta VALUES (null,'$this->pregunta','$this->respuestaC','$this->inc1','$this->inc2','$this->fecha')";
            $consulta = $cn->prepare($sql);
            try{
                $consulta->execute();
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }
?>