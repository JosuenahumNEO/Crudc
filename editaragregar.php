<!DOCTYPE html>

<?php

$conexion = mysqli_connect("localhost", "root", "", "peso1");
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar info</title>
</head>

<body>
    <?php

    include("agregar.php");

    $conexion = mysqli_connect("localhost", "root", "", "peso1");

    if (isset($_POST['actualizar'])) {
        //Si se presiona el botón "Guardar cambios"
        $nombre = $_POST["nombre"];
        $curp = $_POST["curp"];
        $fechanacimiento = $_POST["fechanacimiento"];
        $sexo = $_POST["sexo"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $correo = $_POST["correo"];
        $fechaingreso = $_POST["fechaingreso"];
        $nss = $_POST["nss"];
        $telefonoemergencia = $_POST["telefonoemergencia"];
        $id = $_POST["id"];

        // datos que se van a actualizar
        $sql = " update crudc set
            Nombre='" . $nombre . "',
            `Fecha de nacimiento`='" . $fechanacimiento . "',
            Sexo='" . $sexo . "',
            Dirección='" . $direccion . "',
            Teléfono='" . $telefono . "',
            Correo='" . $correo . "',
            `Fecha de ingreso`='" . $fechaingreso . "',
            NSS='" . $nss . "',
            `Teléfono de emergencia`='" . $telefonoemergencia . "'
            WHERE id='" . $id . "'";
        $resultado = mysqli_query($conexion,$sql);



                         if ($resultado) {
                             echo "
                         <script>
                         alert('Los datos de " . $nombre . " han sido actualizados correctamente');
                         location.assign('indexagregar.php');
                         </script>
                         ";
                         } else {
                             echo "
                         <script>
                         alert('Hubo un error. Los datos de " . $nombre . " no se pudieron actualizar');
                         location.assign('indexagregar.php');
                         </script>
                         ";
                         }

mysqli_close($conexion);

    } else {

        $conexion = mysqli_connect("localhost", "root", "", "peso1");

        $id = $_GET['id'];
        $sql = "SELECT * FROM crudc WHERE id='" . $id . "'";
        $resultado = mysqli_query($conexion, $sql);
        $fila = mysqli_fetch_assoc($resultado);

        // datos que estan escritos en la db que se van a mostrar para modificarse
        $nombre = $fila["Nombre"];
        $fechanacimiento = $fila["Fecha de nacimiento"];
        $sexo = $fila["Sexo"];
        $direccion = $fila["Dirección"];
        $telefono = $fila["Teléfono"];
        $correo = $fila["Correo"];
        $fechaingreso = $fila["Fecha de ingreso"];
       
        $nss = $fila["NSS"];
        $telefonoemergencia = $fila["Teléfono de emergencia"];
        mysqli_close($conexion);
    }
    ?>







    <form id="form1" action="<?= $_SERVER['PHP_SELF'] ?>" class="col-4" method="post">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre</label> <br>
            <input value="<?php echo $nombre; ?>" type="text" class="form-control" id="campo1" required name="nombre" aria-describedby="emailHelp" onkeydown="siguienteCampo(event, 'campo2')" autocomplete="off"><br>
        </div>

        <div class="mb-3">
                     <label for="campo2" class="form-label">CURP</label><br>
                     <input type="text" class="form-control" id="campo2" oninput="this.value = this.value.toUpperCase()"
                        name="curp" required aria-describedby="emailHelp" onkeydown="siguienteCampo(event, 'campo3')"
                        autocomplete="off"><br>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Fecha de nacimiento</label><br>
            <input value="<?php echo $fechanacimiento; ?>" type="date" class="form-control" id="campo2" required name="fechanacimiento" aria-describedby="emailHelp" onkeydown="siguienteCampo(event, 'campo3')" autocomplete="off"><br>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Sexo</label><br>
            <input value="<?php echo $sexo; ?>" type="text" class="form-control" id="campo3" name="sexo" placeholder="M / F" aria-describedby="emailHelp" onkeydown="siguienteCampo(event, 'campo4')" autocomplete="off"><br>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Dirección</label><br>
            <input value="<?php echo $direccion; ?>" type="text" class="form-control" id="campo4" name="direccion" aria-describedby="emailHelp" onkeydown="siguienteCampo(event, 'campo5')" autocomplete="off"><br>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Teléfono</label><br>
            <input value="<?php echo $telefono; ?>" type="number" class="form-control" id="campo5" name="telefono" aria-describedby="emailHelp" onkeydown="siguienteCampo(event, 'campo6')" autocomplete="off"><br>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Correo electrónico</label><br>
            <input value="<?php echo $correo; ?>" type="email" class="form-control" id="campo6" name="correo" aria-describedby="emailHelp" onkeydown="siguienteCampo(event, 'campo7')" autocomplete="off"><br>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Fecha de ingreso</label><br>
            <input value="<?php echo $fechaingreso; ?>" type="date" class="form-control" id="campo7" name="fechaingreso" aria-describedby="emailHelp" onkeydown="siguienteCampo(event, 'campo8')" autocomplete="off"><br>
        </div>

       

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"> Número de seguro social</label><br>
            <input value="<?php echo $nss; ?>" type="text" class="form-control" id="campo10" name="nss" aria-describedby="emailHelp" onkeydown="siguienteCampo(event, 'campo11')" autocomplete="off"><br>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Teléfono de emergencia</label><br>
            <input value="<?php echo $telefonoemergencia; ?> " type="text" class="form-control" id="campo11" name="telefonoemergencia" aria-describedby="emailHelp" onkeydown="siguienteCampo(event, 'sumbit')" autocomplete="off"><br>
        </div>

        <img src="<?php echo $fila['Imagen']; ?>" alt="Imagen del estudiante">


        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <button name="actualizar" type="submit" class="btn btn-primary">Actualizar </button>

        <button><a href="indexagregar.php" style="text-decoration: none;  color:black;  ">Regresar</a></button>
    </form>







    <script>
        function siguienteCampo(event, siguienteCampoID) {
            // Verificar si la tecla presionada es Enter o flecha hacia abajo/arriba
            if (event.keyCode === 40 || event.keyCode === 38) {
                // Obtener el elemento del siguiente campo
                var siguienteCampo = document.getElementById(siguienteCampoID);
                // Enfocar el siguiente campo
                if (siguienteCampo) {
                    siguienteCampo.focus();
                    event.preventDefault(); // Evitar el comportamiento predeterminado del Enter (enviar el formulario)
                }
            }
        }

        //Cuando se entre a la pagian se selecciona el primer input (nombre)
        window.onload = function() {
            document.getElementById("campo1").focus();
        };
    </script>

</body>

</html>