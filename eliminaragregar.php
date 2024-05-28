<?php

$conexion = mysqli_connect("localhost", "root", "", "peso1");
$id = $_GET["id"];

// eliminar filas de las db
$sql = "DELETE FROM empleados WHERE id=?";
//preparar los datos para evitar inyecciones sql
$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

// Verificar si la consulta de eliminación se ejecutó correctamente
if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo "
    <script language='JavaScript'>
    alert('Los datos han sido eliminados correctamente');
    location.assign('indexagregar.php');
    </script>
    ";
} else {
    echo "
    <script language='JavaScript'>
    alert('Parece que hubo un error. Los datos no han sido eliminados');
    location.assign('indexagregar.php');
    </script>
    ";
}

mysqli_close($conexion);
?>
