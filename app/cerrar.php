<?php
session_start();
unset($_SESSION['estado']);

if(!isset($_SESSION['estado'])){
    Header("location:../public/index/index.php");

}