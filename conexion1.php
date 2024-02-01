<?php

$host = "localhost";
$dbname = "bd_usuarios";
$user ="root";
$pass = "";

try{
    $dsn="mysql:host=$host;dbname=$dbname;charset=utf8";

    $conexion = new PDO($dsn,$user,$pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo"conexion exitosa";

    // Realizar operaciones con la base de datos

} catch(PDOEXCEPTION $e){
 echo "".$e->getMessage()."";
    die("Hubo un error de conexión. Por favor, inténtalo de nuevo más tarde" .$e->getMessage());
   
}


?>