<?php
require ("Conexion.php");
$conex = conexion();
//metodo POST
$Nombre = $_POST['Nombre'];
$Apellidos = $_POST['Apellidos'];
$Direccion = $_POST['Direccion'];

//var_dump ($Nombre);
//var_dump ($Apellidos);
//var_dump ($Direccion);

if(!$Nombre or !$Apellidos or !$Direccion ){
    echo '<script> alert ("No tienes todos los campos llenos");
    window.history.go(-1); </script>';
    die();  
}

//insercion de datos SQL
$consulta_insert = 'INSERT INTO personas (Nombre,Apellidos,Direccion) VALUES (?,?,?)';
$Preparar = $conex->prepare($consulta_insert);
$Preparar -> execute (array($Nombre,$Apellidos,$Direccion));

header ('location: index.php');


