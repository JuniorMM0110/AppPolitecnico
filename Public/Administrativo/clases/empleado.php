<?php
    //importando datos
    require('../../../setup/datosConexion.php');
    require("correo.php");
    require("user.php");
    //clase empleado
    class Empleado{
        function __construct($nombre,$apellido,
        $cedula,$direccion,$horaEntrada,$horaSalida,$objUser,$objCorreo)
        {
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->cedula = $cedula;
            $this->direccion = $direccion;
            $this->horaEntrada = $horaEntrada;
            $this->horaSalida = $horaSalida;
            $this->objUser = $objUser;
            $this->objCorreo = $objCorreo;
            $this-> datos = new Conexion();
            $this->fkUser=$this->datos->GetId("usuario","nombreUsuario",$this->objUser->GetUser());
            $this->fkCorreo = $this->datos->GetId("correo","correo",$this->objCorreo->GetCorreo());
        }
        //
        private $id;
        private $nombre; 
        private $apellido;
        private $cedula;
        private $direccion;
        private $horaEntrada;
        private $horaSalida;
        private $objUser;
        private $objCorreo;
        //id
        private $fkCorreo;
        private $fkUser;
       // private 
        //funcion insertar empleado
        function InsertarEmpleado(){
            //conexion      
            $conex = $this->datos->conexion();
            //comporbar si existe el mismo numero de cedula en la BD
            if($this->datos->ComprobarDato("empleado","cedula",$this->cedula) != false){
                return false;
            }else{
                //consulta sql
                $sql = "INSERT INTO empleado VALUES(
                    null,'$this->nombre','$this->apellido',
                    '$this->cedula','$this->direccion','$this->horaEntrada',
                    '$this->horaSalida',$this->fkCorreo,$this->fkUser
                )";
                //PDO
                $consulta = $conex->prepare($sql);
                try{
                    $consulta->execute();
                }catch(PDOException $e){
                    print($e->getMessage());
                }
                //comprobar si se ejecuto la consulta
                if($consulta == false){
                    return false;
                }else{
                    return true;
                }
            }
        }
    }
?>