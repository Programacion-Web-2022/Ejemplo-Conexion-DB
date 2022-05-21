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
    
    if($id != "")
        $sentencia = "INSERT INTO personita VALUES (
            $id, '$nombre', '$apellido', $telefono, '$email'
            )";
    else 
        $sentencia = "INSERT INTO personita(nombre,apellido,telefono,email) VALUES (
            '$nombre', '$apellido', $telefono, '$email'
            )";   

    if($conexion->query($sentencia) === TRUE) 
            header("Location: /index.php?exito=true");
    else 
            header("Location: /index.php?exito=false");