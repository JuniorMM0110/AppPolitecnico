<?php
    session_start();
    if(isset($_SESSION['productoTemp'])){
        unset($_SESSION['ProductoTemp']);
        session_destroy();
        header("location:insProducto.php");
    }
?>