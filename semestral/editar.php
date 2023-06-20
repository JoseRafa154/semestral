<!DOCTYPE html>
<html>
<head>
    <title>Editar calificaciones</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
    <h1>Editar calificaciones</h1>
    <?php
    // Obtener ID del alumno a editar
    $matricula = $_GET ['matricula'] ?? null;
    
    // Conexión a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "escuela");
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
        }
    $matricula=1;
    // Obtener datos del alumno a editar
    $query = "SELECT * FROM alumnos WHERE matricula = '$matricula'";
    $result = mysqli_query($conexion, $query);
    $fila = mysqli_fetch_assoc($result);

    // Mostrar formulario con datos del alumno
    echo "<form action='actualizar.php' method='POST'>";
    echo "<input type='hidden' name='matricula' value='" . $fila['matricula'] . "'>";
    
    echo "<label>Nombre:</label>";
    echo "<input type='text' name='nombres' value='" . $fila['nombres'] . "' required>";
    echo "<br><br>";

    echo "<label>Apellidos:</label>";
    echo "<input type='text' name='apellidos' step='0.01' value='" . $fila['apellidos'] . "' required>";
    echo "<br><br>";

    echo "<label>Calificaciones semestral:</label>";
    echo "<input type='number' name='calificaciones_semestral' step='0.01' value='" . $fila['calificaciones_semestral'] . "' required>";
    echo "<br><br>";
    echo "<button type='submit'>Actualizar</button>";
    echo "</form>";

    // Cerrar conexión
    mysqli_close($conexion);
    ?>
</body>
</html>