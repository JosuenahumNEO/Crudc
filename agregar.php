<?php



date_default_timezone_set('America/Mexico_City');
$fechaHora = date('Y-m-d H:i:s');






if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //DECLARACION DE VARIABLES
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

    $imagen = $_FILES["imagen"]["tmp_name"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verificar que se haya subido un archivo
        if(isset($_FILES["imagen"]) && !empty($_FILES["imagen"]["tmp_name"])) {
            // Guardar la imagen en una carpeta en el servidor
            $carpeta_destino = "imgestudiantes/";
            $nombre_imagen = $_FILES["imagen"]["name"];
            $ruta_imagen = $carpeta_destino . $nombre_imagen;
            move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_imagen);
        } else {
            // Si no se subió una imagen, establecer la ruta de imagen como vacía
            $ruta_imagen = '';
        }







    //VERFICACION DE DATOS
    if (
        !empty($nombre) &&
        !empty($curp) &&
        !empty($fechanacimiento) &&
        !empty($sexo) &&
        !empty($direccion) &&
        !empty($telefono) &&
        !empty($correo) &&
        !empty($fechaingreso) &&

        !empty($nss) &&
        !empty($telefonoemergencia) &&
        !empty($imagen)
    ) {


        $guardarimagen = "imgemepleados";
        $b = fopen($guardarimagen, "a") or die("No se abrió el archivo :( " . $guardarimagen);
        fwrite($b, $imagen);
        fclose($b);
        $ruta_imagen_db = $carpeta_destino . $nombre_imagen;
        //conectameos base de datos del "Localhost/phpmyadmin"
        $conexion = mysqli_connect("localhost", "root", "", "peso1");
        // Ejecutar la consulta SQL
        $resultado = mysqli_query($conexion, 'INSERT INTO crudc(Nombre, CURP, `Fecha de nacimiento`, Sexo, Dirección, Teléfono, Correo, `Fecha de ingreso`, NSS, `Teléfono de emergencia`,Imagen) 
 VALUES ("' . $nombre . '", "' . $curp . '", "' . $fechanacimiento . '", "' . $sexo . '", "' . $direccion . '","' . $telefono . '", "' . $correo . '","' . $fechaingreso . '", "' . $nss . '","' . $telefonoemergencia . '","' . $ruta_imagen_db . '")');

        //EXPORTAR INFORMACION A ARCHIVO DE TEXTO
        $informacionmandada = "--------------------NUEVO ESTUDIANTE--------------------" . "\n" . "                  " . $fechaHora . "\n" .
            "Nombre: " . $nombre . "\n" .
            "CURP: " . $curp . "\n" .
            "Fecha de nacimiento: " . $fechanacimiento . "\n" .
            "Sexo: " . $sexo . "\n" .
            "Dirección: " . $direccion . "\n" .
            "Número de teléfono: " . $telefono . "\n" .
            "Correo electrónico: " . $correo . "\n" .
            "Fecha de ingreso: " . $fechaingreso . "\n" .
            "Número de seguro social: " . $nss . "\n" .
            "Teléfono de emergencia: " . $telefonoemergencia . "\n" .
            "\n";


        $archivo = "historialtrabajadores.txt";


        $a = fopen($archivo, "a") or die("No se abrió el archivo :( " . $archivo);
        fwrite($a, $informacionmandada);
        fclose($a);

        header('Location: indexagregar.php');
    }
} else {
}
}