<link rel="stylesheet" type="text/css" href="css.css">
<?php
include("conexion.php");

if (isset($_POST["agregar"])) {
    $nombre = $_POST["nombre"];
    $parcial_1 = $_POST["parcial_1"];
    $parcial_2 = $_POST["parcial_2"];
    $parcial_3 = $_POST["parcial_3"];
    $promedio = ($parcial_1 + $parcial_2 + $parcial_3) / 3;

    $sql = "INSERT INTO alumnos (nombre, parcial_1, parcial_2, parcial_3, promedio) VALUES ('$nombre', $parcial_1, $parcial_2, $parcial_3, $promedio)";
    mysqli_query($conexion, $sql);
}

if (isset($_GET["eliminar"])) {
    $id = $_GET["eliminar"];
    $sql = "DELETE FROM alumnos WHERE id=$id";
    mysqli_query($conexion, $sql);
}

$sql = "SELECT * FROM alumnos";
$resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD de calificaciones</title>
    <div><img src="uniqua.jfif" width="100" height="100">
</div>
</head>
<body>
    <h1>CRUD de calificaciones</h1>

    <h2>Agregar alumno</h2>
    <form method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <label>Parcial 1:</label>
        <input type="number" name="parcial_1" required>
        <br>
        <label>Parcial 2:</label>
        <input type="number" name="parcial_2" required>
        <br>
        <label>Parcial 3:</label>
                <input type="number" name="parcial_3" required>
        <br>
        <br>
        <button type="submit" name="agregar">Agregar</button>
    </form>

    <h2>Lista de alumnos</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Parcial 1</th>
                <th>Parcial 2</th>
                <th>Parcial 3</th>
                <th>Promedio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($fila = mysqli_fetch_array($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila["id"] . "</td>";
                echo "<td>" . $fila["nombre"] . "</td>";
                echo "<td>" . $fila["parcial_1"] . "</td>";
                echo "<td>" . $fila["parcial_2"] . "</td>";
                echo "<td>" . $fila["parcial_3"] . "</td>";
                echo "<td>" . $fila["promedio"] . "</td>";
                echo "<td><a href='index.php?eliminar=" . $fila["id"] . "'>Eliminar</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
