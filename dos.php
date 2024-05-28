<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Agregar y adminsitrar</title>
   <link rel="stylesheet" href="http://localhost/crud/indexagregar.css">
</head>

<body>

   <?php
   include("agregar.php");
   $sql = "select * from crudc";
   $conexion = mysqli_connect("localhost", "root", "", "peso1");
   $resultado = mysqli_query($conexion, $sql);
   ?>


<section>
    <div class="d2">
      <table>
         <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>CURP</th>
            <th>F. Nacimeinto</th>
            <th>Sexo</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>F. ingreso</th>
        
            <th>Nss</th>
            <th>Tel. Emergencia</th>
         </thead>

         <tbody>

            <?php
            while ($filas = mysqli_fetch_assoc($resultado)) {
            ?>
               <tr>
                  <td><?php echo $filas['id'] ?></td>
                  <td><?php echo $filas['Nombre'] ?></td>
                  <td><?php echo $filas['CURP'] ?></td>
                  <td><?php echo $filas['Fecha de nacimiento'] ?></td>
                  <td><?php echo $filas['Sexo'] ?></td>
                  <td><?php echo $filas['Dirección'] ?></td>
                  <td><?php echo $filas['Teléfono'] ?></td>
                  <td><?php echo $filas['Correo electrónico'] ?></td>
                  <td><?php echo $filas['Fecha de ingreso'] ?></td>
                 
                  <td><?php echo $filas['NSS'] ?></td>
                  <td><?php echo $filas['Teléfono de emergencia'] ?></td>
                  <td>
                     -
                     <?php echo "<a href='editaragregar.php?id=" . $filas["id"] . "'><button>EDITAR</button></a>"; ?>
                     -
                     <?php echo "<a href='eliminaragregar.php?id=" . $filas["id"] . "' onclick='return confirmar(\"¿Estás seguro que deseas eliminar los datos del empleado?\")'><button>ELIMINAR</button></a>"; ?>


                  </td>

               </tr>
            <?php
            }
            ?>
         </tbody>
      </table>

   </div>

</section>
  









   <?php
   mysqli_close($conexion);
   ?>



   <script>
      function siguienteCampo(event, siguienteCampoID) {
         // Verificar si la tecla presionada es Enter
         if (event.keyCode === 13) {
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

      function confirmar() {
         return confirm('¿Estás seguro que deseas eliminar los datos del empleado? Será imposible recuperarlos una vez aceptando.');
      }
   </script>


   <script>
        // Motsrar imagen del empleado
        function mostrarImagenSeleccionada() {
            var archivo = document.getElementById('imagenInput').files[0]; // Obtener el archivo seleccionado(del html)
            var imagenPrevia = document.getElementById('imagenPrevia'); // Obtener el elemento img de vista previa(la etiqueta img que esta despues del input)

            // Verificar si se seleccionó un archivo y si es una imagen para evitar errores futuros
            if (archivo && archivo.type.startsWith('image')) {
                var lector = new FileReader(); // Crear un objeto FileReader para leer el archivo

                // funcion de devolucion 
                lector.onload = function(evento) {
                    imagenPrevia.src = evento.target.result; // Establecer la fuente de la imagen previa como la URL del archivo cargado
                    imagenPrevia.style.display = 'block'; // Mostrar la imagen previa cpn block
                }

                // Leer el archivo como una URL de datos
                lector.readAsDataURL(archivo);
            } else {
                imagenPrevia.style.display = 'none'; // si no hay imagen pues ocultar la imagen previa dahhhhh
            }
        }

        // Agregar un detector de eventos de cambio al input de archivo
        document.getElementById('imagenInput').addEventListener('change', mostrarImagenSeleccionada);
    </script>

</body>

</html> 