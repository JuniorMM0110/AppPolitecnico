<?php
    //importando datos
    
    require("correo.php");
    require("user.php");
   // require('../../../setup/datosConexion.php');
    //funciones relacionadas a la clase

    //funcion para generar un empleado a base de un id
    function GenerarEmpleado($id){
        $conex = new Conexion();
        $cn = $conex->conexion();
        //consulta
        $sql = "SELECT * FROM EMPLEADO 
        INNER JOIN USUARIO ON EMPLEADO.fkUsuario = USUARIO.ID
        INNER JOIN CORREO ON EMPLEADO.fkCorreo = CORREO.ID
        WHERE empleado.ID = $id";
        //
        $query = $cn->prepare($sql);
        $query->execute();
        $registro = $query->fetch(PDO::FETCH_ASSOC);
        //objetos
        $objCorreo = new Correo($registro['correo'],$registro['contraseña']);
        $objUser = new usuario($registro['nombreUsuario'],$registro['contraseña']);
        //empleado
        $empleado = new Empleado($registro['Nombre'],$registro['Apellido'],
        $registro['cedula'],$registro['salario'],$registro['Direccion'],
        $registro['HoraEntrada'],$registro['HoraSalida'],$objUser,$objCorreo);
        $empleado->SetId($id);
        return $empleado;
    }
    //funcion eliminar empleados
    function EliminarEmpleado($id){
        //conexion 
        $conex = new Conexion();
        $cn = $conex->conexion();
        //sql
        $sql = "DELETE FROM empleado where ID = $id";
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
    
    //clase empleado
    class Empleado{
        function __construct($nombre,$apellido,
        $cedula,$salario,$direccion,$horaEntrada,$horaSalida,$objUser,$objCorreo)
        {
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->cedula = $cedula;
            $this->direccion = $direccion;
            $this->horaEntrada = $horaEntrada;
            $this->horaSalida = $horaSalida;
            $this->objUser = $objUser;
            $this->objCorreo = $objCorreo;
            $this->datos = new Conexion();
            $this->fkUser=$this->datos->GetId("usuario","nombreUsuario",$this->objUser->GetUser());
            $this->fkCorreo = $this->datos->GetId("correo","correo",$this->objCorreo->GetCorreo());
            $this->salario = $salario;
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
        private $salario;
        //id para crear un nuevo
        private $fkCorreo;
        private $fkUser;
       // private 
       //Getters y Setters
       //funciones correo
       function GetCorreo(){
            return $this->objCorreo->GetCorreo();
       }
       function GetPassCorreo(){
           return $this->objCorreo->GetPass();
       }
       //funciones direccion
       function GetDireccion(){
           return $this->direccion;
       }
       //funciones horaEntrada
       function GetHoraE(){
           return $this->horaEntrada;
       }
       //funciones horaSalidda
       function GetHoraS(){
           return $this->horaSalida;
       }
       //funciones salario
       function GetSalario(){
           return $this->salario;
       }
       //funciones cedula
       function GetCedula(){
           return $this->cedula;
       }
       //funciones ID
       function SetId($id){
           $this->id = $id;
       }
       function GetId(){
           return $this->id;
       }
       //Nombre
       function GetNombreC(){
           return $this->nombre. " ".$this->apellido;
       }
       //usuario
       function GetUser(){
           return $this->objUser->GetUser();
       }
       //nivel de usuario
       function GetFkUser(){
           return $this->fkUser;
       }
       function GetNivel(){
           //conexino
           $conex = $this->datos->conexion();
           //consulta 
           $sql = "SELECT usuario.Nivel,`niveles-usuario`.Nivel FROM `usuario` 
           INNER JOIN `niveles-usuario` on usuario.Nivel = `niveles-usuario`.ID
           WHERE usuario.ID = $this->fkUser";
            //Preparacion 
            $consulta = $conex->prepare($sql);
            $consulta->execute();
            $registro = $consulta->fetch(PDO::FETCH_ASSOC);
            return $registro['Nivel'];
       }
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
                    '$this->cedula',$this->salario,'$this->direccion','$this->horaEntrada',
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