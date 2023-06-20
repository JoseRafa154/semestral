<?php
// Obtener datos del formulario
$matricula = $_POST['matricula'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$calificaciones_semestral = $_POST['calificaciones_semestral'];


// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "calificaciones");
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Actualizar calificaciones del alumno en la base de datos
$query = "UPDATE alumnos SET nombres = '$nombres', parcial_1 = $parcial_1, parcial_2 = $parcial_2, parcial_3 = $parcial_3, promedio = $promedio WHERE matricula = $matricula";
$result = mysqli_query($conexion, $query);

// Verificar si la actualización fue exitosa
if ($result) {
    echo "Calificaciones actualizadas correctamente.";
} else {
    echo "Error al actualizar calificaciones: " . mysqli_error($conexion);
}

// Cerrar conexión
mysqli_close($conexion);
?>
<button onclick="window.location.href='indexej.php'">Regresar</button>