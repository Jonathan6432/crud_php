<?php
function conectar()
{
    $host = "localhost";
    $dbname = "crud_test_bro_db";
    $user = "root";
    $pass = "";

    $conexion = new mysqli($host, $user, $pass, $dbname);

    if ($conexion->connect_error) {
        //   die("Error de conexion:" . $conexion->connect_error);
        return "No conectado";
    } else {
        return "Conectado";
    }
    // return $conexion;


}


?>