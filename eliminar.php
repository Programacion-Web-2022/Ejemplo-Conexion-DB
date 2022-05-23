<?php 
    require "config.php";
    
    if (!isset($_GET['id']) && $_GET['id'] == ""){
        error_log("Intento de eliminacion sin ID");
        header('HTTP/1.0 404 Not Found');
        echo "404 Not found ";
        die();
    }

    $conexion = new mysqli(DB_IP,DB_USER,DB_PASSWORD,DB_NAME);
    
    $sentencia = "DELETE FROM personita WHERE id = " . $_GET['id'];

    if($conexion->query($sentencia) === TRUE)
        header("Location: /index.php?eliminado=true");
