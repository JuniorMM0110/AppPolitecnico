        <!-- LINEA 1 -->
<?php
require("../../setup/datosConexion.php");

$conexion = new Conexion();
$conex = $conexion->conexion();

        
        $sentenciaSQL= $conex->prepare("SELECT * FROM publicar WHERE id >0 and id< 6");
        $sentenciaSQL->execute();
        $lista=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

        $sentenciaSQL= $conex->prepare("SELECT * FROM publicar WHERE id >5 and id<11 ");
        $sentenciaSQL->execute();
        $lista2=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

        $sentenciaSQL= $conex->prepare("SELECT * FROM publicar WHERE id >10 and id<16 ");
        $sentenciaSQL->execute();
        $lista3=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

        $sentenciaSQL= $conex->prepare("SELECT * FROM publicar WHERE id >15 and id<21 ");
        $sentenciaSQL->execute();
        $lista4=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

        

?>
<?php foreach($lista as $info){  ?>
        <div class="pContenido">
            <div class="contenidoInfo">
                    <a href="../../Public/cliente/publicaciones.php"><img src="../../imagenes\formularios\Producto\InsertarProd\sin-foto-ni-icono-de-imagen-en-blanco-cargar-imágenes-o-falta-marca-no-disponible-próxima-señal-silueta-naturaleza-simple-marco-215973362.jpg" alt="" width="150"></a>
                    <h3><?php echo $info['titulo'] ?></h3>
                    <p><?php if($info['descripcion']== ""){echo "No hay descripcion";}else{echo $info['descripcion'];}?></p>
                    </div>
</div>

        <?php  } ?>
<?php foreach($lista2 as $info){  ?>
        <div class="pContenido">
            <div class="contenidoInfo">
                    <a href="../../Public/cliente/publicaciones.php"><img src="../../imagenes\formularios\Producto\InsertarProd\sin-foto-ni-icono-de-imagen-en-blanco-cargar-imágenes-o-falta-marca-no-disponible-próxima-señal-silueta-naturaleza-simple-marco-215973362.jpg" alt="" width="150"></a>
                    <h3><?php echo $info['titulo'] ?></h3>
                    <p><?php if($info['descripcion']== ""){echo "No hay descripcion";}else{echo $info['descripcion'];}?></p>
                    </div>
</div>

        <?php  } ?>
<?php foreach($lista3 as $info){  ?>
        <div class="pContenido">
            <div class="contenidoInfo">
                    <a href="../../Public/cliente/publicaciones.php"><img src="../../imagenes\formularios\Producto\InsertarProd\sin-foto-ni-icono-de-imagen-en-blanco-cargar-imágenes-o-falta-marca-no-disponible-próxima-señal-silueta-naturaleza-simple-marco-215973362.jpg" alt="" width="150"></a>
                    <h3><?php echo $info['titulo'] ?></h3>
                    <p><?php if($info['descripcion']== ""){echo "No hay descripcion";}else{echo $info['descripcion'];}?></p>
                    </div>
</div>

        <?php  } ?>
<?php foreach($lista4 as $info){  ?>
        <div class="pContenido">
            <div class="contenidoInfo">
                    <a href="../../Public/cliente/publicaciones.php"><img src="../../imagenes\formularios\Producto\InsertarProd\sin-foto-ni-icono-de-imagen-en-blanco-cargar-imágenes-o-falta-marca-no-disponible-próxima-señal-silueta-naturaleza-simple-marco-215973362.jpg" alt="" width="150"></a>
                    <h3><?php echo $info['titulo'] ?></h3>
                    <p><?php if($info['descripcion']== ""){echo "No hay descripcion";}else{echo $info['descripcion'];}?></p>
                    </div>
</div>

        <?php  } ?>
