<?php session_start();
error_reporting(0);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="../../CSS/styles.css">

    <title>Document</title>
</head>
<body>

    <?php 
     if($_SESSION['iniciado'] == true){ 
        include("../../includes/headerR.php");
    }else{
        include("../../includes/header-NR.php");

    }
        ?>

        
    
</body>
</html>