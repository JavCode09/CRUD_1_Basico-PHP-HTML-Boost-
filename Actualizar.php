<?php
    require ("Conexion.php");
    $conex = conexion();

    if($_POST){
        $IDpersona = $_POST['IDpersonas'];
        $Nombre_Actualizado = $_POST['Nombre_actualizado'];
        $Apellidos_Actualizado = $_POST['Apellidos_actualizado'];
        $Direccion_Actualizado = $_POST['Direccion_actualizado'];

        //echo $IDpersona;
        //echo $Nombre_Actualizado;
        //echo $Apellidos_Actualizado;
        if (!$IDpersona or !$Nombre_Actualizado or !$Apellidos_Actualizado or !$Direccion_Actualizado){
            echo '<script> alert ("Para actualizar llena los campos");
            window.history.go(-1); </script>';
        }

        $consult_update = "UPDATE personas SET Nombre= ?, Apellidos = ?, Direccion = ? WHERE IDpersonas = ? ";
        $preparando = $conex->prepare($consult_update);
        $preparando -> execute (array($Nombre_Actualizado,$Apellidos_Actualizado,$Direccion_Actualizado,$IDpersona));

        header ('location: index.php');
    }



