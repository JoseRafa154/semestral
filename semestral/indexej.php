<link rel="stylesheet" type="text/css" href="style.css"><?php
include("conexion.php");

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
<div style="text-align: center;">
  <img src="UGC-Logo.png" width="100" height="100">
</div>

    <title>CRUD de calificaciones</title>
</head>
 <style>
        body {
            background-image: url('ugcbcs.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>

<body>
 <h1 style="text-align: center;">SEMESTRALES UGC</h1>    

    <h2 style="text-align: center;">Lista de calificaciones de semestral</h2>    
    <table border="1">
        <thead>
            <tr>
                <th>matricula</th>
                <th>nombres</th>
                <th>apellidos</th>
                <th>calificaciones_semestral</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($fila = mysqli_fetch_array($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila["matricula"] . "</td>";
                echo "<td>" . $fila["nombres"] . "</td>";
                echo "<td>" . $fila["apellidos"] . "</td>";
                echo "<td>" . $fila["calificaciones_semestral"] . "</td>";
             
                  echo "<td>";
                echo "<a href='editar.php?id=" . $fila['matricula'] . "'>Editar</a>";
                echo " | ";
                echo "<a href='eliminar.php?id=" . $fila['matricula'] . "'>Eliminar</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
            

        </tbody>    
    </table>
 <a href="nuevo_alumno.php"><button style="background-color: #A43A62;">Agregar alumno</button></a>


   
</body>
</html>