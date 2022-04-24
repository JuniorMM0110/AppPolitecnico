<?php
    //clase de correo
    //importando datos
  //  require('../../../setup/datosConexion.php');

    class Correo{
        function __construct($correo,$pass)
        {
            $this->correo = $correo;
            $this->pass = $pass;
            $this->datos = new Conexion();
        }
        private $correo;
        private $pass;
        //func getters
        function GetCorreo(){
            return $this->correo;
        }
        //func comprobarCorreo
        function insertarCorreo(){
            if($this->datos->comprobarDato("correo","correo",$this->correo)==false){
                //establecer una conexion
                $conex = $this->datos->conexion();
                $sql = "INSERT INTO CORREO VALUES(NULL,'$this->correo','$this->pass')";
                try{
                    $resultado = $conex->prepare($sql);
                    $resultado->execute() or die(print("Fallo al ejecutar"));
                    return true;
                }catch(PDOException $e){
                    print($e->getMessage());
                }
            }else{
                return false;
            }
        }
    }
    //funcion para insertar un correo
    
?>