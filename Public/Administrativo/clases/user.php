<?php
    //importando datos
    require('../../../setup/datosConexion.php');

    //prueba
   /* $user = new usuario("Anderr09","Anderson25");
    $user->Comprobar();
    $user->insertar(1);*/
    class usuario{
        //funcion constructora
        function __construct($nombreUser,$pass)
        {
            $this->nombre = $nombreUser;
            $this->pass = $pass;
            $this->datos = new conexion();
        }
        //acceso a datos
        private $nombre;
        private $pass;
        //esta variable nos indicara si este usuario existe
        private $disponible;

        //funcion para comprobar si el usuario existe
        function Comprobar(){
        $conex = $this->datos->conexion();
        $sql = ("SELECT * FROM usuario WHERE nombreUsuario = '$this->nombre'");
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
        //funcion para insertar un usuario depende del nivel que vayamos a ingresar
        // Nivel 1 cliente, Nivel 2 Empleado, Nivel 3 Admin
        //Despues añadiremos a profundidad bien los niveles de usuarios mientras esto es lo basico
        function insertar($nivelUser){
            //
            if($this->Comprobar()==false){
                //creando un objeto de conexion
                if($nivelUser <= 3){
                    $conex = $this->datos->conexion();
                    //String de la consulta SQL
                    $sql = "INSERT INTO USUARIO VALUES(NULL,
                            '$this->nombre','$this->pass','$nivelUser')";
                    //preparacion y ejecucion de la consulta
                    try{
                    $registro = $conex->prepare($sql);
                    $registro->execute();
                    //en caso de insertarse correctamente se devolvera un valor verdadero
                    if($registro){
                        return true;
                    }else{
                        return false;
                    }
                    }catch(PDOException $e){
                        print($e->getMessage());
                    }
                }else{
                    //aqui inmediatamente devolvera un false ya que el nivel introducido no esta contemplado
                    return false;
                }
            }
        }
    }
?>