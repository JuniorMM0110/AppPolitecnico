<?php
    //importando datos
    
    require("correo.php");
    require("user.php");
   // require('../../../setup/datosConexion.php');
    //funciones relacionadas a la clase

    //funcion para generar un producto a base de un id
    function IngresarProducto($id){
        $conex = new Conexion();
        $cn = $conex->conexion();
        //consulta
        $sql = "SELECT * FROM PRODUCTO 
        WHERE producto.Serial = $id";
        //
        $query = $cn->prepare($sql);
        $query->execute();
        $registro = $query->fetch(PDO::FETCH_ASSOC);
        //producto
        $producto = new Producto($registro['Nombre'],$registro['fechaIngreso'],
        $registro['Precio'],$registro['CantidadDISP'],$registro['Descuento']);
        $producto->SetId($id);
        return $producto;
    }
    //funcion eliminar productos
    function EliminarProducto($id){
        //conexion 
        $conex = new Conexion();
        $cn = $conex->conexion();
        //sql
        $sql = "DELETE FROM producto where 'Serial' = $id";
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
    
    //clase producto
    class Producto{
        function __construct($nombre,$fechaIngreso,
        $Precio,$CantidadDISP,$Descuento)
        {
            $this->nombre = $nombre;
            $this->fechaIngreso = $fechaIngreso;
            $this->precio = $Precio;
            $this->CantidadDISP = $CantidadDISP;
            $this->Descuento = $Descuento;
            $this->datos = new Conexion();
            $this->fkUser=$this->datos->GetId("usuario","nombreUsuario",$this->objUser->GetUser());
            $this->fkCorreo = $this->datos->GetId("correo","correo",$this->objCorreo->GetCorreo());
            $this->salario = $salario;
        }
        //
        private $id;
        private $nombre; 
        private $fechaIngreso;
        private $Precio;
        private $CantidadDISP;
        private $Descuento;   
       // private 
       //Getters y Setters
       //funciones Descuento
       function GetDescuento(){
           return $this->Descuento;
       }
       //funciones horaSalidda
       function GetCantidadDISP(){
           return $this->CantidadDISP;
       }
       //funciones Precio
       function GetPrecio(){
           return $this->Precio;
       }
       //funciones FechaIngreso
       function GetFecha(){
           return $this->fechaIngreso;
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
           return $this->nombre;
       }
        //funcion insertar producto
        function InsertarProducto(){
            //conexion      
            $conex = $this->datos->conexion();
            //comporbar si existe el mismo numero de cedula en la BD
            if($this->datos->ComprobarDato("producto","cedula",$this->cedula) != false){
                return false;
            }else{
                //consulta sql
                $sql = "INSERT INTO producto VALUES(
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