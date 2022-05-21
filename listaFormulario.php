<?php 
    require "config.php";
    $conexion = new mysqli(DB_IP,DB_USER,DB_PASSWORD,DB_NAME);
    $sentencia = "SELECT * FROM personita";

    $filas = $conexion->query($sentencia);
