<?php
    //clase de conexion
    class conexion{
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
                $dsn = "mysql:localhost; dbname=$this->nombreBD;charset=UTF8";
                $conexion = new PDO($dsn,$this->host,$this->pass);
                //CONSULTA PARA USAR LA BD QUE SE NECESITA
                $conexion->exec("USE $this->nombreBD");
                echo "conexion completa";
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $conexion;
        }
        function closeConexion($varConexion){
            
        }
    }
?>