<?php
    //clase de conexion
    class Conexion{
        function __construct()
        {
            $this->host = 'root';
            $this->nombreBD = 'ventas';
            $this->pass = '';
        }
        private $host;
        private $nombreBD;
        private $pass;
        
        function conexion(){
            try{
                $dsn = "mysql:host=127.0.0.1; dbname=$this->nombreBD;charset=UTF8";
                $conexion = new PDO($dsn,$this->host,$this->pass);
                //CONSULTA PARA USAR LA BD QUE SE NECESITA
                $conexion->exec("USE $this->nombreBD");
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $conexion;
        }
        //funcion para comprobar que algun dato existe
        function ComprobarDato($tabla,$campo,$valorCamp){
            $conex = $this->conexion();
            $sql = ("SELECT * FROM $tabla WHERE $campo = '$valorCamp'");
            try{
                $resultado = $conex->prepare($sql);
                $resultado-> execute();
                $registro = $resultado->fetch(PDO::FETCH_ASSOC) ;
                if($registro == false){
                    //en caso de que el usuario no exista retornara falso
                    return false;
                }else{
                    //en caso de existir returnara true
                    return true;
                }
                //
                $conex = null;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        //funcion para devolver el ID
        function GetId($tabla,$campo,$valorCamp){
            $conex = $this->conexion();
            $sql = "SELECT ID from $tabla where $campo = '$valorCamp'";
            $consulta = $conex->prepare($sql);
            $consulta ->execute();
            //
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
            return $resultado['ID'];
        }
    }
?>