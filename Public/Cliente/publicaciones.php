<?php  session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../CSS/styles.css">
</head>
<body>
    <?php require("../../setup/datosConexion.php"); ?>
    <?php 
         $id_user = '';
         if (!empty($id_user)){
     
             $id_user = $_SESSION['estado'];   
         }
          if(isset($id_user)){ 
              include("../../includes/headerR.php");
        }else{
            include("../../includes/header-NR.php");

    }
    $conexion = new Conexion();
    $conex = $conexion->conexion();
    
    
    $sentenciaSQL= $conex->prepare("SELECT * FROM publicar");
            $sentenciaSQL->execute();
            $lista=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

            $sentenciaSQL= $conex->prepare("SELECT * FROM ulogin");
            $sentenciaSQL->execute();
            $usuario=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
            
            
            
    ?>

<!-- HEADER -->

        <?php 
        $sentenciaSQL= $conex->prepare("SELECT * FROM ulogin WHERE id = 2");
        $sentenciaSQL->execute();
        $usuario=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <!-- CONTENIDO -->
        
            <a href="../index/index.php"><h2>Volver</h2></a>
        
            <h3>Publicaciones de: <?php echo $usuario['usuario'] ?></h3>
        

    <div id="contenedor-publicaciones" class="inline-block">
        <div>
            <p>Titulo</p>
            <img src="../../imagenes\formularios\Producto\InsertarProd\sin-foto-ni-icono-de-imagen-en-blanco-cargar-imágenes-o-falta-marca-no-disponible-próxima-señal-silueta-naturaleza-simple-marco-215973362.jpg" alt="" width="400">
        </div>
        <div class="info-publicacion">
            <p>Informacion del producto</p>
            <ul>
                <li><b>Categoria</b> <div>asd</div></li>
                <li><b>Precio</b> <div>asd2</div></li>
                <li><b>Estado</b> <div>asd3</div></li>
                <li><b>Descripcion</b> <div>asd4</div></li>
            </ul>
        </div>
    </div>    

</body>
</html>