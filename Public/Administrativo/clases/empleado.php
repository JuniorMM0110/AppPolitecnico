<?php
    //importando datos
    require('../../../setup/datosConexion.php');
    //clase empleado
    class empleado{
        function __construct($id,$nombre,$apellido,
        $cedula,$direccion,$horaEntrada,$horaSalida,$objUser,$objCorreo)
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->cedula = $cedula;
            $this->direccion = $direccion;
            $this->horaEntrada = $horaEntrada;
            $this->horaSalida = $horaSalida;
            $this->objUser = $objUser;
            $this->objCorreo = $objCorreo;
            $this-> conex = new Conexion();
        }
        //
        private $nombre; 
        private $apellido;
        private $cedula;
        private $direccion;
        private $horaEntrada;
        private $horaSalida;
        private $objUser;
        private $objCorreo;
        //id
        private $fkCorreo = $this->conex->GetId("correo","correo",$this->objCorreo->GetCorreo());
        private $fkUser = $ObjUser->GetId("usuario","nombreUsuario",$this->objUser->GetUser());
        //funcion insertar empleado
        function InsertarEmpleado(){
            //conexion
            $this->conex->conexion();
            //comporbar si existe el mismo numero de cedula en la BD
            if($this->conex->ComprobarDato("empleado","cedula",$this->cedula) == false){
                return false;
            }else{
                //consulta sql
                $sql = "INSERT INTO empleado VALUES(
                    null,'$this->nombre','$this->apellido',
                    '$this->cedula','$this->direccion','$this->horaEntrada',
                    '$this->horaSalida','$this->fkCorreo','$this->fkUser'
                )";
                //PDO
                $consulta = $this->conex->prepare($sql);
                try{
                    $consulta->execute();
                }catch(PDOException $e){
                    print($e->getMessage());
                }
                //comprobar si se ejecuto la consulta
                if($consulta){
                    return true;
                }else{
                    return false;
                }
            }
        }
    }
?>