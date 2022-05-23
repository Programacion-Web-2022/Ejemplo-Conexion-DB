<?php 
    require "config.php";

    if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
        error_log("Intento no permitodo a la URL");
        header('HTTP/1.0 404 Not Found');
        echo "404 Not found ";
        die();
    }

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    $conexion = new mysqli(DB_IP,DB_USER,DB_PASSWORD,DB_NAME);
    
    $sentencia = "UPDATE personita SET
        nombre = '$nombre',
        apellido = '$apellido',
        telefono = $telefono,
        email = '$email'
        ";

    if($conexion->query($sentencia) === TRUE) 
        header("Location: /index.php?modificado=true");
    