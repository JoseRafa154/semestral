<?php
include("conexion.php");

if (isset($_POST["registrar"])) {
    $nombre = $_POST["nombre"];
    $parcial_1 = $_POST["parcial_1"];
    $parcial_2 = $_POST["parcial_2"];
    $parcial_3 = $_POST["parcial_3"];
    

    // Calcular el promedio
    $promedio = ($parcial_1 + $parcial_2 + $parcial_3) / 3;

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO alumnos (nombre, parcial_1, parcial_2, parcial_3, promedio) VALUES ('$nombre', $parcial_1, $parcial_2, $parcial_3, $promedio)";
    mysqli_query($conexion, $sql);
    exit();
}
?>