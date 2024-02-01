<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/estilos.css">
    <title>Lista de personas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- etiqueta para incluir boostrap al proyecto  -->


    <script src="https://kit.fontawesome.com/d4fa767692.js" crossorigin="anonymous"></script>

    <!-- etiqueta para agregar los iconos desde fontawesome -->
</head>


<body>
    <script>
        function eliminar() {
            var respuesta = confirm("¿Estas seguro que deseas eliminar?");

            return respuesta
        }

    </script>
    <?php
    include "conexion1.php";
    // include "eliminar.php";
    // variable para realizar consulta
    $sql = "SELECT * FROM tbl_users";
    // Ejecutar la consulta 
    $resultado = $conexion->query($sql);

    // //     $numero = mysqli_num_rows($busqueda);
    // <!-- // <h5 class="titulo">Resultados</h5> -->
    

    if ($resultado) {
        // $resultado->execute();
    
        ?>
        <header class="encabezado">
            <h1 class="titulo">Datos Agregados </h1>
        </header>

        <button class="agregar ms-5"> <a href="agregar.php"> <i class="fa-solid fa-user-plus"></i> Agregar</a>
        </button>

        <table class="rounded-start-2">

            <thead> <!-- parte superior de la tabla -->
                <tr> <!-- insertar fila  -->
                    <th> USER ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Nacionalidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- cuerpo de la tabla -->
                <!-- Procesar el resulado -->
                <?php
                // consulta BD
                while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <!-- acceder valores de la columna  -->
                    <tr>
                        <td>
                            <?php echo $fila['id'] ?>
                        </td>
                        <td>
                            <?php echo $fila['Nombre'] ?>
                        </td>
                        <td>
                            <?php echo $fila['Email'] ?>
                        </td>
                        <td>
                            <?php echo $fila['Nacionalidad'] ?>
                        </td>
                        <td class="acciones">
                            <!-- al darle click en este link, se recupera el id de la varible $filas -->
                            <?php echo "<a  href='editar.php?id=" . $fila['id'] . "' class='btn btn-outline-primary'> <i
                                class='fa-solid fa-pen-to-square'></i></a>" ?>
                            <!-- se crea un evento onclick para la funcion de js -->
                            <?php echo "<a onclick='return eliminar()' href='eliminar.php?id=" . $fila['id'] . "' 
                            class='btn btn-outline-light'><i
                                class='fa-solid fa-trash-can'></i></a>" ?>

                        </td>

                    </tr>

                    <?php
                }

                ?>

            </tbody>

            <tfoot> <!-- pie de la tabla -->
                <tr>
                    <td colspan="5"> <!-- Cantidad de coloumnas que utiliza -->
                        <?php $numero = $resultado->rowCount(); ?>
                        <h3>Total de usuarios:
                            <?php echo $numero; ?>
                        </h3>
                    </td>
                </tr>
            </tfoot>
        </table>
        <?php
        // Liberar el resultado
        $resultado->closeCursor();
    } else {
        // Manejar el error
        echo "Erro en la consulta:" . $conexion->errorInfo()[2];
        // $codigoDeError = $errores[0];
        // $codigoDelControlador = $errores[1];
        // $mensajeDeError = $errores[2];
    }

    // Cerrar la conexion
    
    $conexion = null;

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

<!-- resetear los id  -->
<!-- 
SET @autoid :=0;
update nombre_de_tu_tabla set id= @autoid := (@autoid+1);
alter table nombre_de_tu_tabla AUTO_increment = 1; -->

</html>