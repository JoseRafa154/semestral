
<link rel="stylesheet" type="text/css" href="css.css">

<!DOCTYPE html>
<html>
<head>
    <title>Registrar nuevo alumno</title>
</head>
<body>
    <h1>Registrar nuevo alumno</h1>

    <form method="POST" action="nuevo_alumno.php">
        
     
        <label for="nombres">nombres:</label>
        <input type="text" name="nombres" required>
        <br>
        <label for="apellidos">apellidos:</label>
        <input type="text" name="apellidos" required>
        <br>
        <label for="calificaciones_semestral">calificaciones_semestral:</label>
        <input type="number" name="calificaciones_semestral" required>
        <br>
        <br>
        <br>
        <button type="submit" name="registrar">Registrar</button>
        <button onclick="window.location.href='indexej.php'">Regresar</button>
    </form>
</body>
</html>
<?php
include("conexion.php");

if (isset($_POST["registrar"])){
    //$matricula = $_POST['matricula'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $calificaciones_semestral = $_POST['calificaciones_semestral'];
}


  // Insertar los datos en la base de datos
    $sql = "INSERT INTO alumnos (nombres, apellidos, calificaciones_semestral)
    VALUES ('$nombres', '$apellidos', '$calificaciones_semestral')";

    mysqli_query($conexion, $sql);
    exit();

?>