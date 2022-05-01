<?php
    //importando datos
    function GenerarProducto($id){
        $conex = new Conexion();
        $cn = $conex->conexion();
        //
        $sql = "SELECT * FROM producto WHERE id = $id";
        $consulta = $cn->prepare($sql);
        $consulta->execute();
        $registro = $consulta->fetch(PDO::FETCH_ASSOC);
        $prod = new Producto($registro['Nombre'],$registro['Disponible'],
        $registro['Precio']);
        $prod->SetId($id);
        return $prod;
    }
    class Producto{
        function __construct($nombre,$disponibles,$precio)
        {
            $this->nombre = $nombre;
          //  $this->fechaI = $fechaI;
            $this->disponibles = $disponibles;
            $this->precio = $precio;
        }
        private $id;
        private $nombre;
    //    private $fechaI;
        private $disponibles;
        private $precio;
        //funciones precio
        function GetPrecio(){
            return $this->precio;
        }
        //funciones nombre
        function GetNombre(){
            return $this->nombre;
        }
        //function id
        function SetId($id){
            $this->id = $id;
        }
        function GetId(){
            return $this->id;
        }
        //comprobar si el producto existe
        function comprobarProd(){
            $conex = new Conexion();
            $cn = $conex->conexion();
            $sql = "SELECT * FROM producto where Nombre = '$this->nombre
            '";
            //preparacion
            $consulta = $cn->prepare($sql);
            $consulta->execute();
            $cn = null;
            if($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
                return true;
            }else{
                return false;
            }
        }
        //insertar prod
        function InsertarProducto(){
            $conex = new Conexion();
            $cn = $conex->conexion();
            $fecha = date("d m Y");
            // consulta
            $sql = "INSERT INTO producto VALUES(null,'$this->nombre',
            '$fecha',$this->precio,'$this->disponibles', 0)";
            $consulta = $cn->prepare($sql);
            try{
                $consulta->execute();
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }
    }
?>