        <!-- LINEA 1 -->
<?php
require("../../setup/datosConexion.php");

$conexion = new Conexion();
$conex = $conexion->conexion();

        
        $sentenciaSQL= $conex->prepare("SELECT * FROM publicar LIMIT 5");
        $sentenciaSQL->execute();
        $lista=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

        

?>
<?php foreach($lista as $info){  ?>
        <div class="pContenido">
            <div class="contenidoInfo">
                <img src="../../imagenes\formularios\Producto\InsertarProd\sin-foto-ni-icono-de-imagen-en-blanco-cargar-imágenes-o-falta-marca-no-disponible-próxima-señal-silueta-naturaleza-simple-marco-215973362.jpg" alt="" width="150">
                <h3><?php echo $info['titulo'] ?></h3>
                <p><?php echo $info['descripcion'] ?></p>
            </div>

        <?php  } ?>
