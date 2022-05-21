<?php 
    require "listaFormulario.php";
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

    <?php if($filas -> num_rows < 1) :?>
        No hay personas ingresadas <br />
    <?php else :?>
        <?php foreach($filas -> fetch_all(MYSQLI_ASSOC) as $fila) :?>
            ID: <?= $fila['id'] ?> 
            Nombre: <?= $fila['nombre'] ?> - 
            Apellido: <?= $fila['apellido'] ?> -
            Telefono: <?= $fila['telefono'] ?> -
            Email: <?= $fila['email'] ?>  
            <br />
        <?php endforeach ;?>
    <?php endif ;?>

    <br />
    
    <form action="/alta.php" method="post">
        ID: <input type="text" name="id"> <br />
        Nombre: <input type="text" name="nombre"> <br />
        Apellido: <input type="text" name="apellido"> <br />
        Telefono: <input type="number" name="telefono"> <br />
        Email: <input type="email" name="email"> <br />

        <input type="submit" value="Enviar">
    </form>


    <?php if(isset($_GET['exito']) && $_GET['exito'] == 'true') :?>
        <div style='color: green;'>Insertado correctamente</div>
    <?php endif; ?>

    
    <?php if(isset($_GET['exito']) && $_GET['exito'] == 'false') :?>
            echo "<div style='color: red;'>Hubo un error</div>";
    <?php endif; ?>
    
        
</body>
</html>