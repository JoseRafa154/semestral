<?php
// Obtener ID del alumno a eliminar
$id = $_GET['id'];

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "escuela");
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Eliminar alumno de la base de datos
$query = "DELETE FROM alumnos WHERE id = $id";
$result = mysqli_query($conexion, $query);

// Verificar si la eliminación fue exitosa
if ($result) {
    echo "Alumno eliminado correctamente." ;
} else {
    echo "Error al eliminar alumno: " . mysqli_error($conexion);
}

// Cerrar conexión
mysqli_close($conexion);
?>
<button onclick="window.location.href='indexej.php'">Regresar</button>
