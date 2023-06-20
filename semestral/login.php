<?php
session_start();

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "escuela";

$conn = mysqli_connect($servername, $username, $password, $dbname);
user
if (!$conn) {
    die("Error en la conexión: " . mysqli_connect_error());
}

// Procesamiento del inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM alumnos WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION["username"] = $username;
        header("location: welcome.php");
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}

mysqli_close($conn);
?>