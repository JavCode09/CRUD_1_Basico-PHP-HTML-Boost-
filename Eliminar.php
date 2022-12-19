<?php

require ("Conexion.php");
$conex = conexion(); 

if ($_GET){
    $id = $_GET['id'];
    $consulta_delete = "DELETE FROM personas where IDpersonas = '$id'";
    $query3 = mysqli_query($conex,$consulta_delete);
    header ('location: index.php');
}

