<?php 

    require "config.php";
    $conexion = new mysqli(DB_IP,DB_USER,DB_PASSWORD,DB_NAME);
    $sentencia = "SELECT * FROM personita WHERE id = " . $_GET['id'];

    $filas = $conexion->query($sentencia);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <br />
    <?php foreach($filas -> fetch_all(MYSQLI_ASSOC) as $fila) :?>
        <form action="/modificar.php" method="post">
            ID: <input type="text" name="id" value="<?= $fila['id'] ?>" readonly> <br />
            Nombre: <input type="text" name="nombre" value="<?= $fila['nombre'] ?>"> <br />
            Apellido: <input type="text" name="apellido" value="<?= $fila['apellido'] ?>"> <br />
            Telefono: <input type="number" name="telefono" value="<?= $fila['telefono'] ?>"> <br />
            Email: <input type="email" name="email" value="<?= $fila['email'] ?>"> <br />

            <input type="submit" value="Enviar">
        </form>    
    <?php endforeach; ?>
        
</body>
</html>