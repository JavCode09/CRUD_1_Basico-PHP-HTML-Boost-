<?php
//hacemos que aparescan todos los datosd de la BD
    include ('Conexion.php');
    $conex = conexion();
    mysqli_set_charset($conex, "utf8");
    $consulta = 'SELECT * FROM personas';
    $query = mysqli_query($conex, $consulta);


//Poner informaciond en el formulario con get =id
    if($_GET){
        $id = $_GET['IDpersonas'];
        $consulta_id = "SELECT * FROM personas WHERE IDpersonas = '$id'";
        $query2 = mysqli_query($conex,$consulta_id);
        $datos = mysqli_fetch_array($query2);
        //var_dump ($row);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS>-->
    <link rel="stylesheet" href="css/diseño.css?u">
    <!--Boostrap-->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <title>Document</title>
</head>
    <body>
        <div class="container">
            <div class="letrero">
                <h3>CRUD created Read Update Delete</h3>
                <h4>Creador: Piña Lopez Javier</h4>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-5">   
                    <?php if(!$_GET)  :?>           
                    <form action="Insert.php" method = "POST">
                        <div class="w-100">
                            <div class="mb-2 w-50">
                                <label for="Nombre" class="form-label">Nombre: </label><br>
                                <input type="text" class="form-control" placeholder="Nombre" name="Nombre">
                            </div>
                            
                            <div class="mb-2 w-50">
                                <label for="Apellidos" class="form-label">Apellidos: </label><br>
                                <input type="text" class="form-control" placeholder="Apellidos" name="Apellidos">
                            </div>
                            
                            <div class="mb-2 w-50">
                                <label for="Direccion" class="form-label">Direccions: </label><br>
                                <input type="text" class="form-control" placeholder="Direccion" name="Direccion">
                            </div>
                            <br>
                            <input type="submit" value="Insertar" class="btn btn-primary"><br>
                        </div>
                    </form>            
                    <?php endif?>   

                    <?php if($_GET)  :?>           
                    <form action="Actualizar.php" method = "POST">
                        <div class="w-100">
                        <div class="mb-2 w-50">
                                <label for="IDpersona" class="form-label">ID Persona: </label><br>
                                <input type="text" class="form-control" name="IDpersonas" value="<?php echo $datos['IDpersonas'] ?>" readonly>
                            </div>
                        
                            <div class="mb-2 w-50">
                                <label for="Nombre" class="form-label">Nombre: </label><br>
                                <input type="text" class="form-control" name="Nombre_actualizado" value="<?php echo $datos['Nombre'] ?>">
                            </div>
                            
                            <div class="mb-2 w-50">
                                <label for="Apellidos" class="form-label">Apellidos: </label><br>
                                <input type="text" class="form-control"  name="Apellidos_actualizado" value="<?php echo $datos['Apellidos'] ?>">
                            </div>
                            
                            <div class="mb-2 w-50">
                                <label for="Direccion" class="form-label">Direccions: </label><br>
                                <input type="text" class="form-control"  name="Direccion_actualizado" value="<?php echo $datos['Direccion'] ?>">
                            </div>
                            <br>
                            <input type="submit" value="Actualizar" class="btn btn-danger"><br>
                        </div>
                    </form>          
                      
                    <?php endif?>  
                </div>
                
                <div class="col-md-6">
                    <table class ="table table-dark table-striped table-hover table-bordered table-sm">
                        <thead>
                                <tr class="text-center">
                                    <th scope ="col" class="">IDpersonas</th>
                                    <th scope ="col">Nombre</th>
                                    <th scope ="col">Apellidos</th>
                                    <th scope ="col">Dirrecion</th>
                                    <th scope ="col">Opciones</th>
                                </tr>
                        </thead>  
                        
                        <tbody>
                            <!--Sentencia para que se vea la infromacion actualizada-->
                            <?php
                                while($row=mysqli_fetch_array($query)){
                            ?>        
                                    <tr class="text-center">
                                        <th class="table-primary"><?php echo $row['IDpersonas'] ?></th>
                                        <th class="table-primary"><?php echo $row['Nombre'] ?></th>
                                        <th class="table-primary"><?php echo $row['Apellidos'] ?></th>
                                        <th class="table-primary"><?php echo $row['Direccion'] ?></th>
                                        <th class="table-primary ">
                                            <a href="index.php?IDpersonas=<?php echo $row['IDpersonas']; ?>" class="btn btn-primary Editar">Editar</a>
                                            <a href="Eliminar.php?id=<?php echo $row['IDpersonas']; ?>" class="btn btn-danger">Eliminar</a>
                                        </th>
                                    </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--Js Bootstrap-->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>