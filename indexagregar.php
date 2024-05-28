<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Agregar y administrar</title>
   <link rel="stylesheet" href="http://localhost/crud/indexagregar.css">
</head>

<body>

   <?php
   include ("agregar.php");
   $sql = "select * from empleados";
   $conexion = mysqli_connect("localhost", "root", "", "peso1");
   $resultado = mysqli_query($conexion, $sql);
   ?>

   <div class="overlay"></div>
   <div class="content">

      <div class="d1">APDanza <br>
         <p class="e"> Escuela de danza </p>
      </div>
      <h3>REGISTRO</h3>

      <div class="container">
         <section id="s1" class="left-section">
            <div id="d1" class="form-container">
               <form id="form1" action="agregar.php" method="post" enctype="multipart/form-data">
                  <div class="mb-3">
                     <label for="campo1" class="form-label">Nombre</label> <br>
                     <input type="text" class="form-control" id="campo1" name="nombre" required
                        aria-describedby="emailHelp" onkeydown="siguienteCampo(event, 'campo2')" autocomplete="off"><br>
                  </div>

                  <div class="mb-3">
                     <label for="campo2" class="form-label">CURP</label><br>
                     <input type="text" class="form-control" id="campo2" oninput="this.value = this.value.toUpperCase()"
                        name="curp" required aria-describedby="emailHelp" onkeydown="siguienteCampo(event, 'campo3')"
                        autocomplete="off"><br>
                  </div>

                  <div class="mb-3">
                     <label for="campo3" class="form-label">Fecha de nacimiento</label><br>
                     <input type="date" class="form-control" id="campo3" name="fechanacimiento" required
                        aria-describedby="emailHelp" onkeydown="siguienteCampo(event, 'campo4')" autocomplete="off"><br>
                  </div>

                  <div class="mb-3">
                     <label for="campo4" class="form-label">Sexo</label><br>
                     <input type="text" class="form-control" id="campo4" oninput="this.value = this.value.toUpperCase()"
                        name="sexo" placeholder="M / F" required aria-describedby="emailHelp"
                        onkeydown="siguienteCampo(event, 'campo5')" autocomplete="off"><br>
                  </div>

                  <div class="mb-3">
                     <label for="campo5" class="form-label">Dirección</label><br>
                     <input type="text" class="form-control" id="campo5" name="direccion" aria-describedby="emailHelp"
                        required onkeydown="siguienteCampo(event, 'campo6')" autocomplete="off"><br>
                  </div>

                  <div class="mb-3">
                     <label for="campo6" class="form-label">Teléfono</label><br>
                     <input type="number" class="form-control" id="campo6" name="telefono" aria-describedby="emailHelp"
                        required onkeydown="siguienteCampo(event, 'campo7')" autocomplete="off"><br>
                  </div>

                  <div class="mb-3">
                     <label for="campo7" class="form-label">Correo electrónico</label><br>
                     <input type="email" class="form-control" id="campo7" name="correo" aria-describedby="emailHelp"
                        required onkeydown="siguienteCampo(event, 'campo8')" autocomplete="off"><br>
                  </div>

                  <div class="mb-3">
                     <label for="campo8" class="form-label">Fecha de ingreso</label><br>
                     <input type="date" class="form-control" id="campo8" name="fechaingreso"
                        aria-describedby="emailHelp" required onkeydown="siguienteCampo(event, 'campo9')"
                        autocomplete="off"><br>
                  </div>


                  <div class="mb-3">
                     <label for="campo11" class="form-label">Número de seguro social</label><br>
                     <input type="text" class="form-control" id="campo11" name="nss" aria-describedby="emailHelp"
                        required onkeydown="siguienteCampo(event, 'campo12')" autocomplete="off"><br>
                  </div>

                  <div class="mb-3">
                     <label for="campo12" class="form-label">Teléfono de emergencia</label><br>
                     <input type="text" class="form-control" id="campo12" name="telefonoemergencia"
                        aria-describedby="emailHelp" required onkeydown="siguienteCampo(event, 'submit')"
                        autocomplete="off"><br>
                     <br>
                  </div>


                  <button id="submit" name="imagen" type="submit">Agregar</button>

                  <a href="/admin.html"><button type="button">Cancelar</button></a>

                  <div class="agregar">


                     <input type="file" id="imagenInput" name="imagen" accept="image/*"><br><br>
                     <img id="imagenPrevia" src="#" alt="Vista previa de la imagen"
                        style="display: none; max-width: 300px; margin-top: 10px;"><br>

                  </div>


               </form>
            </div>
         </section>

         <section id="s2" class="right-section">
            <h1>Bienvenidos a APDanza</h1>
            <h3>Donde el arte y la pasión se unen</h3>
            <p>

En APDanza, creemos que la danza es mucho más que un simple movimiento; es una forma de expresión, una manifestación artística que trasciende fronteras y une corazones. Nuestra pequeña pero acogedora academia de danza se dedica a cultivar y nutrir el talento de cada uno de nuestros estudiantes, brindándoles un ambiente de aprendizaje positivo y enriquecedor</p>
         </section>
      </div>

   </div>

   <?php
   mysqli_close($conexion);
   ?>

   <style>
      .d1 {
         background: rgba(0, 0, 0, 0.5);
         border-radius: 20px;
         height: auto;
         font-size: 65pt;
         padding: 20px;
         font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
         top: 20px;
         width: 80%;
         margin: 10px auto;
         text-align: center;
      }

      .e {
         font-size: 15pt;
         left: 50px;
         font-family: 'Courier New', Courier, monospace;
      }

      #form1 {
         background: rgba(0, 0, 0, 0.5);
         font-family: arial;
         padding: 20px;
         border-radius: 10px;
      }

      body {
         margin: 0;
         padding: 0;
         justify-content: center;
         align-items: center;
         background: url('http://localhost/crudc/ballet_133220921.jpg') no-repeat center center fixed;
         background-size: cover;
      }

      .overlay {
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background: rgba(0, 0, 0, 0.05);
         backdrop-filter: blur(10px);
         z-index: 1;
      }

      .content {
         position: relative;
         z-index: 2;
         color: white;
         text-align: center;
      }

      h3 {
         color: black;
         font-size: 20pt;
         padding-top:30px;
         font-family: 'Courier New', Courier, monospace;
      }


      .container {
         display: flex;
         justify-content: space-between;
         width: 100%;
         padding: 20px;
      }

      .left-section,
      .right-section {
         flex: 1;
         margin: 10px;
         background: rgba(0, 0, 0, .255);
         padding: 20px;
         border-radius: 10px;
      }

      .form-container {
         margin: auto;
      }

      #d1 {
         margin: 0px;
         position: relative;
      }

      .agregar {
         right: 10%;
         top: 10%;
         position: absolute;
         background: rgba(255, 255, 255, 0.1);
         border-radius: 20px;
         height: 450px;
         width: 500px;
      }

      input[type="file"] {
         color: transparent;
      }
      #imagenprevia{
         border-radius: 20px;
      }
      input{
         background: RGBA(232, 228, 218,.5);
         border-style: none;
         margin-bottom: 20px;
         border-radius: 5px;
         height: 30px;
         color: white;
         transition: all .3s ease;
      }
      .input-focused{
         background: rgba(232, 228, 218.9);
         color: black;
         font-size: 15pt;
         transition: all .3s ease;
      }
      .s2{
         background: red;
      }
   </style>

   <script>
      function siguienteCampo(event, siguienteCampoID) {
         if (event.keyCode === 13) {
            var siguienteCampo = document.getElementById(siguienteCampoID);
            if (siguienteCampo) {
               siguienteCampo.focus();
               event.preventDefault();
            }
         }
      }

      window.onload = function () {
         document.getElementById("campo1").focus();
      };

      function confirmar() {
         return confirm('¿Estás seguro que deseas eliminar los datos del empleado? Será imposible recuperarlos una vez aceptando.');
      }

      function mostrarImagenSeleccionada() {
         var archivo = document.getElementById('imagenInput').files[0];
         var imagenPrevia = document.getElementById('imagenPrevia');

         if (archivo && archivo.type.startsWith('image')) {
            var lector = new FileReader();
            lector.onload = function (evento) {
               imagenPrevia.src = evento.target.result;
               imagenPrevia.style.display = 'block';
            }
            lector.readAsDataURL(archivo);
         } else {
            imagenPrevia.style.display = 'none';
         }
      }

      document.getElementById('imagenInput').addEventListener('change', mostrarImagenSeleccionada);
   </script>
   <!-- Añade este script al final de tu archivo HTML, antes de la etiqueta de cierre </body> -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Seleccionar todos los inputs del formulario
        var inputs = document.querySelectorAll('input');

        // Añadir eventos de enfoque y desenfoque a cada input
        inputs.forEach(function(input) {
            input.addEventListener('focus', function() {
                input.classList.add('input-focused');
            });

            input.addEventListener('blur', function() {
                input.classList.remove('input-focused');
            });
        });
    });
</script>


</body>

</html>