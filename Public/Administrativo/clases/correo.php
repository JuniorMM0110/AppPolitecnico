<?php
    //clase de correo
    //importando datos
  //  require('../../../setup/datosConexion.php');
    //funcion para eliminar correo
    function EliminarCorreo($id){
        //conexion 
        $conex = new Conexion();
        $cn = $conex->conexion();
        //sql
        $sql = "DELETE FROM correo where ID = $id";
        //preparacion 
        $consulta = $cn->prepare($sql);
        try{
            $consulta->execute();
        }catch(PDOException $e){
            $e->getMessage();
        }
        //retorno
        if($consulta != false){
            return true;
        }else{
            return false;
        }
        $conex = null;
        $cn = null;
    }
    class Correo{
        function __construct($correo,$pass)
        {
            $this->correo = $correo;
            $this->pass = $pass;
            $this->datos = new Conexion();
        }
        private $correo;
        private $pass;
// HEAD

        //func getters
        function GetCorreo(){
            return $this->correo;
        }
        function GetPass(){
            return $this->pass;
        } 
        // upstream/main
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