<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar</title>
    <link rel="stylesheet" href="./CSS/form.css">
</head>

<body>
    <?php

    // En esta linea virifica si el formulario fue enviado - pulsado el boton
    if (isset($_POST['enviar'])) {
        // obtiene los datos del formulario y se le asignan a las varibles
        $nombre = $_POST['Nombre'];
        $email = $_POST['Email'];
        $nacionalidad = $_POST['Nacionalidad'];

        // Archivo conexion a BD
        include "conexion1.php";

        // Crear una consulta INSERT con marcadores de posición
        $sql = "INSERT INTO tbl_users (Nombre,Email,Nacionalidad)VALUES( :nombre, :email, :nacionalidad)";

        // Prepara la consulta con la conexion establecida
        $resultado = $conexion->prepare($sql);

        // $id= uniqid();
        // $resultado->bindParam(':id',$id,PDO::PARAM_INT);
        // vincular parametros de la consulta a la variable
        $resultado->bindParam(':nombre', $nombre, PDO::PARAM_STR, 25);
        $resultado->bindParam(':email', $email, PDO::PARAM_STR, 25);
        $resultado->bindParam(':nacionalidad', $nacionalidad, PDO::PARAM_STR, 25);


        // se agrega codigo js para imprimir mensaje
        if ($resultado->execute()) {
            echo "<script language='JavaScript'>
       alert('Los datos fueron ingresados correctamente a la BD');
       location.assign('index.php');
       </script>";
        } else {
            echo "<script language='JavaScript'>
            alert('Error al ingresar los datos a BD');
            location.assign('index.php');
            </script>";
        }


    }
    // Cierra el if de isset
    ?>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <h1> Agregar Nuevo Alumno</h1>
        <div class="input-group">
            <!-- <label for="id"> ID: </label>
    <input type="text" name ="id" placeholder="Ingresa el ID"><br> -->
            <label for="nombre">Nombre : </label>
            <input type="text" class="field " name="Nombre" placeholder="Ingresa tu nombre"> <br>
            <label for="email">Email: </label>
            <input type="email" class="field " name="Email" placeholder="Ejemplo@gmail.com"> <br>

            <label for="nacionalidad">Nacionalidad:</label>
            <select name="Nacionalidad" class=" select field"  value="<?php echo $nacionalidad; ?>">
                <option selected value="">Selecciona una opción</option>
                <option value="Colombia">Colombia</option>
                <option value="Mexico">México</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Panama">Panamá</option>
                <option value="Brasil">Brasil</option>

            </select>




        </div>
        <div class="enlace-form">
            <input class="btn" type="submit" name="enviar" value="Agregar">
            <a class="btn" href="index.php">Regresar</a>

        </div>

    </form>

</body>

</html>