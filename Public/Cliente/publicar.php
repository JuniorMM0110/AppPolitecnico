<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/styles.css">
    <title>Document</title>
</head>
<body>
<?php 
         
          if(isset($_SESSION['estado'])){ 
              include("../../includes/headerR.php");
        }else{
            include("../../includes/header-NR.php");

    }

        ?>
    <form action="../../app/publicar.php" method="post">
        <div>
            <input type="Hidden" name="id">
        </div>

    <div >
        Estado:<br>

    <input type="radio" name="estado" value="Nuevo"> Nuevo

    <input type="radio" name="estado" value="Reparado"> Reparado

    <input type="radio" name="estado" value="Usado"> Usado

    </p>   
 </div>


        
        <div>
            <label for="">Titulo</label>
            <input type="text" name="titulo">
        </div>
        <div>
            <label for="">Precio</label>
            <input type="text" name="precio">
        </div>
        <div>
            <label for="">Descripcion</label>
            <input type="text" name="desc">
        </div>
        <button>enviar</button>
    </form>
</body>
</html>