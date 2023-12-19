<?php

$usuario = $_POST ["usuario"];

$contrasena = $_POST["contrasena"];

session_start();
$_SESSION["usuario"]=$usuario;

$checkU = "admin";
$checkC = 1234;

if ($usuario == $checkU && $contrasena == $checkC) {
    header("location: ../potreroDigital\Public\Views\listar.php");
}
else{
    header("location:../potreroDigital/login.php");
}




?>