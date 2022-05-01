<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <?php
        require("../../../../setup/datosConexion.php");
        require("../../clases/producto.php");
        //
        if(isset($_POST['enviar'])){
            $nombreImg = $_FILES['imagen']['name'];
            $typeImg = $_FILES['imagen']['type'];
            $pesoImg = $_FILES['imagen']['size'];
            //condicionales
            if($pesoImg <=10000000){
                //-------
                if($typeImg =="image/jpg" || $typeImg =="image/png" || $typeImg =="image/jpeg"){
                    //directorio img
                    $destino =$_SERVER['DOCUMENT_ROOT']."/AppPolitecnico/AppPolitecnico/imagenes/productos/";
                    //movemos lo temporal a una carpeta
                    move_uploaded_file($_FILES['imagen']['tmp_name'],$destino.$nombreImg);
                    //sesion
                    session_start();
                    $producto = $_SESSION['productoTemp'];
                    $producto->SetFoto($destino.$nombreImg);
                    $producto->InsertarProducto();
                }else{
                    ?>
                    <div class="msj-error">
                        <p>Solo se permiten formatos PNG,JPG,JPEG.</p>
                    </div>
                    <?php
                }
            }else{
                ?><div class="msj-error">
                    <p>Muy pesado, por favor comprima esta imagen.</p>
                </div>
                <?php
            }
        }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div>
        <label for="imagen">Subir imagen</label>
        <input type="file" name="imagen">
        <input type="submit" value="Enviar imagen" name="enviar">
    </div>
    </form>
</body>
</html>