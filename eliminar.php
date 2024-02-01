
<?php
try{
    
$id=$_GET['id'];
include"conexion1.php";

$sql="DELETE FROM tbl_users WHERE id = :id";
// $resultado=mysqli_quey($conexion,sql); se utiliza para enviar una consulta a la base de datos

// Se realiza el proceso utilizando PDO
$consulta = $conexion->prepare($sql); /* prepara la consulta con un objeto de conexion PDO */ 
$consulta->bindParam(':id',$id,PDO::PARAM_INT);
$consulta->execute(); /* se ejecuta la consulta con la funcion execute() */
// $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC); /* Se obtiene los resultados utilizando fetchAll */
// // El argumenteo PDO::FETCH_ASSOC indica que desea que las filas se devuelvan como un Array

if($consulta->rowCount() > 0){/*  rowCount verifica si las filas fueron afectadas en algun sistema de la base de datos */
    echo "<script languaje='JavaScript'>alert('Los datos se eliminaron correctamente de la BD'); location.assign('index.php'); </script>";
}else{
    echo "<script languaje='JavaScript'>alert(Los datos NO se eliminaron de la BD); location.assign('index.php');</script>";
}

}catch(PDOException $e){
    echo "Error: " .$e->getMessage();
}


?>