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
            <b>ID:</b> <?= $fila['id'] ?> 
            <b>Nombre:</b> <?= $fila['nombre'] ?> - 
            <b>Apellido:</b> <?= $fila['apellido'] ?> -
            <b>Telefono:</b> <?= $fila['telefono'] ?> -
            <b>Email:</b> <?= $fila['email'] ?>
            <b><a href="/eliminar.php?id=<?= $fila['id'] ?>">Eliminar </a></b>  
            <b><a href="/formularioModificar.php?id=<?= $fila['id'] ?>">Modificar </a></b>

            <br />
        <?php endforeach ;?>
    <?php endif ;?>

    <br />
    
    <form action="/alta.php" method="post">
        <b>ID:</b> <input type="text" name="id"> <br />
        <b>Nombre:</b> <input type="text" name="nombre"> <br />
        <b>Apellido:</b> <input type="text" name="apellido"> <br />
        <b>Telefono:</b> <input type="number" name="telefono"> <br />
        <b>Email:</b> <input type="email" name="email"> <br />

        <input type="submit" value="Enviar">
    </form>


    <?php if(isset($_GET['exito']) && $_GET['exito'] == 'true') :?>
        <div style='color: green;'>Insertado correctamente</div>
    <?php endif; ?>

    
    <?php if(isset($_GET['exito']) && $_GET['exito'] == 'false') :?>
        <div style='color: red;'>Hubo un error</div>
    <?php endif; ?>

    
    <?php if(isset($_GET['eliminado']) && $_GET['eliminado'] == 'true') :?>
        <div style='color: green;'>Personita eliminada</div>
    <?php endif; ?>
    
    <?php if(isset($_GET['modificado']) && $_GET['modificado'] == 'true') :?>
        <div style='color: green;'>Personita Modificada</div>
    <?php endif; ?>
    
        
</body>
</html>