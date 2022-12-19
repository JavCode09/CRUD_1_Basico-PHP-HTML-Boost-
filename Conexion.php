<?php

//conexion  a la BD con  mysqli_connect y mysqli_select_bd();
function conexion (){

    $link = 'localhost';
    $usuario = 'root';
    $clave = '';
    $BD = 'Proyecto2_MVC';

    try{
    $pdo = mysqli_connect($link,$usuario,$clave);
    mysqli_select_db($pdo,$BD);

    // echo 'Conexion exitosa';
    return $pdo;
    
    }catch (PDOException $e){
        print "¡Error de conexion :(! ". $e->getMessage(). "<br/>";
        die();
    }
}