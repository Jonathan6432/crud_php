<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR</title>
    <link rel="stylesheet" href="./CSS/form.css">
</head>

<body>
    <?php
    include "conexion1.php";

    if (isset($_POST['enviar'])) {
        // Aquí entra si se presiona el botón de actualizar 
    
        // procesa los datos del formulario y se recuperan con el metodo post
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $nacionalidad = $_POST['nacionalidad'];

        // Preparar la consulta SQL para actualizar los datos
        $sql = "UPDATE tbl_users SET Nombre = :nombre, Email = :email, Nacionalidad = :nacionalidad WHERE id = :id";
        $resultado = $conexion->prepare($sql);

        // bindparam es un metodo -> vincular los parametros a marcadores de posiciòn en una consulta preparada
    
        // Declaracion
        $resultado->bindParam(':id', $id, PDO::PARAM_INT);
        $resultado->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $resultado->bindParam(':email', $email, PDO::PARAM_STR);
        $resultado->bindParam(':nacionalidad', $nacionalidad, PDO::PARAM_STR);

        // Ejecutar la consulta SQL preparada con PDO 
        $resultado->execute();

        if ($resultado) {
            echo "<script language='JavaScript'>
        alert('Registro actualizado correctamente');
        location.assign('index.php');
        </script>";
        } else {
            echo "<script language='JavaScript'> alert('Los datos no se actualizaron'); location.assign('index.php'); </script>";
        }


    } else {
        // Aquí entra si no se ha presionado el boton enviar 
        $id = $_GET["id"];   // recupera el id del index
        $sql = "SELECT * from tbl_users where id = :id";   // mandar a traer el registro del id selaccinado
        $resultado = $conexion->prepare($sql);
        $resultado->bindParam(':id', $id, PDO::PARAM_INT);
        $resultado->execute();

        $fila = $resultado->fetch(PDO::FETCH_ASSOC);

        $nombre = $fila["Nombre"];
        $email = $fila["Email"];
        $nacionalidad = $fila["Nacionalidad"];
    }
    ?>


    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>"> <!-- enviar datos a la misma pagina -->

        <h1>Editar informaciòn</h1>
        <div class="input-group">
            <input type="hidden" class="field" name="id" value="<?php echo $id; ?>">
            <!-- //Modificamos el input para que muestre la varible $id - con el valor hidden lo ocultamos  -->

            <label for="nombre">Nombre:</label>
            <input type="text" class="field " name="nombre" value="<?php echo $nombre; ?>"><br>

            <label for="email">Email:</label>
            <input type="text" class="field" name="email" value="<?php echo $email; ?>"><br>

            <label for="nacionalidad">Nacionalidad:</label>

            <select name="nacionalidad" class="select field" value="<?php echo $nacionalidad; ?>"> <!-- Se agrega las dos claes para que el focus se aplique -->

                < <option selected value="">Selecciona una opción</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Mexico">México</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Panama">Panamá</option>
                    <option value="Brasil">Brasil</option>
            </select>

        </div>

        <div class="enlace-form">
            <input class="btn" type="submit" name="enviar" value="Actualizar">
            <a class="btn" href="index.php">Regresar</a>
        </div>

    </form>
</body>